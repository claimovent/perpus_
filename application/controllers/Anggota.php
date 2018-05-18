<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota/index.html';
            $config['first_url'] = base_url() . 'anggota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_model->total_rows($q);
        $anggota = $this->Anggota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'anggota_data' => $anggota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('anggota/anggota_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_anggota' => $row->id_anggota,
		'nama_anggota' => $row->nama_anggota,
		'alamat_anggota' => $row->alamat_anggota,
		'telpon' => $row->telpon,
		'tgl_lahir' => $row->tgl_lahir,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('anggota/anggota_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('anggota/create_action'),
	    'id_anggota' => set_value('id_anggota'),
	    'nama_anggota' => set_value('nama_anggota'),
	    'alamat_anggota' => set_value('alamat_anggota'),
	    'telpon' => set_value('telpon'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('anggota/anggota_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat_anggota' => $this->input->post('alamat_anggota',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'nama_anggota' => set_value('nama_anggota', $row->nama_anggota),
		'alamat_anggota' => set_value('alamat_anggota', $row->alamat_anggota),
		'telpon' => set_value('telpon', $row->telpon),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('anggota/anggota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_anggota', TRUE));
        } else {
            $data = array(
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat_anggota' => $this->input->post('alamat_anggota',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Anggota_model->update($this->input->post('id_anggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_anggota', 'nama anggota', 'trim|required');
	$this->form_validation->set_rules('alamat_anggota', 'alamat anggota', 'trim|required');
	$this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('id_anggota', 'id_anggota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-15 06:02:23 */
/* http://harviacode.com */