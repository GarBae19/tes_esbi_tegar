<?php
class Login extends Controller
{
    function index()
    {
        if (isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . '');
            exit;
        }
        $data = [
            'title' => 'Login',
        ];

        $this->view('tamplate/head', $data);
        $this->view('login/index', $data);
        $this->view('tamplate/footer');
    }
    function proseslogin()
    {
        if (isset($_SESSION['nama'])) {
            header('Location: ' . BASEURL . '');
            exit;
        }
        $user = $this->model('akun_model')->cekuser($_POST);
        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['nama'] = $user['nama'];
                header('Location: ' . BASEURL);
                exit;
            } else {
                Flasher::setflash('Login gagal', 'danger');
                echo '<META HTTP-EQUIV="Refresh" Content="0; ' . BASEURL . 'login">';
            }
        } else {
            Flasher::setflash('Login gagal', 'danger');
            echo '<META HTTP-EQUIV="Refresh" Content="0; ' . BASEURL . 'login">';
        }
    }
    function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . 'login');
        exit;
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
