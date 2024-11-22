<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $datos =["titulo"=>"Houslys", "estilo"=>"style"];

        echo view('general/header', $datos);
        echo view('index');
        echo view('general/footer');
    }
}
