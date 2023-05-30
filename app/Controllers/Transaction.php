<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransactionModel;
// use App\Models\TransactionItemModel;
use App\Models\ProductInCartModel;
use App\Models\CartModel;
use Dompdf\Dompdf;

class Transaction extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $prodincartModel;
    // protected $transactionItemModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {

        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->prodincartModel = new ProductInCartModel();
        // $this->transactionItemModel = new TransactionItemModel();
        $this->cartModel = new CartModel();
    }


    public function add()
    {
        extract($this->request->getPost());
        $session = service("session");
        $uid = $session->get("id");
        $tendered = $this->request->getVar('tendered');
        $grandtotal =  $this->cartModel->countCartValue($uid);
        if ($grandtotal == 0 || $tendered < $grandtotal) {
            return redirect()->to(base_url('main/home'));
        } else {
            $fixTendered = $tendered;
        }



        // $this->cartModel->countCartValue($uid);

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
        $grandtotal =  $this->cartModel->countCartValue($uid);
        // $quantity =  $this->request->getVar('quantity');
        $this->transactionModel->save([
            'code' => $code,
            'customer' => $this->request->getVar('customer'),
            'tendered' => $fixTendered,
            'fk_cart' => $this->cartModel->getCartIdByUserId($uid),
            'total_amount' => $grandtotal,
        ]);
        $this->cartModel->releaseCartByUserId($uid);
        // $updatedStock = $this->productModel->where('name', $prodName)->set('stock', "stock - $quantity", FALSE)->update();
        $this->cartModel->releaseCartByUserId($uid);
        // $this->cartModel->emptyTable('cart');
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
        // $transaction = $this->transactionModel->select('*')->orderBy('id', 'ASC')->limit(1)->first();
        $transaction = $this->transactionModel->select('*')->where(['id' => $id])->first();
        $products = $this->transactionModel->join('productincarts', 'transactions.fk_cart = productincarts.cart_id')->join('products', 'productincarts.product_id = products.id')->where('transactions.id', $id)->get()->getResultArray();

        //         public function getProductsByTransactionId($transactionId)
        //     {
        //         return $this->db->table('transactions')
        //         ->join('productincarts', 'transactions.fk_cart = productincarts.cart_id')
        //         ->join('products', 'productincarts.product_id = products.id')
        //         ->where('transactions.id', $transactionId)
        //         ->get()
        //         ->getResultArray();
        //     }


        $data = [
            'id' => $transaction['id'],
            'code' => $transaction['code'],
            'customer' => $transaction['customer'],
            'total_amount' => $transaction['total_amount'],
            'tendered' => $transaction['tendered'],
            'created_at' => $transaction['created_at'],
            'products' => $products


        ];
        $html = view('pages/transactions/view.php', $data);
        // $html = "<h1> Example </h1>";
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('generate.pdf', ['Attachment' => false]);
    }
}
