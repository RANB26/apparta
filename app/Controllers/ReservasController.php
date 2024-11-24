<?php

namespace App\Controllers;

use App\Models\AppartaModel;

class ReservasController extends BaseController
{

    public function gesReservas()
    {

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $mensaje = session('mensaje');

            $Apparta = new AppartaModel();
            $reservas = $Apparta->listarReservas();

            $datos =["titulo"=>"Gestionar reservas", "estilo"=>"gestionar"];
            $lista_reservas = ["reservas" => $reservas, "mensaje" => $mensaje];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesreservas", $lista_reservas);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
        
    }

    public function gesReserva($id_reserva){

        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $mensaje = session('mensaje');
            $Apparta = new AppartaModel();

            $reserva = $Apparta->listarReservas($id_reserva);

            $clientes = $Apparta->obtenerRegistrosCondicion('usuario', 'id_tipo_usuario = 3');
            $mesas = $Apparta->listarMesas();

            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y-m-d");
            $hora_actual = time();
            $minutos = date('i', $hora_actual);
            $minutos = $minutos == 55 ? '00' : $minutos+5;
            $minutos_redondeados = floor($minutos / 5) * 5;
            $hora_redondeada = strtotime(date('H', $hora_actual) . ':' . str_pad($minutos_redondeados, 2, '0', STR_PAD_LEFT));
            $hora_actual = date('H:i:00', $hora_redondeada);

            $datos = ["titulo"=>"Actualizar reserva", "estilo"=>"actualizar"];
            $info_reserva = [
                "reserva"=>$reserva, 
                "clientes"=>$clientes, 
                "mesas"=> $mesas, 
                "fecha_actual"=>$fecha_actual, 
                "hora_actual"=>$hora_actual, 
                "mensaje" => $mensaje
            ];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/gesreserva", $info_reserva);
            echo view("pages/mensajes");
            echo view("general/footer");
        }

    }

    public function actualizarReserva()
    {

        $Apparta = new AppartaModel();
        date_default_timezone_set('America/Bogota');
        $id_reserva = $_POST['id_reserva'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $fecha_actual = date("Y-m-d");
        $hora_actual = date("H:i:s");
        $fecha_reserva = $_POST['dia_reserva'];

        $tipos_mesa = $Apparta->listarRegistros('tipo_mesa');
        if(($fecha_reserva==$fecha_actual) and ($hora_inicio<$hora_actual or $hora_fin<$hora_actual)){
            return redirect()->to(base_url().'gesreservas/reserva/'.$id_reserva)->with('mensaje','hora_hoy');
        }else{
            if($hora_inicio>=$hora_fin){
                return redirect()->to(base_url().'gesreservas/reserva/'.$id_reserva)->with('mensaje','hora');
            }else{
                $num_personas_valido = true;
                foreach($tipos_mesa as $tipo_mesa){
                    if($tipo_mesa->id_tipo_mesa == $_POST['id_mesa']){
                        if($tipo_mesa->capacidad_mesa < $_POST['num_personas']){
                            $num_personas_valido = false;
                        }
                    }
                }
    
                if(!$num_personas_valido){
                    return redirect()->to(base_url().'gesreservas/reserva/'.$id_reserva)->with('mensaje','capacidad');
                }else{
                    $datos_actualizar = [
                        "id_usuario" => $_POST['id_usuario'],
                        "id_mesa" => $_POST['id_mesa'],
                        "fecha_inicio" => $_POST['dia_reserva']." ".$_POST['hora_inicio'],
                        "fecha_fin" => $_POST['dia_reserva']." ".$_POST['hora_fin'],
                        "num_personas" => $_POST['num_personas'],
                        "estado_reserva" => $_POST['estado_reserva']                    
                    ];
            
                    $respuesta = $Apparta->actualizarRegistro($datos_actualizar, $id_reserva, 'reserva', 'id_reserva');
    
                    if($respuesta){
                        return redirect()->to(base_url().'gesreservas/reserva/'.$id_reserva)->with('mensaje','registro actualizado');
                    }else{
                        return redirect()->to(base_url().'gesreservas/reserva/'.$id_reserva)->with('mensaje','error');
                    }
                }
            }
        }

    }

    public function cancelarReserva($id_reserva){
        $respuesta = $this->cambiarEstadoReserva($id_reserva, 'Cancelada');
        if($respuesta==true){
            return redirect()->to(base_url().'gesreservas')->with('mensaje','reserva cancelada');
        }else{
            return redirect()->to(base_url().'gesreservas')->with('mensaje','error_cancelar');
        }
    }

    public function cambiarEstadoReserva($id_reserva, $estado){

        $Apparta = new AppartaModel();
        $datos_actualizar = ["estado_reserva" => $estado];

        $respuesta = $Apparta->actualizarRegistro($datos_actualizar, $id_reserva, 'reserva', 'id_reserva');
        if($respuesta === true){
            return true;
        }else{
            return false;
        }

    }

}