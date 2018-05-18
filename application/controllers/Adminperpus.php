<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminperpus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Adminperpus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'adminperpus/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'adminperpus/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'adminperpus/index.html';
            $config['first_url'] = base_url() . 'adminperpus/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Adminperpus_model->total_rows($q);
        $adminperpus = $this->Adminperpus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'adminperpus_data' => $adminperpus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('adminperpus/adminperpus_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Adminperpus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_admin' => $row->id_admin,
		'username' => $row->username,
		'password' => $row->password,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('adminperpus/adminperpus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminperpus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('adminperpus/create_action'),
	    'id_admin' => set_value('id_admin'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('adminperpus/adminperpus_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Adminperpus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('adminperpus'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Adminperpus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('adminperpus/update_action'),
		'id_admin' => set_value('id_admin', $row->id_admin),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('adminperpus/adminperpus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminperpus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_admin', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Adminperpus_model->update($this->input->post('id_admin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('adminperpus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Adminperpus_model->get_by_id($id);

        if ($row) {
            $this->Adminperpus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('adminperpus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adminperpus'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Adminperpus.php */
/* Location: ./application/controllers/Adminperpus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-15 06:02:23 */
/* http://harviacode.com */