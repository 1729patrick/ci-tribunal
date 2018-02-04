<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advogado extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'advogado';
    }

    public function Listar() {
        $this->load->model('Advogado_model', 'jm');
        $this->data['advogado'] = $this->jm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaAdvogados', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('oab', 'oab', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $this->data);
            $this->load->view('FormAdvogado');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Advogado_model', 'jm');

            $data = array(
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'oab' => $this->input->post('oab'),
                'endereco' => $this->input->post('endereco')
            );

            if ($this->jm->insert($data)) {
                redirect('Advogado/Listar');
            } else {
                redirect('Advogado/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Advogado_model', 'jm');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('oab', 'oab', 'required');
            $this->form_validation->set_rules('endereco', 'endereco', 'required');

            if ($this->form_validation->run() == false) {
                $this->data['advogado'] = $this->jm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormAdvogado', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf'),
                    'telefone' => $this->input->post('telefone'),
                    'email' => $this->input->post('email'),
                    'oab' => $this->input->post('oab'),
                    'endereco' => $this->input->post('endereco')
                );

                if ($this->jm->update($id, $data)) {
                    redirect('Advogado/Listar');
                } else {
                    redirect('Advogado/Alterar/' . $id);
                }
            }
        } else {
            redirect('Advogado/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Advogado_model', 'jm');
            $this->jm->delete($id); //deleta o registro
        }
        redirect('Advogado/Listar');
    }

}
