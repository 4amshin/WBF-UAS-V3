<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController 
{
    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //load user model
        $userModel = new UserModel();

        //check if the user exists
        $user = $userModel->where('username', $username)->first();
        
        if($user) {
            //if password correct
            if($user['password'] === $password) {
                //start session
                session()->set('username', $username);

                //redirect to admin dashbaord
                return redirect()->to(base_url('dashboard'));
            } else {
                //if password wrong
                session()->setFlashdata('error', 'Password Anda Salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            //if user not found
            session()->setFlashdata('error', 'Username Tidak Ditemukan');
            return redirect()->to(base_url('login'));
        }
    }


    public function doLogout()
    {
        //destroy session and redirect to login page
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}

?>