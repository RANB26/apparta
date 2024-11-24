<?php

namespace App\Models;

use CodeIgniter\Model;

class AppartaModel extends Model
{
    public function listarRegistros($tabla){
        $registros = $this->db->query("SELECT * FROM ".$tabla);
        return $registros->getResult();
    }

    public function obtenerRegistro($datos, $tabla, $login = null)
    {
        $registro = $this->db->table($tabla);
        $registro->where($datos);
        if($login){
            if($registro->countAllResults() == 0) return array();
        }
        return $registro->get()->getResultArray()[0];
    }

    public function obtenerRegistrosCondicion($tabla, $condicion){
        $registros = $this->db->query("SELECT * FROM ".$tabla." WHERE ".$condicion);
        return $registros->getResult();
    }

    public function insertarRegistro($datos_crear, $tabla)
    {
        $nuevo_registro = $this->db->table($tabla);
        $nuevo_registro->insert($datos_crear);

        return $this->db->insertID();

    }

    public function actualizarRegistro($datosActualizar, $id, $tabla, $tipo_id)
    {
        $actualizar = $this->db->table($tabla);
        $actualizar->set($datosActualizar);
        $actualizar->where($tipo_id, $id);

        if($actualizar->update() === false){
            return $this->db->error();
        }else{
            return true;
        }
    }

    public function eliminarRegistro($id, $tabla)
    {
        $eliminar = $this->db->table($tabla);
        $eliminar->where($id);
        return $eliminar->delete();
    }

    public function listarUsuarios($tipo_usuario = null){

        $query = "SELECT u.*, tu.tipo_usuario
        FROM usuario u
        INNER JOIN tipo_usuario tu ON u.id_tipo_usuario = tu.id_tipo_usuario";

        if($tipo_usuario == 'Admin') $query .= " WHERE tu.id_tipo_usuario != 1";

        $registros = $this->db->query($query);
        return $registros->getResult();
    }

    public function obtenerReservasActivas($fecha_actual)
    {
        // $reservas = $this->db->query("SELECT * FROM reserva WHERE fecha_inicio <= '$fecha_actual' AND fecha_fin > '$fecha_actual' AND estado_reserva = 'Activa'");
        $reservas = $this->db->query("SELECT * FROM reserva WHERE estado_reserva = 'Activa'");
        return $reservas->getResult();
    }

    public function listarMesas($estado = null){
        
        $query = "SELECT m.id_mesa, m.id_tipo_mesa, tm.tipo_mesa, estado_mesa 
        FROM mesa m 
        INNER JOIN tipo_mesa tm ON m.id_tipo_mesa = tm.id_tipo_mesa";

        if($estado != null) $query .= " AND m.estado_mesa = '$estado'";

        $query .= " ORDER BY m.id_tipo_mesa";

        $registros = $this->db->query($query);
        return $registros->getResult();
    }

    public function listarReservas($id_reserva = null){

        $reserva = "";
        if($id_reserva != null) $reserva = " WHERE r.id_reserva = '$id_reserva' ";

        $registros = $this->db->query("
        SELECT r.id_reserva, r.id_usuario, u.nombre_usuario nombre_cliente, u.apellido_usuario apellido_cliente, r.id_mesa, tp.tipo_mesa, r.fecha_inicio, r.fecha_fin, r.num_personas, r.estado_reserva, r.fecha_registra, r.id_usuario_registra, u2.nombre_usuario nombre_registra, u2.apellido_usuario apellido_registra
        FROM reserva r
        INNER JOIN usuario u ON r.id_usuario = u.id_usuario
        INNER JOIN usuario u2 ON r.id_usuario_registra = u2.id_usuario
        INNER JOIN mesa m ON r.id_mesa = m.id_mesa
        INNER JOIN tipo_mesa tp ON m.id_tipo_mesa = tp.id_tipo_mesa 
        $reserva
        order by r.fecha_inicio DESC");
        return $registros->getResult();
    }

    public function obtenerReservasHoy(){
        $registros = $this->db->query("
        SELECT r.id_reserva, r.id_usuario, u.nombre_usuario nombre_cliente, u.apellido_usuario apellido_cliente, r.id_mesa, tp.tipo_mesa, r.fecha_inicio, r.fecha_fin, r.num_personas, r.estado_reserva
        FROM reserva r
        INNER JOIN usuario u ON r.id_usuario = u.id_usuario
        INNER JOIN mesa m ON r.id_mesa = m.id_mesa
        INNER JOIN tipo_mesa tp ON m.id_tipo_mesa = tp.id_tipo_mesa
        WHERE DATE(r.fecha_inicio) = CURDATE() and r.estado_reserva != 'Cancelada'
        order by r.fecha_inicio");
        return $registros->getResult();
    }

    public function obtenerReservasCliente($id_cliente){
        $registros = $this->db->query("
        SELECT r.id_reserva, r.id_usuario, u.nombre_usuario nombre_cliente, u.apellido_usuario apellido_cliente, r.id_mesa, tp.tipo_mesa, r.fecha_inicio, r.fecha_fin, r.num_personas, r.estado_reserva
        FROM reserva r
        INNER JOIN usuario u ON r.id_usuario = u.id_usuario
        INNER JOIN mesa m ON r.id_mesa = m.id_mesa
        INNER JOIN tipo_mesa tp ON m.id_tipo_mesa = tp.id_tipo_mesa
        WHERE r.id_usuario = $id_cliente
        order by r.fecha_inicio");
        return $registros->getResult();
    }

}