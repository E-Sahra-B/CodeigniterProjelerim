<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?= uyarimesajioku(); ?>
    <form action="<?= base_url('admin/resimyukle'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="logo" id="">
    <button>gönder</button>
</form>
</body>
</html>