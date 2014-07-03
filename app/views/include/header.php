<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Kup i sprzedaj Dogecoin (DOGE / Ð) za ZŁ / PLN - oferty urzytkownków Wykop.pl. Dogecoin wiki. Co to jest Dogecoin? Kurs i wartość Doge">
        <meta name="keywords" content="dogecoin, oferty, doge, kup, sprzedaj, Đ, pln, kurs, kalkulator, giełda">
        <meta name="author" content="">

        <title>Title</title>

        <?php
        if (NULL != ($this->session->userdata('isLoggedIn')) && $this->session->userdata('tylko_nocny') == TRUE) {
            ?><link href="<?= base_url('assets/css/bootstrap.min_nocny.css') ?>" rel="stylesheet">
            <link href="<?= base_url('assets/css/bootswatch.min.css') ?>" rel="stylesheet">
            <link href="<?= base_url('assets/css/custom_nocny.css') ?>" rel="stylesheet">
            <link rel="shortcut icon" href="<?= base_url('assets/img/ico_nocny.png') ?>">
        <?php } else { ?><link href="<?= base_url('assets/css/bootstrap.min_dzienny.css') ?>" rel="stylesheet">
            <link href="<?= base_url('assets/css/bootswatch.min.css') ?>" rel="stylesheet">
            <link href="<?= base_url('assets/css/custom_dzienny.css') ?>" rel="stylesheet">
            <link rel="shortcut icon" href="<?= base_url('assets/img/ico_dzienny.png') ?>">
        <?php } ?>

        <link href="<?= base_url('assets/css/auction_my_view.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/stylish-dogecoin.css'); ?>" rel="stylesheet">
        
        <link href="<?= base_url('assets/css/datatables.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
        
        <script src="http://cdn.bitmindo.com/dogecoin.min.js"></script>
        

    </head>
