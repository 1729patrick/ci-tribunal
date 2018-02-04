<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Juiz extends CI_Controller {

    public $data = array();
    
    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'juiz';
    }

    public function Listar() {
        $this->load->model('Juiz_model', 'jm');
        $this->data['juizes'] = $this->jm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaJuizes', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('oab', 'oab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $this->data);
            $this->load->view('FormJuiz');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Juiz_model', 'jm');

            $data = array(
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'oab' => $this->input->post('oab')
            );

            if ($this->jm->insert($data)) {
                redirect('Juiz/Listar');
            } else {
                redirect('Juiz/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Juiz_model', 'jm');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('oab', 'oab', 'required');

            if ($this->form_validation->run() == false) {
                $this->data['juiz'] = $this->jm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormJuiz', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf'),
                    'telefone' => $this->input->post('telefone'),
                    'email' => $this->input->post('email'),
                    'oab' => $this->input->post('oab')
                );

                if ($this->jm->update($id, $data)) {
                    redirect('Juiz/Listar');
                } else {
                    redirect('Juiz/Alterar/' . $id);
                }
            }
        } else {
            redirect('Juiz/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Juiz_model', 'jm');
            $this->jm->delete($id); //deleta o registro
        }
        redirect('Juiz/Listar');
    }

}
