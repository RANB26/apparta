<?php

namespace App\Models;

use CodeIgniter\Model;

class HouslysModel extends Model
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
        return $registro->get()->getResultArray();

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
        return $actualizar->update();

    }

    public function eliminarRegistro($id, $tabla)
    {
        $eliminar = $this->db->table($tabla);
        $eliminar->where($id);
        return $eliminar->delete();
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