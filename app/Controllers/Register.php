<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Register extends BaseController
{

    protected $helpers = ['form'];

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('register');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|min_length[6]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'image' => [
                'uploaded[image]',
                'is_image[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
            ]
        ];
        if ($this->validate($rules)) {
            $model = new User();
            $img = $this->request->getFile('image');
            $img->move('uploads');
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'picture_path' => $img->getName()
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            return view('register');
        }
    }
}
