<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function reset()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('forgot_password');
    }

    public function login()
    {
        $session = session();
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $session_data = [
                    'user_name'     => $data['name'],
                    'user_email'    => $data['email'],
                    'user_picture'  => $data['picture_path'],
                    'logged_in'     => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('error', 'Email/Password is Not Correctly');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function forgot_password()
    {
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $new_password = $this->request->getVar('new_password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $model->update($data['id'], ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('error', 'Email/Password is Not Correctly');
                return redirect()->to('/reset');
            }
        } else {
            session()->setFlashdata('error', 'Email not Found');
            return redirect()->to('/reset');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
