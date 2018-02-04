<?php

class Advogado_model extends CI_Model {
    
    public function getAll(){               
        $query = $this->db->get('advogados');
        return $query->result();
    }
    
    public function getOne($id){ //SELECT * FROM advogados WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('advogados'); //SELECT * FROM advogados
        return $query->row(0); //retorna uma linha
    }
    
    public function insert($data = array()){
        $this->db->insert('advogados', $data);
        return $this->db->affected_rows();
    }
    
    public function update($id, $data = array()){
        $this->db->where('id', $id);
        $this->db->update('advogados', $data);
        
        return $this->db->affected_rows();
    }
    
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('advogados');
        
        return $this->db->affected_rows();
    }
    
}
