<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'pessoa';
    }

    public function Listar() {
        $this->load->model('Pessoa_model', 'pm');
        $this->data['pessoa'] = $this->pm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaPessoa', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $this->data);
            $this->load->view('FormPessoa');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Pessoa_model', 'pm');

            $data = array(
                'nome' => $this->input->post('nome'),
                'cpf' => $this->input->post('cpf'),
                'rg' => $this->input->post('rg'),
                'telefone' => $this->input->post('telefone'),
                'endereco' => $this->input->post('endereco')
            );

            if ($this->pm->insert($data)) {
                redirect('Pessoa/Listar');
            } else {
                redirect('Pessoa/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Pessoa_model', 'pm');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            $this->form_validation->set_rules('endereco', 'endereco', 'required');

            if ($this->form_validation->run() == false) {
                $this->data['pessoa'] = $this->pm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormPessoa', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'cpf' => $this->input->post('cpf'),
                    'rg' => $this->input->post('rg'),
                    'telefone' => $this->input->post('telefone'),
                    'endereco' => $this->input->post('endereco')
                );

                if ($this->pm->update($id, $data)) {
                    redirect('Pessoa/Listar');
                } else {
                    redirect('Pessoa/Alterar/' . $id);
                }
            }
        } else {
            redirect('Pessoa/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Pessoa_model', 'pm');
            $this->pm->delete($id); //deleta o registro
        }
        redirect('Pessoa/Listar');
    }

}
