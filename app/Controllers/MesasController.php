<?php

namespace App\Controllers;

use App\Models\AppartaModel;

class MesasController extends BaseController
{

    public function gesMesas()
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $mensaje = session('mensaje');

            $Apparta = new AppartaModel();
            $mesas = $Apparta->listarMesas();

            $datos =["titulo"=>"Gestionar mesas", "estilo"=>"gestionar"];
            $lista_mesas = ["mesas" => $mesas, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesmesas", $lista_mesas);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
        
    }

    public function gesMesa($id_mesa){

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $mensaje = session('mensaje');

            $Apparta = new AppartaModel();
            $mesa = $Apparta->ObtenerRegistro(['id_mesa' => $id_mesa], 'mesa');
            $tipos_mesa = $Apparta->listarRegistros('tipo_mesa');

            $datos =["titulo"=>"Gestionar mesa", "estilo"=>"actualizar", "tipos_mesa" => $tipos_mesa];
            $info_mesa = ["info_mesa"=>$mesa, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesmesa", $info_mesa);
            echo view("pages/mensajes");
            echo view("general/footer");
        }

    }

    public function actualizarMesa()
    {

        $id_mesa = $_POST['id_mesa'];
        $datos_actualizar = ["id_tipo_mesa" => $_POST['id_tipo_mesa'], "estado_mesa" =>  $_POST['estado_mesa']];

        $Apparta = new AppartaModel();
        $respuesta = $Apparta->actualizarRegistro($datos_actualizar, $id_mesa, 'mesa', 'id_mesa');

        if($respuesta){
            return redirect()->to(base_url().'gesmesas/mesa/'.$id_mesa)->with('mensaje','registro actualizado');
        }else{
            return redirect()->to(base_url().'gesmesas/mesa/'.$id_mesa)->with('mensaje','error');
        }

    }

    public function eliminarMesa($id_usuario)
    {

        $Apparta = new AppartaModel();
        $datos =["id_mesa" => $id_usuario];

        $respuesta = $Apparta->eliminarRegistro($datos, 'mesa');
        if($respuesta){
            return redirect()->to(base_url().route_to('gesmesas'))->with('mensaje','mesa eliminada');
        }else{
            return redirect()->to(base_url().route_to('gesmesas'))->with('mensaje','error');
        }

    }

}