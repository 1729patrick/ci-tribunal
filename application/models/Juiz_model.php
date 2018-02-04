<?php

class Juiz_model extends CI_Model {
    
    public function getAll(){               
        $query = $this->db->get('juizes');
        return $query->result();
    }
    
    public function getOne($id){ //SELECT * FROM juizes WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('juizes'); //SELECT * FROM juizes
        return $query->row(0); //retorna uma linha
    }
    
    public function insert($data = array()){
        $this->db->insert('juizes', $data);
        return $this->db->affected_rows();
    }
    
    public function update($id, $data = array()){
        $this->db->where('id', $id);
        $this->db->update('juizes', $data);
        
        return $this->db->affected_rows();
    }
    
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('juizes');
        
        return $this->db->affected_rows();
    }
    
}
