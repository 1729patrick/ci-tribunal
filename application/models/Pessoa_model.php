<?php

class Pessoa_model extends CI_Model {
    
    public function getAll(){               
        $query = $this->db->get('pessoas');
        return $query->result();
    }
    
    public function getOne($id){ //SELECT * FROM pessoas WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('pessoas'); //SELECT * FROM pessoas
        return $query->row(0); //retorna uma linha
    }
    
    public function insert($data = array()){
        $this->db->insert('pessoas', $data);
        return $this->db->affected_rows();
    }
    
    public function update($id, $data = array()){
        $this->db->where('id', $id);
        $this->db->update('pessoas', $data);
        
        return $this->db->affected_rows();
    }
    
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('pessoas');
        
        return $this->db->affected_rows();
    }
    
}
