<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ModelJurusan extends Model
{
   
protected $table = 'tbl_jurusan';
 
    public function getJurusan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_jurusan' => $id])->getRowArray();
        }  
    }
     
    public function insertJurusan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

}