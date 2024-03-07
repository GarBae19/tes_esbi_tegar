<?php
class Tambahuser extends Controller
{
    function index()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        $data = [
            'title' => 'Tambah User',
        ];

        $this->view('tamplate/head', $data);
        $this->view('tambahuser/index');
        $this->view('tamplate/footer');
    }
    function tambah()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        $user = $this->model('akun_model')->cekuser($_POST);
        if ($user) {
            Flasher::setflash('User Sudah Ada, Gagal Ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'Tambahuser');
        } else {
            if ($this->model('akun_model')->tambahUser($_POST) > 0) {
                Flasher::setflash('User Berhasil Ditambahkan', 'success');
                header('Location: ' . BASEURL);
                exit;
            }
        }
    }

    function tidakada()
    {
        $data = [
            'title' => '404',
            'isi' => '404 Not Found'
        ];
        $this->view('tamplate/headeradmin', $data);
        $this->view('404/notfound', $data);
        $this->view('tamplate/footeradmin');
    }
}
