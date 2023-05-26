<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CartModel;

class Product extends BaseController
{
    protected $userModel;
    protected $productModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
    }

    public function add()
    {

        session();
        $data = [
            'title' => 'Add Product',
            'count_carts' => count($this->cartModel->findAll()),


        ];


        return view('pages/products/add', $data);
    }

    public function store()
    {
        $rules = [

            'name'    => 'required',
            'category'    => 'required',
            'price'    => 'required',
            'stock'    => 'required',
            'description'    => 'required',
        ];

        if (!$this->validate(
            $rules
        )) {
            return redirect()->back()->withInput();
        };

        $fileImg = $this->request->getFile('image');
        $fileImg->move('img');
        $cover = $fileImg->getName();


        $this->productModel->save([
            'image' => $cover,
            'name' => $this->request->getVar('name'),
            'category' => $this->request->getVar('category'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
            'description' => $this->request->getVar('description'),

        ]);





        return redirect()->to(base_url('main/products'));
    }

    public function view($id = false)
    {

        $product = $this->productModel->where(['id' => $id])->first();
        $data = [
            'title' => 'View',
            'product' => $product,
            'count_carts' => count($this->cartModel->findAll()),

        ];


        return view('pages/products/view', $data);
    }
}
