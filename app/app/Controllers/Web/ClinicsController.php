<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class ClinicsController extends BaseController
{
    private $title;

    public function __construct()
    {
        $this->title = 'Clínicas';
    }

    public function index()
    {
        $session = session();
        $user_logged = $session->get('user_logged');

        if (!isset($user_logged)) {
            $session->setFlashdata('error', 'Efetue o login para acessar o sistema.');
            return redirect()->to('/login');
        }

        // echo '<pre>';
        // var_dump($user_logged);
        // die;

        $data = [
            'title' => $this->title,
            'user_name' => ucfirst(explode(' ', $user_logged['user_name'])[0])
        ];

        return view('clinic', $data);
    }
}
