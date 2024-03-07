<?php
class Home extends Controller
{
    function index()
    {
        if (!isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . 'login');
            exit;
        }
        $data = [
            'title' => 'Home - Index',
            'data' => $this->model('akun_model')->getUser()
        ];

        $this->view('tamplate/headeradmin', $data);
        $this->view('home/index', $data);
        $this->view('tamplate/footeradmin');
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
