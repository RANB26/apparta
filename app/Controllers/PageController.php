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
            $datos =["titulo"=>"Mesas y reservas", "estilo"=>"mesasyreservas"];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/mesasyreservas", $data_mesas_reservas);
            echo view("general/footer");
        }
    }

    public function asignarMesasOcupadas(){
        $Apparta = new AppartaModel();
        $mesas = $Apparta->listarRegistros('mesa');
        date_default_timezone_set('America/Bogota');
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

    public function reservar($id_cliente = null){
        
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{
            $mensaje = session('mensaje');
            $Apparta = new AppartaModel();

            $cliente_reservar = null;
            if($id_cliente != 0){
                $cliente_reservar = $Apparta->obtenerRegistro(['id_usuario' => $id_cliente], 'usuario');
                if($cliente_reservar == null){
                    return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','usuario');
                }else if($cliente_reservar['id_tipo_usuario'] != 3){
                    return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','cliente');
                }
            }

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

            $datos = ["titulo"=>"Reservar", "estilo"=>"actualizar"];
            $info_reservar = [
                "id_usuario"=>$id_usuario, 
                "clientes"=>$clientes, 
                "mesas"=> $mesas,
                "fecha_actual"=>$fecha_actual, 
                "hora_actual"=>$hora_actual, 
                "cliente_reservar"=>$cliente_reservar, 
                "mensaje" => $mensaje
            ];

            echo view("general/header", $datos);
            echo view("pages/menu");
            echo view("pages/reservar", $info_reservar);
            echo view("pages/mensajes");
            echo view("general/footer");
        }
    }

    public function crearReserva()
    {
        $id_usuario = session('id_usuario');

        if($id_usuario==""){
            return redirect()->to(base_url().route_to('login'))->with('mensaje','inicia sesion');
        }else{

            date_default_timezone_set('America/Bogota');
            $Apparta = new AppartaModel();

            $hora_inicio = $_POST['hora_inicio'];
            $hora_fin = $_POST['hora_fin'];
            $fecha_actual = date("Y-m-d");
            $hora_actual = date("H:i:s");
            $fecha_reserva = $_POST['dia_reserva'];

            $tipos_mesa = $Apparta->listarRegistros('tipo_mesa');

            if(($fecha_reserva==$fecha_actual) and ($hora_inicio<$hora_actual or $hora_fin<$hora_actual)){
                return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','hora_hoy');
            }else{
                if($hora_inicio>=$hora_fin){
                    return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','hora');
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
                        return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','capacidad');
                    }else{
                        $datos_crear = [
                            "id_usuario" => $_POST['id_usuario'],
                            "id_mesa" => $_POST['id_mesa'],
                            "fecha_inicio" => $_POST['dia_reserva']." ".$_POST['hora_inicio'],
                            "fecha_fin" => $_POST['dia_reserva']." ".$_POST['hora_fin'],
                            "num_personas" => $_POST['num_personas'],
                            "id_usuario_registra" => $_POST['id_usuario_registra']                    
                        ];
                
                        $respuesta = $Apparta->insertarRegistro($datos_crear, 'reserva');
                
                        if($respuesta>0){
                            return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','reservada');
                        }else{
                            return redirect()->to(base_url().route_to('reservar', 0))->with('mensaje','error');
                        }
                    }
                }
            }
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