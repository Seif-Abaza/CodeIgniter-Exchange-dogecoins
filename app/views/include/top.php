    <body style="">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">nazwa.com</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download"><i class="glyphicon glyphicon-pushpin"></i> Tablica <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="przegladajoferty">
                                <li><?= anchor(base_url('offer/home'), '<i class="glyphicon glyphicon-pushpin"></i> Oferty', 'id="przegladajoferty" tabindex="-1"') ?></li>
                                <?php if (isset($user->isLoggedIn) || $user->isLoggedIn === TRUE) { ?>
                                    <li class="divider"></li>
                                    <li><?= anchor(base_url('offer/my'), '<i class="fa fa-bars"></i> Moje oferty', 'id="przegladajoferty" tabindex="-1"') ?></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!isset($user->isLoggedIn) || $user->isLoggedIn != TRUE) { ?>
                            <li><?= anchor(base_url('user/login'), '<i class="fa fa-key"></i> Zaloguj') ?></li>
                        <?php } else { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download"><?= $user->login ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="download">
                                    <li><?= anchor(base_url('user/setting'), '<i class="fa fa-cog"></i> Ustawienia', 'tabindex="-1"') ?></li>
                                    <li class="divider"></li>
                                    <li><?= anchor(base_url('user/login/logout'), '<i class="fa fa-power-off"></i> Wyloguj', 'tabindex="-1"') ?></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>