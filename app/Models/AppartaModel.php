<?php

namespace App\Models;

use CodeIgniter\Model;

class AppartaModel extends Model
{
    public function listarRegistros($tabla)
    {

        $registros = $this->db->query("SELECT * FROM ".$tabla);
        return $registros->getResult();

    }

    public function obtenerRegistro($datos, $tabla)
    {

        $registro = $this->db->table($tabla);
        $registro->where($datos);
        return $registro->get()->getResultArray()[0];

    }

    public function obtenerRegistrosCondicion($tabla, $condicion)
    {

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

    public function obtenerReservasActivas()
    {
        $reservas = $this->db->query("SELECT * FROM reserva WHERE fecha_inicio >= GETDATE() AND fecha_fin < GETDATE() AND estado_reserva = 'confirmada'");
        return $reservas->getResult();
    }

    public function favorito($id_usuario, $id_vivienda, $condicion)
    {
        if($condicion == "insertar"){
            $this->db->query("INSERT INTO favorito(id_usuario, id_vivienda) VALUES (".$id_usuario.", ".$id_vivienda.")");
        }
        else{
            $this->db->query("DELETE FROM favorito WHERE id_usuario='".$id_usuario."' and id_vivienda='".$id_vivienda."' ");
        }

    }

}