<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Transaction extends BaseController
{
    protected $productModel;
    protected $helper = ['form'];

    public function __construct()
    {

        $this->productModel = new ProductModel();
    }


    public function add()
    {

        $data = [
            'title' => 'Add Product',
            'cart' => \Config\Services::cart()
        ];



        return view('pages/transactions/cart', $data);
    }
}
