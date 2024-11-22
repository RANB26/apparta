<?php

namespace App\Controllers;

use App\Models\HouslysModel;

class ViviendasController extends BaseController
{

    public function gesViviendas()
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $viviendas = $Houslys->listarRegistros('vivienda');

            $datos =["titulo"=>"Gestionar viviendas", "estilo"=>"gestionar"];
            $lista_viviendas = ["viviendas" => $viviendas, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/admin/menu");
            echo view("pages/admin/gesviviendas", $lista_viviendas);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
        
    }

    public function gesVivienda($id_vivienda)
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $vivienda = $Houslys->ObtenerRegistro(['id_vivienda' => $id_vivienda], 'vivienda');

            $datos =["titulo"=>"Gestionar viviendas", "estilo"=>"actualizar"];
            $info_vivienda = ["info_vivienda"=>$vivienda, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/admin/menu");
            echo view("pages/admin/gesvivienda", $info_vivienda);
            echo view("pages/mensajes");
            echo view("general/footer");
        }

    }

    public function actualizarVivienda()
    {

        $id_vivienda = $_POST['id_vivienda'];

        $datos_actualizar = [
            "id_usuario" => $_POST['id_usuario'],
            "tipo_vivienda" =>  $_POST['tipo_vivienda'],
            "precio_vivienda" => $_POST['precio_vivienda'],
            "estado_vivienda" => $_POST['estado_vivienda'],
            "fpublicacion_vivienda" => $_POST['fpublicacion_vivienda'],
            "direccion_vivienda" => "Cra ".$_POST['numcarrera_vivienda'].$_POST['letracarrera_vivienda']." #".$_POST['numcalle_vivienda']."-".$_POST['num_vivienda'],
            "numcarrera_vivienda" => $_POST['numcarrera_vivienda'],
            "letracarrera_vivienda" => $_POST['letracarrera_vivienda'],
            "numcalle_vivienda" => $_POST['numcalle_vivienda'],
            "num_vivienda" => $_POST['num_vivienda'],
            "latitud_vivienda" => $_POST['latitud_vivienda'],
            "longitud_vivienda" => $_POST['longitud_vivienda'],
            "estrato_vivienda" => $_POST['estrato_vivienda'],
            "area_vivienda" => $_POST['area_vivienda'],
            "numbaño_vivienda" => $_POST['numbaño_vivienda'],
            "numhabitaciones_vivienda" => $_POST['numhabitaciones_vivienda'],
            "descripcion_vivienda" => $_POST['descripcion_vivienda']
            
        ];

        $Houslys = new HouslysModel();
        $respuesta = $Houslys->actualizarRegistro($datos_actualizar, $id_vivienda, 'vivienda', 'id_vivienda');

        if($respuesta){
            return redirect()->to(base_url().'gesviviendas/vivienda/'.$id_vivienda)->with('mensaje','registro actualizado');
        }else{
            return redirect()->to(base_url().'gesviviendas/vivienda/'.$id_vivienda)->with('mensaje','error');
        }

    }

    public function eliminarVivienda($id_usuario)
    {

        $Houslys = new HouslysModel();
        $datos =["id_vivienda" => $id_usuario];

        $respuesta = $Houslys->eliminarRegistro($datos, 'vivienda');

        if($respuesta){
            return redirect()->to(base_url().route_to('gesviviendas'))->with('mensaje','vivienda eliminada');
        }else{
            return redirect()->to(base_url().route_to('gesviviendas'))->with('mensaje','error');
        }

    }

    public function vivienda($id_vivienda)
    {
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{

            $tipo_usuario = session('tipo_usuario');

            $Houslys = new HouslysModel();
            $vivienda = $Houslys->ObtenerRegistro(['id_vivienda' => $id_vivienda], 'vivienda');
            $propietario = $Houslys->ObtenerRegistro(['id_usuario' => $vivienda[0]['id_usuario']], 'usuario');

            $datos =["titulo"=>"Vivienda", "estilo"=>"vivienda"];
            $info_vivienda = ["info_vivienda"=>$vivienda, "propietario"=>$propietario];

            echo view("general/header", $datos);
            if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                echo view("pages/admin/menu");
            }else{
                echo view("pages/menu");
            }
            echo view("pages/vivienda", $info_vivienda);
            echo view("general/footer");
        }

    }

}