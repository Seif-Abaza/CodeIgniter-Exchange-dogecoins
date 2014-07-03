<div class="container marginTopTable">
    <div class="row">
        <div id="formError" class="col-lg-12">
            <?php if ($warning !== NULL) { ?>
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4><strong><?= $warning; ?></strong></h4>
                    <?= validation_errors('<p class="">'); ?>
                </div>
            <?php } ?>
            <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4 style="margin-bottom: 0">Demo</h4>
            </div>
        </div>
    </div>
    <div class="row"> <!-- Oferty kupna Ð (BID) -->
        <div id="informacjeOgolne" class="col-md-3">
            <?php if (!isset($user->isLoggedIn) || $user->isLoggedIn != TRUE) { ?>
                <div class="alert alert-dismissable alert-info">
                    <h3 style="margin-top: 0;">Demo</h3>
                    <p>Demo tablicy do wystawiania ofert kupna i sprzedaży kryptowaluty Dogecoin.</p>
                    <p>Udostępniony kod źródłowy jest fragmentem oryginalnej strony dostępnej pod adresem <?= anchor('http://www.egod.pl', 'www.egod.pl') ?>.</p>
                </div>
            <?php } else {
                ?>

                <div class="bs-example bs-example-tabs">
                    <ul id="tabAB" class="nav nav-tabs">
                        <li class="active"><?= anchor('#bidTitle', 'Kup DogeCoin', 'data-toggle="tab"') ?></li>
                    </ul>
                    <div id="myTabContent" class="tab-content tabZFormularzami">
                        <div class="tab-pane fade active in " id="bid">

                            <?php
                            $dogeprice = array(
                                'name' => 'dogeprice',
                                'id' => 'dogeprice',
                                'value' => set_value('dogeprice'),
                                'maxlength' => 20,
                                'size' => 30,
                            );
                            $dogeamount = array(
                                'name' => 'dogeamount',
                                'id' => 'dogeamount',
                                'value' => set_value('dogeamount'),
                                'size' => 30,
                            );
                            $price = array(
                                'name' => 'price',
                                'id' => 'price',
                                'size' => 40,
                            );
                            $method = array(
                                'name' => 'method',
                                'id' => 'method',
                                'value' => set_value('method'),
                                'rows' => 3,
                                'cols' => 3
                            );
                            ?>

                            <?= form_open('offer/home/', array('role' => 'form')); ?>
                            <div class="form-group">
                                <?= form_label('Cena 1 ÐOGE w PLN', $dogeprice['id']); ?>
                                <?= form_input($dogeprice, FALSE, 'class="form-control" onkeyup="calculateBuy(0, 8, 8, 8)" placeholder="0,001"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Ilość ÐOGE', $dogeamount['id']); ?> <small><span id="wartosc_doge"></span></small>
                                <?= form_input($dogeamount, FALSE, 'class="form-control" onkeyup="calculateBuy(0, 8, 8, 8); calculateDoge();" placeholder="1000" autocomplete="off"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Cena w PLN', $price['id']); ?>
                                <?= form_input($price, FALSE, 'class="form-control" disabled="true" placeholder="0"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Opis transakcji', $method['id']); ?><small> | znaków: <span id="counter7010">70</span></small>
                                <?= form_textarea($method, FALSE, 'class="form-control" style="max-width: 221px;" onkeyup="countChar(this, 7010, 70)" placeholder="70 znaków na opis, np: Allegro, bank xx"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_submit('bid', 'Kup ÐOGE', 'class="btn btn-primary"'); ?>
                            </div>
                            <?= form_close(); ?>

                        </div>

                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="col-md-9">
            <h2 id="bidTitle" class="tableHeader">Oferty kupna DogeCoin (<span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="(z ang. oznacza złożenie oferty) Jest to oferta, propozycja ceny, którą w danym momencie rynek jest gotów zapłacić za instrument finansowy.">BID</span>)</h2>
            <div class="bs-example table-responsive">
                <table id="bidTable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Najdedź na cenę aby zobaczyć wartość 1 000 Ð">Kurs Ð <i class="fa fa-info-circle" ></i></th>
                            <th>Ilość Ð</th>
                            <th>Cena</th>
                            <th data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Najdedź na komórkę aby zobaczyć cały opis.">Opis <i class="fa fa-info-circle" ></i></th>
                            <th>Data dodania</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($offer->result() as $row) {
                            if ($row->type == 1) {
                                $rozwinMetode = '';
                                if ($row->method != '' && strlen($row->method) > 23)
                                    $rozwinMetode = ' <i class="fa fa-angle-down"></i>';
                                ?>
                                <tr>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row->login; ?>"><a href="http://wykop.pl/ludzie/<?= $row->login; ?>/" target="_blank" class="alert-link"><?= substr($row->login, 0, 11); ?></a></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 kÐ = <?= number_format($row->price_doge * 1000, 5, ',', ' '); ?> zł"><?= number_format($row->price_doge, 8, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= number_format($row->amount, 2, ',', ' '); ?> Ð"><?= number_format($row->amount, 8, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= number_format($row->price_zl, 2, ',', ' '); ?> zł"><?= number_format($row->price_zl, 2, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row->method; ?>"><?= substr($row->method, 0, 23) . $rozwinMetode; ?></td>
                                    <td><?= $row->datatime_create; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /table -->
        </div>
    </div>  <!-- /Oferty kupna Ð (BID) -->
</div>

<div class="gap" style="line-height: 50; height: 50px;"></div>

<div class="container">
    <div class="row">  <!-- Oferty sprzedaży Ð (ASK) -->
        <div id="nowaOferta2" class="col-md-3">
            <?php if (!isset($user->login)) { ?>

            <?php } else {
                ?>

                <div class="bs-example bs-example-tabs">
                    <ul id="tabAB" class="nav nav-tabs">
                        <li class="active"><?= anchor('#askTitle', 'Sprzedaj DogeCoin', 'data-toggle="tab"') ?></li>
                    </ul>
                    <div id="myTabContent" class="tab-content tabZFormularzami">
                        <div class="tab-pane fade active in" id="ask">

                            <?php
                            $dogeprice2 = array(
                                'name' => 'dogeprice2',
                                'id' => 'dogeprice2',
                                'value' => set_value('dogeprice2'),
                                'maxlength' => 20,
                            );
                            $dogeamount2 = array(
                                'name' => 'dogeamount2',
                                'id' => 'dogeamount2',
                                'value' => set_value('dogeamount2'),
                                'maxlength' => 20,
                            );
                            $price2 = array(
                                'name' => 'price2',
                                'id' => 'price2',
                                'maxlength' => 40,
                            );
                            $method2 = array(
                                'name' => 'method2',
                                'id' => 'method2',
                                'value' => set_value('method2'),
                                'rows' => 3,
                                'cols' => 3
                            );
                            ?>

                            <?= form_open('offer/home', array('role' => 'form')); ?>
                            <div class="form-group">
                                <?= form_label('Cena 1 ÐOGE w PLN', $dogeprice2['id']); ?>
                                <?= form_input($dogeprice2, FALSE, 'class="form-control" onkeyup="calculateSell(0, 8, 8, 8)" placeholder="0,001"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Ilość ÐOGE', $dogeamount2['id']); ?> <small><span id="wartosc_doge2"></span></small>
                                <?= form_input($dogeamount2, FALSE, 'class="form-control" onkeyup="calculateSell(0, 8, 8, 8);  calculateDoge2();" placeholder="1000"  autocomplete="off" '); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Cena w PLN', $price2['id']); ?>
                                <?= form_input($price2, FALSE, 'class="form-control" disabled="true" placeholder="0"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_label('Opis transakcji', $method2['id']); ?><small> | znaków: <span id="counter7020">70</span></small>
                                <?= form_textarea($method2, FALSE, 'class="form-control" style="max-width: 221px;" onkeyup="countChar(this, 7020, 70)" placeholder="70 znaków na opis, np: Allegro, bank xx"'); ?>
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <?= form_submit('ask', 'Sprzedaj ÐOGE', 'class="btn btn-primary" '); ?>
                            </div>
                            <?= form_close(); ?>

                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>

        <div class="col-md-9">
            <h2 id="askTitle" class="tableHeader">Oferty sprzedaży DogeCoin (<span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="(z ang. oznacza pytać, wymagać) Jest to oferta, propozycja ceny, za którą w danym momencie jesteś gotów sprzedać instrument finansowy.">ASK</span>)</h2>
            <div class="bs-example table-responsive">
                <table id="askTable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Najdedź na cenę aby zobaczyć wartość 1 000 Ð">Kurs Ð <i class="fa fa-info-circle" ></i></th>
                            <th>Ilość Ð</th>
                            <th>Cena</th>
                            <th data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Najdedź na komórkę aby zobaczyć cały opis.">Opis <i class="fa fa-info-circle" ></i></th>
                            <th>Data dodania</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($offer->result() as $row) {
                            if ($row->type == 2) {
                                $rozwinMetode = '';
                                if ($row->method != '' && strlen($row->method) > 23)
                                    $rozwinMetode = ' <i class="fa fa-angle-down"></i>';
                                ?>
                                <tr>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row->login; ?>"><a href="http://wykop.pl/ludzie/<?= $row->login; ?>/" target="_blank" class="alert-link"><?= substr($row->login, 0, 11); ?></a></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 kÐ = <?= number_format($row->price_doge * 1000, 5, ',', ' '); ?> zł"><?= number_format($row->price_doge, 8, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= number_format($row->amount, 2, ',', ' '); ?> Ð"><?= number_format($row->amount, 8, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= number_format($row->price_zl, 2, ',', ' '); ?> zł"><?= number_format($row->price_zl, 2, '.', ''); ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $row->method; ?>"><?= substr($row->method, 0, 23) . $rozwinMetode; ?></td>
                                    <td><?= $row->datatime_create; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /table -->
        </div>
    </div><!-- /Oferty sprzedaży Ð (ASK) -->
</div>



