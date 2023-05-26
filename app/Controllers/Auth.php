<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;

class Auth extends BaseController
{

    protected $userModel;
    protected $roleModel;
    protected $helper = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }


    public function login()
    {

        if (session('isLoggedIn')) {
            return redirect()->to(site_url('/'));
        }

        $data = [
            'title' => 'Login'
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

        if (session('isLoggedIn')) {
            return redirect()->to(site_url('main/home'));
        }

        $data = [
            'title' => 'Register'
        ];


        return view('auth/Register', $data);
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
                'role' => 3
            ];

            $this->userModel->save($data);

            return redirect()->to(url_to('login'));
        }
    }


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(url_to('/'));
    }
}
