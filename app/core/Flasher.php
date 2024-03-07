<?php
class Flasher
{
    static function setflash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }
    static function flash()
    {

        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . '" role="alert">
                    ' . $_SESSION['flash']['pesan'] . '
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
