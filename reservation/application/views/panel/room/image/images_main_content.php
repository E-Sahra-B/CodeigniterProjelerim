<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo base_url("panel/room/upload_image"); ?>" class="dropzone">
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <th class="text-center">Sırala</th>
                            <th>Önizleme</th>
                            <th>Aktif/Pasif</th>
                            <th>Öne Çıkar</th>
                            <th class="col-md-2 text-center">İşlemler</th>
                        </thead>
                        <tbody class="sortableList" postUrl="panel/room/roomImageRankUpdate">
                            <?php foreach ($rows as $row) { ?>
                                <tr id="sortId-<?php echo $row->id; ?>" class="btn-move">
                                    <td class="orta"><i class="fa fa-retweet fa-lg text-primary ortala"></i></td>
                                    <td>
                                        <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url("uploads") . "/" . $row->img_id; ?>">
                                            <img width="80" src="<?php echo base_url("uploads") . "/" . $row->img_id; ?>" alt="<?php echo $row->img_id; ?>" class="img-responsive" />
                                        </a>
                                    </td>
                                    <td>
                                        <input class="toggle_active" data-onstyle="success" data-size="mini" data-on="Aktif" data-off="Pasif" data-offstyle="secondary" type="checkbox" data-toggle="toggle" dataID="<?php echo $row->id; ?>" <?php echo ($row->isActive == 1) ? "checked" : ""; ?> />
                                    </td>
                                    <td>
                                        <input class="toggle_cover" data-onstyle="warning" data-size="mini" data-on="Önde" data-off="Pasif" data-offstyle="secondary" type="checkbox" data-toggle="toggle" dataID="<?php echo $row->id; ?>" <?php echo ($row->isCover == 1) ? "checked" : ""; ?> />
                                    </td>
                                    <td class="orta">
                                        <a href="<?php echo base_url("panel/room/deleteImage/$row->id"); ?>">
                                            <i class="fa fa-trash fa-lg ortala"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>
<!-- /.content -->