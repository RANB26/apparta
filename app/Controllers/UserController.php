<?php

namespace App\Controllers;

use App\Models\AppartaModel;

class UserController extends BaseController
{
    
    public function gesUsuarios()
    {
        $id_usuario = session('id_usuario');
        $tipo_usuario = session('tipo_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Apparta = new AppartaModel();
            $usuarios = $Apparta->listarUsuarios($tipo_usuario);

            $datos =["titulo"=>"Gestionar usuarios", "estilo"=>"gestionar"];
            $lista_usuarios = ["usuarios" => $usuarios, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesusuarios", $lista_usuarios);
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

            $Apparta = new AppartaModel();
            $usuario = $Apparta->ObtenerRegistro(['id_usuario' => $id_usuario], 'usuario');
            $tipoUsuario = $Apparta->obtenerRegistro(['id_tipo_usuario' => $usuario['id_tipo_usuario']], 'tipo_usuario');
            $usuario['tipo_usuario'] = $tipoUsuario['tipo_usuario'];

            $datos =["titulo"=>"Gestionar usuario", "estilo"=>"actualizar"];
            $info_usuario = ["info_usuario"=>$usuario, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesusuario", $info_usuario);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function actualizarUsuario($pagina)
    {
        $datos_actualizar = [
            "nombre_usuario" => $_POST['nombre_usuario'],
            "apellido_usuario" => $_POST['apellido_usuario'],
            "celular_usuario" => $_POST['celular_usuario'],
            "correo_usuario" => $_POST['correo_usuario'],
        ];

        if($pagina==1){
            $datos_actualizar["password_usuario"] = $_POST['password_usuario'];
        }else if(session('tipo_usuario')=="SuperAdmin"){
            $datos_actualizar["identificacion_usuario"] = $_POST['identificacion_usuario'];
            $datos_actualizar["id_tipo_usuario"] = $_POST['id_tipo_usuario'];
            $datos_actualizar["password_usuario"] = $_POST['password_usuario'];
        }
        
        $id_usuario = $_POST['id_usuario'];
        $Apparta = new AppartaModel();
        $respuesta = $Apparta->actualizarRegistro($datos_actualizar, $id_usuario, 'usuario', 'id_usuario');

        if($respuesta){
            if($pagina==1) return redirect()->to(base_url().'actualizarmiperfil/'.$id_usuario)->with('mensaje','registro actualizado');
            else
                return redirect()->to(base_url().'gesusuarios/usuario/'.$id_usuario)->with('mensaje','registro actualizado');
        }else{
            if($pagina==1) return redirect()->to(base_url().'actualizarmiperfil/'.$id_usuario)->with('mensaje','error');
            else
                return redirect()->to(base_url().'gesusuarios/usuario/'.$id_usuario)->with('mensaje','error');
        }
    }

    public function eliminarUsuario($id_usuario){

        $Apparta = new AppartaModel();
        $datos =["id_usuario" => $id_usuario];

        $eliminarReservas = $Apparta->eliminarRegistro($datos, 'reserva');
        if($eliminarReservas){
            $eliminarUsuario = $Apparta->eliminarRegistro($datos, 'usuario');
            if($eliminarUsuario){
                return redirect()->to(base_url().route_to('gesusuarios'))->with('mensaje','usuario eliminado');
            }else{
                return redirect()->to(base_url().route_to('gesusuarios'))->with('mensaje','error_usuario');
            }
        }else{
            return redirect()->to(base_url().route_to('gesusuarios'))->with('mensaje','error_reservas');
        }
    }

    public function perfilCliente($id_cliente){
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $Apparta = new AppartaModel();
            $usuario = $Apparta->ObtenerRegistro(['id_usuario' => $id_cliente], 'usuario');
            $reservas_cliente = $Apparta->obtenerReservasCliente($id_cliente);
            $tipoUsuario = $Apparta->obtenerRegistro(['id_tipo_usuario' => $usuario['id_tipo_usuario']], 'tipo_usuario');
            $usuario['tipo_usuario'] = $tipoUsuario['tipo_usuario'];

            $datos = ["titulo"=>"Perfil cliente", "estilo"=>"perfil"];
            $info_cliente = ["cliente"=> $usuario, "reservas_cliente" => $reservas_cliente];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/perfil_cliente", $info_cliente);
            echo view("general/footer");
        }
    }

}