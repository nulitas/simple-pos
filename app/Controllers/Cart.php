<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\ProductModel;
// use App\Models\StockModel;

class Cart extends BaseController
{
    protected $productModel;
    // protected $stockModel;
    protected $cartModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        // $this->stockModel = new StockModel();
    }

    public function index()
    {
        $session = service("session");
        $userid = $session->get("id");
        $data = [
            'title' => 'Cart',
            // 'cart' => $this->cartModel->paginate(5),
            'cart' => $this->cartModel->getCartWithProductsByUserId($userid),
            'product' => $this->productModel->findAll(),
            //'pager' => $this->cartModel->getCart->pager,
            'count_carts' => $this->cartModel->countCartsByUserId($userid),
            'total' => $this->cartModel->countCartValue($userid),
            //'total_quantity' => $this->cartModel->select('sum(quantity) as total_quantity')->first(),
            // 'cart' => \Config\Services::cart()
        ];



        return view('pages/transactions/cart', $data);
    }


    public function add()
    {

        // stock - quantity 
        $session = service('session');
        $uid = $session->get('id');
        $quantity =  $this->request->getVar('quantity');
        $id = $this->request->getVar('id');

        $this->cartModel->addToCart($uid, $id, $quantity);




        // $this->cartModel->save([
        //     'image' => $this->request->getVar('image'),
        //     'name' => $this->request->getVar('name'),
        //     'price' => $this->request->getVar('price'),
        //     'quantity' => $quantity,
        // ]);

        // Stock
        //$updatedStock = $this->productModel->where('name', $prodName)->set('stock', "stock - $quantity", FALSE)->update();



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



    public function delete($id)
    {
        // $prodName = $this->request->getVar('name');
        // $quantity =  $this->request->getVar('quantity');
        // $updatedStock = $this->productModel->where('name', 'name')->set('stock', "stock + $quantity", FALSE)->update();

        $session = service('session');
        $uid = $session->get('id');



        $this->cartModel->deleteFromCart($uid, $id);

        return redirect()->to('cart/index');
    }
}
