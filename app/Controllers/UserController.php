<?php

namespace App\Controllers;

use App\Models\HouslysModel;

class UserController extends BaseController
{
    
    public function gesUsuarios()
    {
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $usuarios = $Houslys->listarRegistros('usuario');

            $datos =["titulo"=>"Gestionar usuarios", "estilo"=>"gestionar"];
            $lista_usuarios = ["usuarios" => $usuarios, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/admin/menu");
            echo view("pages/admin/gesusuarios", $lista_usuarios);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function gesUsuario($id_usuario)
    {
        $id = session('id_usuario');

        if($id==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $usuario = $Houslys->ObtenerRegistro(['id_usuario' => $id_usuario], 'usuario');

            $datos =["titulo"=>"Gestionar usuarios", "estilo"=>"actualizar"];
            $info_usuario = ["info_usuario"=>$usuario, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/admin/menu");
            echo view("pages/admin/gesusuario", $info_usuario);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function actualizarUsuario($pagina)
    {

        $id_usuario = $_POST['id_usuario'];

        $datos_actualizar = [
            "tipo_usuario" =>  $_POST['tipo_usuario'],
            "nombre_usuario" => $_POST['nombre_usuario'],
            "apellido_usuario" => $_POST['apellido_usuario'],
            "fnacimiento_usuario" => $_POST['fnacimiento_usuario'],
            "celular_usuario" => $_POST['celular_usuario'],
            "correo_usuario" => $_POST['correo_usuario'],
            "password_usuario" => $_POST['password_usuario']
            
        ];

        $Houslys = new HouslysModel();
        $respuesta = $Houslys->actualizarRegistro($datos_actualizar, $id_usuario, 'usuario', 'id_usuario');

        if($respuesta){
            if($pagina=="1"){
                return redirect()->to(base_url().'actualizarmiperfil/'.$id_usuario)->with('mensaje','registro actualizado');
            }else{
                return redirect()->to(base_url().'gesusuarios/usuario/'.$id_usuario)->with('mensaje','registro actualizado');
            }
            
        }else{
            if($pagina=="1"){
                return redirect()->to(base_url().'actualizarmiperfil/'.$id_usuario)->with('mensaje','error');
            }
            else{
                return redirect()->to(base_url().'gesusuarios/usuario/'.$id_usuario)->with('mensaje','error');
            }
            
        }

    }

    public function eliminarUsuario($id_usuario)
    {

        $Houslys = new HouslysModel();
        $datos =["id_usuario" => $id_usuario];

        $eliminarViviendas = $Houslys->eliminarRegistro($datos, 'vivienda'); 
        $eliminarUsuario = $Houslys->eliminarRegistro($datos, 'usuario');

        if($eliminarUsuario and $eliminarViviendas){
            return redirect()->to(base_url().route_to('gesusuarios'))->with('mensaje','usuario eliminado');
        }else{
            return redirect()->to(base_url().route_to('gesusuarios'))->with('mensaje','error');
        }
    }

}