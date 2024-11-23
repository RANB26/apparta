<?php

namespace App\Controllers;

use App\Models\AppartaModel;

class PageController extends BaseController{

    public function mesasReservas(){
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $Apparta = new AppartaModel();
            $this->asignarMesasOcupadas();
            $mesas = $Apparta->listarMesas();

            $reservas_hoy = $Apparta->obtenerReservasHoy();
            $data_mesas_reservas = ["mesas" => $mesas, "reservas_hoy" => $reservas_hoy];
            $datos =["titulo"=>"Mesas", "estilo"=>"mesasyreservas"];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/mesasyreservas", $data_mesas_reservas);
            echo view("general/footer");
        }
    }

    public function asignarMesasOcupadas(){
        $Apparta = new AppartaModel();
        $mesas = $Apparta->listarRegistros('mesa');
        $fechaActual = date('Y-m-d H:i:s');
        $reservas_activas = $Apparta->obtenerReservasActivas($fechaActual);
        foreach($mesas as $mesa){
            $mesa->estado_mesa = "Disponible";
            foreach($reservas_activas as $reserva){
                if($reserva->id_mesa == $mesa->id_mesa){
                    $mesa->estado_mesa = "Ocupada";
                }
            }
        }
        foreach($mesas as $mesa){
            $datos_actualizar = ["estado_mesa" => $mesa->estado_mesa];
            $Apparta->actualizarRegistro($datos_actualizar, $mesa->id_mesa, 'mesa', 'id_mesa');
        }
    }

    public function reservar(){
        
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

    public function perfil(){

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $tipo_usuario = session('tipo_usuario');
            $nombre_usuario = session('nombre_usuario');
            $mensaje = session('mensaje');

            $Apparta = new AppartaModel();
            // $reservas_actuales = $Apparta->obtenerRegistrosCondicion('reserva', "id_usuario='".$id_usuario."' AND estado_reserva='confirmada'");
            // $historial_reservas = $Apparta->obtenerRegistrosCondicion('reverva', "id_usuario='".$id_usuario."' AND estado_reserva<>'confirmada'");

            $datos =["titulo"=>"Mi perfil", "estilo"=>"perfil"];
            $datos_perfil = ["mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/perfil", $datos_perfil);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function actualizarPerfil($id_usuario)
    {
        $id = session('id_usuario');

        if($id==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            if($id_usuario!=session('id_usuario')){
                return redirect()->to(base_url().route_to('perfil'))->with('mensaje','permisos');
            }else{
                $mensaje = session('mensaje');
    
                $Apparta = new AppartaModel();
                $usuario = $Apparta->ObtenerRegistro(['id_usuario' => $id_usuario], 'usuario');
                $tipoUsuario = $Apparta->obtenerRegistro(['id_tipo_usuario' => $usuario['id_tipo_usuario']], 'tipo_usuario');
                $usuario['tipo_usuario'] = $tipoUsuario['tipo_usuario'];
    
                $datos =["titulo"=>"Actualizar mi perfil", "estilo"=>"actualizar"];
                $info_usuario = ["info_usuario"=>$usuario, "mensaje" => $mensaje];
    
                echo view("general/header", $datos);
                echo view("pages/menu");
                echo view("pages/actualizarmiperfil", $info_usuario);
                echo view("pages/mensajes");
                echo view("general/footer");
            }
        }
    }

}