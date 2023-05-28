<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\TransactionModel;


class Main extends BaseController
{

    protected $userModel;
    protected $productModel;
    protected $roleModel;
    protected $cartModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
        $this->transactionModel = new TransactionModel();
    }



    public function index()
    {
        $product = $this->productModel->findAll();
        $data = [
            'title' => 'Home',
            'product' => $product,
            'count_carts' => count($this->cartModel->findAll()),
            'cartProductName' => $this->cartModel->find('name'),


        ];



        return view('pages/home', $data);
    }



    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'count_carts' => count($this->cartModel->findAll()),
            'count_transactions' => count($this->transactionModel->findAll()),
            'count_users' => count($this->userModel->findAll()),
            'count_products' => count($this->productModel->findAll())
        ];
        return view('pages/dashboard', $data);
    }

    public function products()
    {

        $product = $this->productModel->findAll();
        $data = [
            'title' => 'Products',
            'product' => $product,
            'count_carts' => count($this->cartModel->findAll())

        ];
        return view('pages/products/list', $data);
    }

    public function transactions()
    {
        $transactions = $this->transactionModel->findAll();
        $data = [
            'title' => 'Transactions',
            'transactions' => $transactions,
            'count_carts' => count($this->cartModel->findAll())

        ];
        return view('pages/transactions/list', $data);
    }

    public function users()
    {
        $user = $this->userModel->findAll();
        $userRole = $this->userModel->find('role');
        $role = $userRole;
        $data = [
            'title' => 'Users',
            'count_carts' => count($this->cartModel->findAll()),

            // 'pager' => $this->userModel->pager(),

            'user' => $user,
            'role' => $role
        ];
        return view('pages/users/list', $data);
    }
}
