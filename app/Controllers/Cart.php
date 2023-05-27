<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $productModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Add Product',
            // 'cart' => $this->cartModel->paginate(5),
            'cart' => $this->cartModel->findAll(),
            'product' => $this->productModel->findAll(),
            'pager' => $this->cartModel->pager,
            'count_carts' => count($this->cartModel->findAll()),
            'total' => $this->cartModel->select('sum(price * quantity) as total')->first(),
            'total_quantity' => $this->cartModel->select('sum(quantity) as total_quantity')->first(),


            // 'cart' => \Config\Services::cart()
        ];



        return view('pages/transactions/cart', $data);
    }


    public function add()
    {


        $this->cartModel->save([
            'image' => $this->request->getVar('image'),
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity')

        ]);




        return redirect()->to(base_url('main/home'));
    }

    public function check()
    {
        $cart = \Config\Services::cart();

        $response = $cart->contents();
        $data = json_encode($response,  JSON_PRETTY_PRINT);
        echo '<pre>';

        print_r($data);


        echo '</pre>';

        echo $cart->totalItems();
    }


    public function clear()
    {
        $cart = \Config\Services::cart();


        $cart->destroy();
    }


    public function delete($id)
    {

        $this->cartModel->delete($id);

        return redirect()->to('cart/index');
    }
}
