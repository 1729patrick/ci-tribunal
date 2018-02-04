<?php

class Jurado_model extends CI_Model {

    public function getAll() {

        $this->db->select('jurados.id, jurados.idpessoa, pessoas.nome as nomepessoa, pessoas.cpf as cpfpessoa, pessoas.rg as rgpessoa, pessoas.telefone as telefonepessoa, pessoas.endereco as enderecopessoa');
          //indica qual a tabela que queremos selecionar
        $this->db->from('jurados');
        //faz o inner join com a tabela pessoas (emparelha as tabelas)
        $this->db->join('pessoas', 'pessoas.id = jurados.idpessoa');

        $query = $this->db->get('');
        return $query->result();
    }

    public function getOne($id) { //SELECT * FROM jurados WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('jurados'); //SELECT * FROM jurados
        return $query->row(0); //retorna uma linha
    }

    public function insert($data = array()) {
        $this->db->insert('jurados', $data);
        return $this->db->affected_rows();
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('jurados', $data);

        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('jurados');

        return $this->db->affected_rows();
    }

}
