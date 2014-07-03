<div id="fancyTop">
    <div class="fancyWrap">
        <div class="container">
            <h1><i class="fa fa-cog"></i> Ustawienia konta</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-cog"></i> Ustawienia</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?= anchor(base_url('user/setting/toggleTylkoNocny'), '<i class="fa fa-moon-o"></i> Tylko nocny', 'class="list-group-item"'); ?>    
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="gap" style="line-height: 150; height: 150px;"></div>
</div>