<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Processo extends CI_Controller
{

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['menu'] = 'processo';
    }

    public function Listar()
    {
        $this->load->model('Processo_model', 'jm');
        $this->data['processo'] = $this->jm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaProcessos', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar()
    {
        $this->form_validation->set_rules('idjuiz', 'idjuiz', 'required');
        $this->form_validation->set_rules('idadvogado', 'idadvogado', 'required');
        $this->form_validation->set_rules('datainicio', 'datainicio', 'required');
        $this->form_validation->set_rules('horainicio', 'horainicio', 'required');
        $this->form_validation->set_rules('datafim', 'datafim', 'required');
        $this->form_validation->set_rules('horafim', 'horafim', 'required');
        $this->form_validation->set_rules('local', 'local', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Juiz_model', 'jm');
            $this->data['juizes'] = $this->jm->getAll();

            $this->load->model('Advogado_model', 'am');
            $this->data['advogados'] = $this->am->getAll();

            $this->load->view('header', $this->data);
            $this->load->view('FormProcesso');
            $this->load->view('footer');
        } else {
            //salva no banco....            
            $this->load->model('Processo_model', 'pm');
            $data = array(
                'idjuiz' => $this->input->post('idjuiz'),
                'idadvogado' => $this->input->post('idadvogado'),
                'datainicio' => $this->input->post('datainicio'),
                'horainicio' => $this->input->post('horainicio'),
                'datafim' => $this->input->post('datafim'),
                'horafim' => $this->input->post('horafim'),
                'local' => $this->input->post('local'),
                'status' => $this->input->post('status')
            );

            if ($this->pm->insert($data)) {
                redirect('Processo/Listar');
            } else {
                redirect('Processo/Cadastrar');
            }
        }
    }

    public function Alterar($id)
    {
        if ($id > 0) {
            //alteração
            $this->load->model('Processo_model', 'pm');
            $this->form_validation->set_rules('idjuiz', 'idjuiz', 'required');
            $this->form_validation->set_rules('idadvogado', 'idadvogado', 'required');
            $this->form_validation->set_rules('datainicio', 'datainicio', 'required');
            $this->form_validation->set_rules('horainicio', 'horainicio', 'required');
            $this->form_validation->set_rules('datafim', 'datafim', 'required');
            $this->form_validation->set_rules('horafim', 'horafim', 'required');
            $this->form_validation->set_rules('local', 'local', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');


            if ($this->form_validation->run() == false) {
                $this->load->model('Juiz_model', 'jm');
                $this->data['juizes'] = $this->jm->getAll();

                $this->load->model('Advogado_model', 'am');
                $this->data['advogados'] = $this->am->getAll();


                $this->data['processo'] = $this->pm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormProcesso', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'idjuiz' => $this->input->post('idjuiz'),
                    'idadvogado' => $this->input->post('idadvogado'),
                    'datainicio' => $this->input->post('datainicio'),
                    'horainicio' => $this->input->post('horainicio'),
                    'datafim' => $this->input->post('datafim'),
                    'horafim' => $this->input->post('horafim'),
                    'local' => $this->input->post('local'),
                    'status' => $this->input->post('status'),
                );

                if ($this->pm->update($id, $data)) {
                    redirect('Processo/Listar');
                } else {
                    redirect('Processo/Alterar/' . $id);
                }
            }
        } else {
            redirect('Processo/Listar');
        }
    }

    public function Excluir($id)
    {
        if ($id > 0) {
            $this->load->model('Processo_model', 'pm');
            $this->pm->delete($id); //deleta o registro
        }
        redirect('Processo/Listar');
    }

}
