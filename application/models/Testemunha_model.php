<?php

class Testemunha_model extends CI_Model {

    public function getAll() {

        $this->db->select('testemunhas.id, testemunhas.idpessoa, pessoas.nome as nomepessoa, pessoas.cpf as cpfpessoa, pessoas.rg as rgpessoa, pessoas.telefone as telefonepessoa, pessoas.endereco as enderecopessoa');
        //indica qual a tabela que queremos selecionar
        $this->db->from('testemunhas');
        //faz o inner join com a tabela cliente (emparelha as tabelas)
        $this->db->join('pessoas', 'pessoas.id = testemunhas.idpessoa');

        $query = $this->db->get('');
        return $query->result();
    }

    public function getOne($id) { //SELECT * FROM testemunhas WHERE id = 3
        $this->db->where('id', $id);        //WHERE id = 3
        $query = $this->db->get('testemunhas'); //SELECT * FROM testemunhas
        return $query->row(0); //retorna uma linha
    }

    public function insert($data = array()) {
        $this->db->insert('testemunhas', $data);
        return $this->db->affected_rows();
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('testemunhas', $data);

        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('testemunhas');

        return $this->db->affected_rows();
    }

}
