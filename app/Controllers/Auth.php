<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\CartModel;

class Auth extends BaseController
{
    protected $cartModel;
    protected $userModel;
    protected $roleModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->cartModel = new CartModel();
    }





    public function login()
    {

        if (session('isLoggedIn')) {
            return redirect()->to(site_url('/'));
        }

        $data = [
            'title' => 'Posu'
        ];


        return view('auth/login', $data);
    }

    public function process()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $user = $this->userModel->where('username', $data['username'])->first();
        if ($user) {
            $isPasswordCorrect = password_verify($data['password'] ?? '', $user['password']);

            if ($isPasswordCorrect) {
                $role = $this->roleModel->find($user['role'])['name'];
                $this->session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => TRUE,
                    'role' => $role
                ]);



                return redirect()->to(url_to('main/home'));
            }
            session()->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to(url_to('login'));
        }
        session()->setFlashdata('msg', 'username is incorrect.');
        return redirect()->to(url_to('login'));
    }


    public function register()
    {



        $data = [
            'title' => 'Register',
            'count_carts' => count($this->cartModel->findAll()),
            'role' => $this->roleModel->find()
        ];


        return view('auth/register', $data);
    }


    public function store()
    {


        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
            'passwordconf' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to(url_to('register'))->withInput('validation', $validation);
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $this->request->getVar('roles'),
            ];

            $this->userModel->save($data);

            return redirect()->to(url_to('main/users'));
        }
    }


    public function signup()
    {



        $data = [
            'title' => 'SignUp',
            'count_carts' => count($this->cartModel->findAll()),
        ];


        return view('auth/signup', $data);
    }


    public function storeup()
    {


        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
            'passwordconf' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to(url_to('register'))->withInput('validation', $validation);
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 3
            ];

            $this->userModel->save($data);

            return redirect()->to('auth/login');
        }
    }


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(url_to('/'));
    }



    public function delete($id)
    {

        $this->userModel->delete($id);

        return redirect()->to('main/users');
    }
}
