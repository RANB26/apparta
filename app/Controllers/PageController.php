<?php

namespace App\Controllers;

use App\Models\HouslysModel;

class PageController extends BaseController
{
    public function perfil()
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $tipo_usuario = session('tipo_usuario');
            $nombre_usuario = session('nombre_usuario');
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $viviendas = $Houslys->obtenerRegistrosCondicion('vivienda', "id_usuario='".$id_usuario."'");
            $favoritos = $Houslys->obtenerRegistrosCondicion('vivienda', "id_vivienda IN (SELECT id_vivienda FROM favorito WHERE id_usuario ='".$id_usuario."')");

            $datos =["titulo"=>"Mi perfil", "estilo"=>"perfil"];
            $lista_viviendas = ["viviendas_publicadas" => $viviendas, "viviendas_favoritas" => $favoritos, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            
            if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                echo view("pages/admin/menu");
            }else{
                echo view("pages/menu");
            }
            echo view("pages/perfil", $lista_viviendas);
            echo view("general/footer");
        }
    }

    public function actualizarPerfil($id_usuario)
    {
        $id = session('id_usuario');
        $tipo_usuario = session('tipo_usuario');

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
            if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                echo view("pages/admin/menu");
            }else{
                echo view("pages/menu");
            }
            echo view("pages/actualizarmiperfil", $info_usuario);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function actualizarMiVivienda($id_vivienda)
    {
        $id = session('id_usuario');
        $tipo_usuario = session('tipo_usuario');

        if($id==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');

            $Houslys = new HouslysModel();
            $vivienda= $Houslys->ObtenerRegistro(['id_vivienda' => $id_vivienda], 'vivienda');

            if($id != $vivienda[0]['id_usuario']){
                return redirect()->to(base_url().route_to('perfil'))->with('mensaje','error_propietario');
            }else{
                $datos =["titulo"=>"Actualizar mi vivienda", "estilo"=>"actualizar"];
                $info_vivienda = ["info_vivienda"=>$vivienda, "mensaje" => $mensaje];

                echo view("general/header", $datos);
                if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                    echo view("pages/admin/menu");
                }else{
                    echo view("pages/menu");
                }
                echo view("pages/actualizarmivivienda", $info_vivienda);
                echo view("pages/mensajes");
                echo view("general/footer");
            }
        }
    }

    public function actualizarViviendaUsuario()
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
            return redirect()->to(base_url().'/actualizarmivivienda/'.$id_vivienda)->with('mensaje','registro actualizado');
        }else{
            return redirect()->to(base_url().'/actualizarmivivienda/'.$id_vivienda)->with('mensaje','error');
        }

    }

    public function eliminarMiVivienda($id_vivienda)
    {
        $id = session('id_usuario');
        $Houslys = new HouslysModel();
        $vivienda = $Houslys->ObtenerRegistro(['id_vivienda' => $id_vivienda], 'vivienda');

        if($id != $vivienda[0]['id_usuario']){
            return redirect()->to(base_url().route_to('perfil'))->with('mensaje','error_propietario');
        }else{
            $datos = ["id_vivienda" => $id_vivienda];
            $respuesta = $Houslys->eliminarRegistro($datos, 'vivienda');

            if($respuesta){
                return redirect()->to(base_url().route_to('perfil'))->with('mensaje','vivienda eliminada');
            }else{
                return redirect()->to(base_url().route_to('perfil'))->with('mensaje','error_vivienda');
            }
        }

    }

    public function publicar()
    {
        
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{
            $mensaje = session('mensaje');
            $tipo_usuario = session('tipo_usuario');
            
            $datos =["titulo"=>"Publicar una vivienda", "estilo"=>"actualizar"];
            $usuario =["id_usuario"=>$id_usuario, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                echo view("pages/admin/menu");
            }else{
                echo view("pages/menu");
            }
            echo view("pages/publicar", $usuario);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function viviendas()
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }
        else{

            $tipo_usuario = session('tipo_usuario');

            $Houslys = new HouslysModel();
            $viviendas = $Houslys->obtenerRegistrosCondicion('vivienda', "estado_vivienda='Desocupada' and id_usuario!='".$id_usuario."'");
            $favoritos = $Houslys->obtenerRegistrosCondicion('favorito', "id_usuario='".$id_usuario."'");

            $lista_viviendas = ["viviendas" => $viviendas, "favoritos" => $favoritos];
            $datos =["titulo"=>"Viviendas disponibles", "estilo"=>"viviendas"];

            echo view("general/header", $datos);
            if($tipo_usuario=='Admin' or $tipo_usuario=='SuperAdmin'){
                echo view("pages/admin/menu");
            }else{
                echo view("pages/menu");
            }
            echo view("pages/viviendas", $lista_viviendas);
            echo view("general/footer");
        }
    }

    public function crearVivienda()
    {

        date_default_timezone_set('America/Bogota');
        $fecha_actual = getdate()['year']."-".getdate()['mon']."-".getdate()['mday']." ".getdate()['hours'].":".getdate()['minutes'].":00";

        $datos_crear = [
            "id_usuario" => $_POST['id_usuario'],
            "fpublicacion_vivienda" => $fecha_actual,
            "tipo_vivienda" => $_POST['tipo_vivienda'],
            "precio_vivienda" => $_POST['precio_vivienda'],
            "estado_vivienda" => "Desocupada",
            "direccion_vivienda" => "Cra ".$_POST['numcarrera_vivienda'].$_POST['letracarrera_vivienda']." #".$_POST['numcalle_vivienda']."-".$_POST['num_vivienda'],
            "numcarrera_vivienda" => $_POST['numcarrera_vivienda'],
            "letracarrera_vivienda" => $_POST['letracarrera_vivienda'],
            "numcalle_vivienda" => $_POST['numcalle_vivienda'],
            "num_vivienda" => $_POST['num_vivienda'],
            "latitud_vivienda" => $_POST['latitud_vivienda'],
            "longitud_vivienda" => $_POST['longitud_vivienda'],
            "area_vivienda" => $_POST['area_vivienda'],
            "estrato_vivienda" => $_POST['estrato_vivienda'],
            "numbaño_vivienda" => $_POST['numbaño_vivienda'],
            "numhabitaciones_vivienda" => $_POST['numhabitaciones_vivienda'],
            "descripcion_vivienda" => $_POST['descripcion_vivienda']
        ];

        $Houslys = new HouslysModel();
        $respuesta = $Houslys->insertarRegistro($datos_crear, 'vivienda');

        if($respuesta>0){
            return redirect()->to(base_url().route_to('publicar'))->with('mensaje','vivienda publicada');
        }else{
            return redirect()->to(base_url().route_to('publicar'))->with('mensaje','error');
        }
    }

    public function Xml()
    {
        $Houslys = new HouslysModel();
        $viviendas = $Houslys->listarRegistros('vivienda');

        $lista_viviendas = ["viviendas" => $viviendas];

        echo view("pages/xml", $lista_viviendas);
    }

    public function favorito()
    {

        $id_usuario = session('id_usuario');
        $id_vivienda = $_POST['id_vivienda'];

        $Houslys = new HouslysModel();
        $favorito_existe = $Houslys->obtenerRegistrosCondicion('favorito', "id_vivienda='".$id_vivienda."' and id_usuario='".$id_usuario."'");

        if($favorito_existe){
            $Houslys->favorito($id_usuario, $id_vivienda, "eliminar");
            echo "0";
        }else{

            $Houslys->favorito($id_usuario, $id_vivienda, "insertar");
            echo "1";
        }

    }


}