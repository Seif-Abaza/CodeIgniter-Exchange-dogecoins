    <footer>
        <section id="rek-promo">
            <a id="tothemoon" href="#top"><i class="fa fa-arrow-circle-up"></i> Top <i class="fa fa-arrow-circle-up"></i></a>
        </section>
        <section id="footer1">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-3">
                        <h6>Linki</h6>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?>
                    </div>
                    <div class="col-md-3">
                        <h6>Linki</h6>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?>
                    </div>
                    <div class="col-md-3">
                        <h6>Linki</h6>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?>
                    </div>
                    <div class="col-md-3">
                        <h6>Linki</h6>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?><br>
                        <?= anchor('http://example.com', 'Example.com', 'target="_blank"') ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="footer2">
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-6">
                        ©2013  ·  AW
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-unstyled">
                            <?php if (isset($user->isLoggedIn) || $user->isLoggedIn === TRUE) { ?>
                                <li class="pull-right"><?= anchor(base_url('offer/my'), 'Moje oferty') ?></li>
                            <?php } ?>
                            <li class="pull-right"><?= anchor(base_url('offer/home'), 'Oferty') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquerydatatablesmin.js') ?>"></script>
    <script src="<?= base_url('assets/js/datatables.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <script src="<?= base_url('assets/js/countDoge.js') ?>"></script>


    </body>
</html>
