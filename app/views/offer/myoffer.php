        <div id="fancyTop">
            <div class="fancyWrap">
                <div class="container">
                    <h1>Moje oferty</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bs-example table-responsive">
                        <table id="offerTable" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Typ</th>
                                    <th>Kurs ÐOGE</th>
                                    <th>Ilość ÐOGE</th>
                                    <th>Cena (PLN)</th>
                                    <th>Opis transakcji</th>
                                    <th style="width: 60px">Usuń</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($offer->result() as $row) {
                                    ?>
                                    <tr>
                                        <td><?php
                                            if ($row->type == 1) {
                                                echo '<span class="label label-success">(BID)</span> Oferta kupna Ð';
                                            } else {
                                                echo '<span class="label label-warning">(ASK)</span> Oferta sprzedaży Ð';
                                            }
                                            ?></td>
                                        <td><?= number_format($row->price_doge, 8, ',', ' '); ?></td>
                                        <td><?= number_format($row->amount, 8, ',', ' '); ?></td>
                                        <td><?= number_format($row->price, 8, ',', ' '); ?></td>
                                        <td><?= $row->method ?></td>
                                        <td><a href="<?php
                                            echo base_url('offer/my');
                                            echo '?del=' . $row->id;
                                            ?>" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /table -->
                    <p>Liczba dodanych ofert: <strong><?= $offer->num_rows ?></strong></p>
                    <hr class="big">
                </div>
            </div>
        </div>