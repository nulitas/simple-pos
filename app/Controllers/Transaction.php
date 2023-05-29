<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransactionModel;
// use App\Models\TransactionItemModel;
use App\Models\CartModel;
use Dompdf\Dompdf;

class Transaction extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    // protected $transactionItemModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {

        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        // $this->transactionItemModel = new TransactionItemModel();
        $this->cartModel = new CartModel();
    }


    public function add()
    {
        $tendered = $this->request->getVar('tendered');

        $grandtotal =  array_sum($this->cartModel->select('sum(price * quantity) as total')->first());

        if ($grandtotal == 0 || $tendered < $grandtotal) {
            return redirect()->to(base_url('main/home'));
        } else {
            $fixTendered = $tendered;
        }

        extract($this->request->getPost());

        $pref = date("Ymd");
        $code = sprintf("%'.05d", 1);
        while (true) {
            if ($this->transactionModel->where(" code = '{$pref}{$code}' ")->countAllResults() > 0) {
                // Buat random generator transaction code-nya
                $code = sprintf("%'.05d", ceil($code) + 1);
            } else {
                $code = $pref . $code;
                break;
            }
        }




        // $quantity =  $this->request->getVar('quantity');



        $this->transactionModel->save([
            'code' => $code,
            'customer' => $this->request->getVar('customer'),
            'tendered' => $fixTendered,
            'total_amount' => $grandtotal,
        ]);



        // $updatedStock = $this->productModel->where('name', $prodName)->set('stock', "stock - $quantity", FALSE)->update();



        $this->cartModel->emptyTable('cart');
        return redirect()->to(base_url('main/home'));
    }

    public function detail($id = false)
    {

        $transaction = $this->transactionModel->where(['id' => $id])->first();
        $data = [
            'title' => 'View',
            'transaction' => $transaction,
            'count_carts' => count($this->cartModel->findAll()),

        ];

        return view('pages/transactions/detail', $data);
    }


    public function delete($id)
    {

        $this->transactionModel->delete($id);

        return redirect()->to('main/transactions');
    }

    public function generate($id = false)
    {
        $dompdf = new Dompdf();
        // $transaction = $this->transactionModel->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $transaction = $this->transactionModel->select('*')->where(['id' => $id])->first();

        $data = [
            'id' => $transaction['id'],
            'code' => $transaction['code'],
            'customer' => $transaction['customer'],
            'total_amount' => $transaction['total_amount'],
            'tendered' => $transaction['tendered'],
            'created_at' => $transaction['created_at']
        ];
        $html = view('pages/transactions/view.php', $data);
        // $html = "<h1> Example </h1>";
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('generate.pdf', ['Attachment' => false]);
    }
}
