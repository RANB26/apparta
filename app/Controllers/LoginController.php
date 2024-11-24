<?php

namespace App\Controllers;

use App\Models\AppartaModel;

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

    public function ingresar()
    {
        
        $usuario = $this->request->getPost('correo_usuario');
        $password = $this->request->getPost('password_usuario');

        if($usuario == "" or $password==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','error');
        }
        else{
            
            $Apparta = new AppartaModel();
            $datosUsuario = $Apparta->obtenerRegistro(['correo_usuario' => $usuario], 'usuario', true);

            if(count($datosUsuario)==0){
                return redirect()->to(base_url().route_to('login'))->with('mensaje','no_encontrado');
            }else{
                if($datosUsuario['id_tipo_usuario']==3){
                    return redirect()->to(base_url().route_to('login'))->with('mensaje','error_cliente');
                }else{
                    if($password==$datosUsuario['password_usuario']){
        
                        $tipoUsuario = $Apparta->obtenerRegistro(['id_tipo_usuario' => $datosUsuario['id_tipo_usuario']], 'tipo_usuario');
        
                        $datos = [
                                "id_usuario" => $datosUsuario['id_usuario'],
                                "id_tipo_usuario" => $datosUsuario['id_tipo_usuario'],
                                "tipo_usuario" => $tipoUsuario['tipo_usuario'],
                                "nombre_usuario" => $datosUsuario['nombre_usuario'],
                                "apellido_usuario" => $datosUsuario['apellido_usuario'],
                                "celular_usuario" => $datosUsuario['celular_usuario'],
                                "correo_usuario" => $datosUsuario['correo_usuario'],
                                "password_usuario" => $datosUsuario['password_usuario']
                        ];
        
                        $session = session();
                        $session->set($datos);
                        return redirect()->to(base_url().route_to('perfil'));
        
                    }else{
                        return redirect()->to(base_url().route_to('login'))->with('mensaje','error');
                    }
                }
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