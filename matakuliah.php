<?php
class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('view-form-matakuliah');
    }
    public function cetak()
    {
        $this->form_validation->set_rules(
            'kode',
            'Kode',
            'required|min_length[5]|max_length[5]',
            array(
                'min_length' => '%s minimal 5 karakter',
                'max_length' => '%s maksnimal 5 karakter'
            )
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|min_length[5]|max_length[5]',
            array(
                'min_length' => '%s minimal 5 karakter',
                'max_length' => '%s maksnimal 5 karakter'
            )
        );

        $this->form_validation->set_rules(
            'sks',
            'SKS',
            'required',
            array(
                'requried' => '%s pilih sks anda.'
            )

        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('view-form-matakuliah');
        } else {
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];

            $this->load->view('view-data-matakuliah', $data);
        }
    }
}
