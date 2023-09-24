<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="<?php echo base_url("panel/roomextraservices/newPage"); ?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> Ekle</a>
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <th>Sırala</th>
                            <th>id</th>
                            <th>Başlık</th>
                            <th>Aktif/Pasif</th>
                            <th class="col-md-2">Düzenle</th>
                            <th class="col-md-2">sil</th>
                        </thead>
                        <tbody class="sortableList" postUrl="panel/roomextraservices/rankUpdate">
                            <?php foreach ($rows as $row) { ?>
                                <tr id="sortId-<?php echo $row->id; ?>" class="btn-move">
                                    <td><i class="fa fa-retweet fa-lg text-primary"></i></td>
                                    <td>#<?php echo $row->id; ?></td>
                                    <td><?php echo $row->title; ?></td>
                                    <td>
                                        <input class="toggle_check" toggleUrl="panel/roomextraservices/isActiveSetter" data-onstyle="success" data-size="mini" data-on="Aktif" data-off="Pasif" data-offstyle="danger" type="checkbox" data-toggle="toggle" dataID="<?php echo $row->id; ?>" <?php echo ($row->isActive == 1) ? "checked" : ""; ?>>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("panel/roomextraservices/editPage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("panel/roomextraservices/delete/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Sil">
                                            <i class="fa fa-trash fa-lg"></i>
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