<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="<?php echo  base_url("roomproperties/newPage"); ?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> Ekle</a>
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <th>Sırala</th>
                            <th>id</th>
                            <th>Başlık</th>
                            <th>isActive</th>
                            <th class="col-md-2">İşlemler</th>
                        </thead>
                        <tbody class="sortableList" postUrl="roomproperties/rankUpdate">
                            <?php foreach ($rows as $row) { ?>
                                <tr id="sortId-<?php echo $row->id; ?>">
                                    <td><i class="fa fa-retweet fa-lg text-primary"></i></td>
                                    <td>#<?php echo $row->id; ?></td>
                                    <td><?php echo $row->title; ?></td>
                                    <td>
                                        <input class="toggle_check" data-onstyle="success" data-size="mini" data-on="Aktif" data-off="Pasif" data-offstyle="danger" type="checkbox" data-toggle="toggle" dataID="<?php echo $row->id; ?>" <?php echo ($row->isActive == 1) ? "checked" : ""; ?>>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("roomproperties/editPage/$row->id"); ?>">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                        <a href="<?php echo base_url("roomproperties/delete/$row->id"); ?>">
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