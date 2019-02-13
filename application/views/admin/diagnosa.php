<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnosa</title>
</head>
<body>
<?php echo form_open('admin/updDiag');?>
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>">
    <div class="form-group">
                  <label for="diagnosa">Diagnosa Dokter:</label><br>
                  <textarea class="form-control" name="diagnosa" id="diagnosa" rows="3"></textarea>
                </div>
                <input type="submit" value="Input">
                <?php echo form_close();?>
</body>
</html>