<?php

namespace App\Models;

use CodeIgniter\Model;

class AppartaModel extends Model
{
    public function listarRegistros($tabla){
        $registros = $this->db->query("SELECT * FROM ".$tabla);
        return $registros->getResult();
    }

    public function obtenerRegistro($datos, $tabla)
    {
        $registro = $this->db->table($tabla);
        $registro->where($datos);
        return $registro->get()->getResultArray()[0];
    }

    public function obtenerRegistrosCondicion($tabla, $condicion){
        $registros = $this->db->query("SELECT * FROM ".$tabla." WHERE ".$condicion);
        exit(json_encode($this->db->error()));
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

    public function obtenerReservasActivas($fecha_actual)
    {
        $reservas = $this->db->query("SELECT * FROM reserva WHERE fecha_inicio <= '$fecha_actual' AND fecha_fin > '$fecha_actual' AND estado_reserva = 'Confirmada'");
        return $reservas->getResult();
    }

    public function listarMesas(){
        $registros = $this->db->query("
        SELECT m.id_mesa, m.id_tipo_mesa, tm.tipo_mesa, estado_mesa 
        FROM mesa m 
        INNER JOIN tipo_mesa tm ON m.id_tipo_mesa = tm.id_tipo_mesa");
        return $registros->getResult();
    }

    public function obtenerReservasHoy(){
        $registros = $this->db->query("
        SELECT r.id_reserva, r.id_usuario, u.nombre_usuario nombre_cliente, u.apellido_usuario apellido_cliente, r.id_mesa, tp.tipo_mesa, r.fecha_inicio, r.fecha_fin, r.num_personas, r.estado_reserva
        FROM reserva r
        INNER JOIN usuario u ON r.id_usuario = u.id_usuario
        INNER JOIN mesa m ON r.id_mesa = m.id_mesa
        INNER JOIN tipo_mesa tp ON m.id_tipo_mesa = tp.id_tipo_mesa
        WHERE DATE(r.fecha_inicio) = CURDATE()
        order by r.fecha_inicio");
        return $registros->getResult();
    }

}