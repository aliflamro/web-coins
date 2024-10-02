<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Email <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                </div>';
            unset($_SESSION['flash']);
        }
    }
    public static function sessions() {
        if (!$_SESSION['users_socs']) {
            header("Location: ".BASEURL);
        }
    }
    public static function sesscom() {
        if (!$_SESSION['univ']) {
            header("Location: ".BASEURL."s");
        }
    }
    public static function setSuccess($pesan, $aksi, $tipe) {
        $_SESSION['flasher'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flashStart() {
        if (isset($_SESSION['flasher'])) {
            echo '<div class="alert alert-' . $_SESSION['flasher']['tipe'] . ' alert-dismissible fade show" role="alert">
                     <strong>' . $_SESSION['flasher']['pesan'] . '</strong> ' . $_SESSION['flasher']['aksi'] . '
                </div>';
            unset($_SESSION['flasher']);
        }
    }
}