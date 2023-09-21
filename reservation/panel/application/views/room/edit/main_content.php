<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url("room/edit/$row->id"); ?>">
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Oda Numarası</label>
                            <input type="text" class="form-control" name="room_code" value="<?php echo $row->room_code; ?>">
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Başlık</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $row->title; ?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Açıklama</label>
                            <textarea id="detail" name="detail" rows="10" cols="80"><?php echo $row->detail; ?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Oda Boyutu</label>
                            <input type="text" class="form-control" name="size" value="<?php echo $row->size; ?>">
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fiyatı(Gecelik)</label>
                            <input type="text" class="form-control" name="default_price" value="<?php echo $row->default_price; ?>">
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Kategorisi</label>
                            <select class="form-control" name="room_type_id">
                                <?php foreach (get_room_category(array("isActive" => 1)) as $category) { ?>
                                    <option <?= ($category->id == $row->room_type_id) ? "selected" : "" ?> class="" value="<?= $category->id ?>"><?= $category->title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Kapasite</label>
                            <select class="form-control" name="room_capacity">
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option <?= ($row->room_capacity == $i) ? "selected" : "" ?> value="<?php echo $i; ?>"><?php echo "$i Kişilik"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Özellikler</label>
                            <select name="room_properties[]" class="form-control select2" multiple="multiple" data-placeholder="Özellik Seçiniz" style="width: 100%;">
                                <?php foreach (get_room_properties(array("isActive" => 1)) as $property) {
                                    $secimler = explode(";", $row->room_properties); ?>
                                    <option <?= in_array($property->id, $secimler) ? "selected" : "" ?> class="" value="<?= $property->id ?>"><?= $property->title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Ekstra Servisler</label>
                            <select name="room_extra_services[]" class="form-control select2" multiple="multiple" data-placeholder="Ekstra Servis Seçiniz" style="width: 100%;">
                                <?php foreach (get_room_extra_services(array("isActive" => 1)) as $extra_service) {
                                    $extra_service_secimler = explode(";", $row->room_extra_services); ?>?>
                                <option <?= in_array($extra_service->id, $extra_service_secimler) ? "selected" : "" ?> class="" value="<?= $extra_service->id ?>"><?= $extra_service->title ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
</section>
<!-- /.content -->