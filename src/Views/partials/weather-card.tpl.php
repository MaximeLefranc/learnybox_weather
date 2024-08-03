<div class="row d-flex justify-content-center py-5 weather-card">
    <div class="col-md-8 col-lg-6 col-xl-5">

        <div class="card text-body" style=" border-radius: 35px;">
            <div class="card-body p-4">

                <div class="d-flex">
                    <h6 class="flex-grow-1"><?= $weather->name ?></h6>
                    <h6><?= (new DateTime())->format('H:i') ?></h6>
                </div>

                <div class="d-flex flex-column text-center mt-5 mb-4">
                    <h6 class="display-4 mb-0 font-weight-bold"><?= $weather->main->temp ?> °C</h6>
                    <span class="small" style="color: #868B94"><?= $weather->weather[0]->description ?></span>
                </div>

                <div class="d-flex align-items-center">
                    <div class="flex-grow-1" style="font-size: 1rem;">
                        <div><img class="icon" src="<?= $assetsBaseUri ?>img/wind.png" /> <span class="ms-1">Vent: <strong><?= $weather->wind->speed ?> km/h</strong>
                            </span>
                        </div>
                        <div><img class="icon" src="<?= $assetsBaseUri ?>img/humidity.png" /> <span class="ms-1">Humidité: <strong><?= $weather->main->humidity ?> %</strong>
                            </span></div>
                        <div><img class="icon" src="<?= $assetsBaseUri ?>img/id.png" /> <span class="ms-1">Identifiant: <strong><?= $weather->id ?></strong>
                            </span></div>
                    </div>
                    <div>
                        <img src="http://openweathermap.org/img/w/<?= $weather->weather[0]->icon ?>.png" width="90px">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- 04d -->