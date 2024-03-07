<?php
class HapusUser extends Controller
{
    function hapus()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        if ($this->model('akun_model')->hapusUser($_POST) > 0) {
            Flasher::setflash('User Berhasil Dihapus', 'success');
            header('Location: ' . BASEURL);
            exit;
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
