<?php

namespace App\Controllers;

use App\Models\HouslysModel;

class LoginController extends BaseController
{
    public function index()
    {

        $mensaje = session('mensaje');
        $id_usuario = session('id_usuario');

        $datos =["titulo"=>"Login", "mensaje" => $mensaje ];

        if($id_usuario==""){
            return view("pages/login", $datos);
        }
        else{
            return redirect()->to(base_url().route_to('perfil'));
        }

    }



    public function crearUsuario()
    {
        $datos_crear = [
                        "tipo_usuario" => "Usuario",
                        "nombre_usuario" => $_POST['nombre_usuario'],
                        "apellido_usuario" => $_POST['apellido_usuario'],
                        "fnacimiento_usuario" => $_POST['fnacimiento_usuario'],
                        "celular_usuario" => $_POST['celular_usuario'],
                        "correo_usuario" => $_POST['correo_usuario'],
                        "password_usuario" => $_POST['password_usuario']
                    ];

        $Houslys = new HouslysModel();
        $respuesta = $Houslys->insertarRegistro($datos_crear, 'usuario');

        if($respuesta>0){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','registrado');
        }else{
            return redirect()->to(base_url().route_to('login'))->with('mensaje','error');
        }

    }

    public function ingresar()
    {
        
        $usuario = $this->request->getPost('correo_usuario');
        $password = $this->request->getPost('password_usuario');

        if($usuario == "" or $password==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','error');
        }
        else{
            
            $Houslys = new HouslysModel();
            $datosUsuario = $Houslys->obtenerRegistro(['correo_usuario' => $usuario], 'usuario');

            if(count($datosUsuario)>0 && ($password==$datosUsuario[0]['password_usuario'])){

                $datos = [
                        "id_usuario" => $datosUsuario[0]['id_usuario'],
                        "tipo_usuario" => $datosUsuario[0]['tipo_usuario'],
                        "nombre_usuario" => $datosUsuario[0]['nombre_usuario'],
                        "apellido_usuario" => $datosUsuario[0]['apellido_usuario'],
                        "fnacimiento_usuario" => $datosUsuario[0]['fnacimiento_usuario'],
                        "celular_usuario" => $datosUsuario[0]['celular_usuario'],
                        "correo_usuario" => $datosUsuario[0]['correo_usuario'],
                        "password_usuario" => $datosUsuario[0]['password_usuario']
                ];

                $session = session();
                $session->set($datos);
                return redirect()->to(base_url().route_to('perfil'));

            }else{
                return redirect()->to(base_url().route_to('login'))->with('mensaje','error');
            }
        }

    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url().route_to('login'));

    }

}