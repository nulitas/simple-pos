<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\CartModel;

class Transaction extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {

        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->cartModel = new CartModel();
    }


    public function add()
    {
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

        $grandtotal =  array_sum($this->cartModel->select('sum(price * quantity) as total')->first());
        $this->transactionModel->save([
            'code' => $code,
            'customer' => $this->request->getVar('customer'),
            'tendered' => $this->request->getVar('tendered'),
            'total_amount' => $grandtotal,
        ]);



        return redirect()->to(base_url('main/home'));
    }
}
