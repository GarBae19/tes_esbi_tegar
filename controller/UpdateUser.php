<?php
class UpdateUser extends Controller
{
    function index()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        $data = [
            'title' => 'Update User',
            'data' => $_POST,

        ];
        $this->view('tamplate/head', $data);
        $this->view('updateuser/index', $data);
        $this->view('tamplate/footer');
    }
    function update()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        if ($this->model('akun_model')->updateUser($_POST) > 0) {
            Flasher::setflash('User Berhasil Di-Update', 'success');
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
