<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'peminjaman/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'peminjaman/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'peminjaman/index.html';
            $config['first_url'] = base_url() . 'peminjaman/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Peminjaman_model->total_rows($q);
        $peminjaman = $this->Peminjaman_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'peminjaman_data' => $peminjaman,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('peminjaman/peminjaman_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_pinjam' => $row->no_pinjam,
		'id_anggota' => $row->id_anggota,
		'id_buku' => $row->id_buku,
		'nama_anggota' => $row->nama_anggota,
		'alamat_anggota' => $row->alamat_anggota,
		'nama_buku' => $row->nama_buku,
		'tgl_pinjam' => $row->tgl_pinjam,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('peminjaman/peminjaman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('peminjaman/create_action'),
	    'no_pinjam' => set_value('no_pinjam'),
	    'id_anggota' => set_value('id_anggota'),
	    'id_buku' => set_value('id_buku'),
	    'nama_anggota' => set_value('nama_anggota'),
	    'alamat_anggota' => set_value('alamat_anggota'),
	    'nama_buku' => set_value('nama_buku'),
	    'tgl_pinjam' => set_value('tgl_pinjam'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('peminjaman/peminjaman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat_anggota' => $this->input->post('alamat_anggota',TRUE),
		'nama_buku' => $this->input->post('nama_buku',TRUE),
		'tgl_pinjam' => $this->input->post('tgl_pinjam',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Peminjaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('peminjaman/update_action'),
		'no_pinjam' => set_value('no_pinjam', $row->no_pinjam),
		'id_anggota' => set_value('id_anggota', $row->id_anggota),
		'id_buku' => set_value('id_buku', $row->id_buku),
		'nama_anggota' => set_value('nama_anggota', $row->nama_anggota),
		'alamat_anggota' => set_value('alamat_anggota', $row->alamat_anggota),
		'nama_buku' => set_value('nama_buku', $row->nama_buku),
		'tgl_pinjam' => set_value('tgl_pinjam', $row->tgl_pinjam),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('peminjaman/peminjaman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_pinjam', TRUE));
        } else {
            $data = array(
		'id_anggota' => $this->input->post('id_anggota',TRUE),
		'id_buku' => $this->input->post('id_buku',TRUE),
		'nama_anggota' => $this->input->post('nama_anggota',TRUE),
		'alamat_anggota' => $this->input->post('alamat_anggota',TRUE),
		'nama_buku' => $this->input->post('nama_buku',TRUE),
		'tgl_pinjam' => $this->input->post('tgl_pinjam',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Peminjaman_model->update($this->input->post('no_pinjam', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('peminjaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Peminjaman_model->get_by_id($id);

        if ($row) {
            $this->Peminjaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('peminjaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('peminjaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_anggota', 'id anggota', 'trim|required');
	$this->form_validation->set_rules('id_buku', 'id buku', 'trim|required');
	$this->form_validation->set_rules('nama_anggota', 'nama anggota', 'trim|required');
	$this->form_validation->set_rules('alamat_anggota', 'alamat anggota', 'trim|required');
	$this->form_validation->set_rules('nama_buku', 'nama buku', 'trim|required');
	$this->form_validation->set_rules('tgl_pinjam', 'tgl pinjam', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('no_pinjam', 'no_pinjam', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-15 06:02:23 */
/* http://harviacode.com */