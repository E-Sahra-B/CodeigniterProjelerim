    <!-- Rooms -->
    <section class="rooms mt50">
        <div class="container">
            <div class="col-sm-12">
                <form class="reservation-horizontal clearfix" role="form" method="post" action="<?php echo base_url("homeroom/check_availability"); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="checkin">Başlangıç Tarihi</label>
                                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Giriş saati 11:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkin" type="text" id="checkin" class="form-control" placeholder="Başlangıç Tarihi" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="checkout">Çıkış Tarihi</label>
                                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Çıkış saati 12:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkout" type="text" id="checkout" class="form-control" placeholder="Çıkış Tarihi" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block mt22 sorgu-btn disabled">Sorgula</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <h2 class="lined-heading"><span>Oda Listesi</span></h2>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Önizleme</th>
                        <th>Oda</th>
                        <th>Özellikleri</th>
                        <th>Fiyatı</th>
                        <th>Toplam Fiyat</th>
                        <th class="text-center">Oda Seçimi</th>
                    </thead>
                    <tbody>
                        <form class="reservation_form" action="<?php echo base_url("homeroom/check_availability"); ?>" method="post">
                            <?php foreach ($rooms as $room) { ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo (!file_exists(FCPATH . 'uploads/' . $room["img_id"] . '')) ? base_url('assets') . '/images/rooms/room3.jpg' : base_url('uploads/' . $room["img_id"] . ''); ?>" alt="<?php echo $room["title"]; ?>" class="img-responsive w50">
                                    </td>
                                    <td><?php echo $room["title"]; ?></td>
                                    <td>
                                        <ul class="list-inline">
                                            <?php $properties = explode(";", $room["room_properties"]); ?>
                                            <?php foreach ($properties as $property) { ?>
                                                <li><i class="fa fa-check-circle"></i> <?php echo $property_list[$property] ?></li>
                                            <?php } ?>
                                        </ul>
                                    <td>
                                        <?php foreach ($room["availability"] as $date => $price) { ?>
                                            <ul class="list-unstyled">
                                                <?php if ($price == "Dolu") { ?>
                                                    <li class="text-danger"> <?php echo get_month($date) . "   <i class='fa fa-times fa-lg text-danger'></i>   $price Lütfen başka tarih seçiniz"; ?></li>
                                                <?php } else { ?>
                                                    <li class="text-primary"> <?php echo get_month($date) . "   <i class='fa fa-money fa-lg text-primary'></i>   " . fiyat($price); ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </td>
                                    <td class="total_price_column">
                                        <input type="hidden" class="total_price_col" value="<?php echo $room["total_price"] ?>">
                                        <?php if (!in_array("Dolu", $room["availability"])) {
                                            echo fiyat($room["total_price"]);
                                        }
                                        ?>
                                    </td>
                                    <td class="middle">
                                        <?php if (!in_array("Dolu", $room["availability"])) { ?>
                                            <input type="checkbox" class="form-control checkbox-inline book_check" name="book[]">
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </form>
                    </tbody>
                </table>
                <button class="disabled btn btn-success pull-right reservation_submit_btn">Rezervasyon (<span class="total_price">0.00</span>)</button>
            </div>
        </div>
    </section>