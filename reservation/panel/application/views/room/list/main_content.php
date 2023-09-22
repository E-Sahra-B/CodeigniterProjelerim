<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="<?php echo  base_url("room/newPage"); ?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> Ekle</a>
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <th>Sırala</th>
                            <th>Oda No</th>
                            <th>Başlık</th>
                            <th>Boyut(m<sup>2</sup>)</th>
                            <th>Fiyat</th>
                            <th>Kategori</th>
                            <th>Kapasite</th>
                            <th>Özellikler</th>
                            <th>Ekstra Servisler</th>
                            <th>Aktif/Pasif</th>
                            <th class="col-md-2">İşlemler</th>
                        </thead>
                        <tbody class="sortableList" postUrl="room/rankUpdate">
                            <?php foreach ($rows as $row) { ?>
                                <tr id="sortId-<?php echo $row->id; ?>" class="btn-move">
                                    <td><i class="fa fa-retweet fa-lg text-primary"></i></td>
                                    <td><?php echo $row->room_code; ?></td>
                                    <td><?php echo $row->title; ?></td>
                                    <td><?php echo $row->size; ?></td>
                                    <td><?php echo $row->default_price; ?></td>
                                    <td><?php echo $row->room_type_id; ?></td>
                                    <td><?php echo $row->room_capacity; ?></td>
                                    <td><?php echo $row->room_properties; ?></td>
                                    <td><?php echo $row->room_extra_services; ?></td>
                                    <td>
                                        <input class="toggle_check" data-onstyle="success" data-size="mini" data-on="Aktif" data-off="Pasif" data-offstyle="danger" type="checkbox" data-toggle="toggle" dataID="<?php echo $row->id; ?>" <?php echo ($row->isActive == 1) ? "checked" : ""; ?>>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("room/editPage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a> |
                                        <a class="removeBtn" dataURL="<?php echo base_url("room/delete/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Sil">
                                            <i class="fa fa-trash fa-lg"></i>
                                        </a> |

                                        <a href="<?php echo base_url("room/imageUploadPage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Resim Güncelle">
                                            <i class="fa fa-image fa-lg"></i>
                                        </a> |

                                        <a href="<?php echo base_url("room/newAvailabilityPage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Tarih Sayfası">
                                            <i class="fa fa-calendar fa-lg"></i>
                                        </a> |

                                        <a href="<?php echo base_url("room/newPricingPage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Yeni Fiyat Sayfası">
                                            <i class="fa fa-dollar fa-lg"></i>
                                        </a> |
                                        <a href="<?php echo base_url("room/getPricePage/$row->id"); ?>" data-toggle="tooltip" data-placement="top" title="Fiyat Sayfası">
                                            <i class="fa fa-gear fa-lg"></i>
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