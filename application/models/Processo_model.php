<?php

class Processo_model extends CI_Model {

    public function getAll() {

        $this->db->select('processos.id, processos.datainicio, processos.horainicio, processos.datafim, processos.horafim, processos.local, processos.status, processos.idjuiz, processos.idadvogado, juizes.nome as nomejuiz, advogados.nome as nomeadvogado ');
        //indica qual a tabela que queremos selecionar
        $this->db->from('processos');
        //faz o inner join com a tabela cliente (emparelha as tabelas)
        $this->db->join('juizes', 'juizes.id = processos.idjuiz');
        $this->db->join('advogados', 'advogados.id = processos.idadvogado');

        $query = $this->db->get();
        return $query->result();
    }

    public function getOne($id) { //SELECT * FROM processos WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('processos'); //SELECT * FROM processos
        return $query->row(0); //retorna uma linha
    }

    public function insert($data = array()) {
        $this->db->insert('processos', $data);
        return $this->db->affected_rows();
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('processos', $data);

        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('processos');

        return $this->db->affected_rows();
    }

}
