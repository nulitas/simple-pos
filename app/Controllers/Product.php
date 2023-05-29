<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CartModel;
// use App\Models\StockModel;

class Product extends BaseController
{
    protected $userModel;
    protected $productModel;
    protected $stockModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        // $this->stockModel = new StockModel();
        $this->cartModel = new CartModel();
    }

    public function add()
    {


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


    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'product' => $this->productModel->where(['id' => $id])->first(),
            'count_carts' => count($this->cartModel->findAll()),
        ];

        return view('pages/products/edit', $data);
    }


    public function update($id)
    {


        $fileImg = $this->request->getFile('image');
        $fileImg->move('img');
        $covers = $fileImg->getName();


        $this->productModel->save([
            'id' => $id,
            'image' => $covers,
            'name' => $this->request->getVar('name'),
            'category' => $this->request->getVar('category'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
            'description' => $this->request->getVar('description'),

        ]);

        session()->setFlashdata('msg', 'Data has been updated.');

        return redirect()->to('/main');
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

    public function delete($id)
    {


        $this->cartModel->emptyTable('cart');


        $this->productModel->delete($id);
        return redirect()->to('main/products');
    }
}
