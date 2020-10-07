<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giao diện hiển thị danh sách nhân sự </title>

	<!--kết nối bootstrap 4-->
	<script type="text/javascript" src="<?php echo base_url(); ?> vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Sửa nhân sự</h3>
			<hr>
		</div>
	</div>
	<form action="<?= base_url()?>/index.php/nhansu/update_nhansu" class="col-sm-10" method="post" enctype="multipart/form-data">
		<?php foreach ($dulieukq as $value): ?>
			
		<div class="form-group row">
			<div class="col-sm-6">
				<div class="row">
					<label for="anh" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện</label>
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-6">
								<img src="<?= $value['anhavatar'] ?>" alt="" class="img-fluid">
							</div>
						</div>
						<input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input type="hidden" name="anhavatar2" value="<?= $value['anhavatar'] ?>">
						<input name="anhavatar" type="file" class="form-control" id="anhavatar" placeholder="Upload anh">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<div class="row">
						<label for="ten" class="col-sm-4 form-control-label text-xs-right">Tên nhân viên:</label>
						<div class="col-sm-8">
							<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên giao hàng" value="<?= $value['ten'] ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-4">
				<div class="row">
					<label for="tuoi" class="col-sm-4 form-control-label text-xs-right">Tuổi:</label>
					<div class="col-sm-8">
						<input name="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi nhân viên" value="<?= $value['tuoi'] ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="row">
					<label for="sdt" class="col-sm-4 form-control-label text-xs-right">Số điện thoại:</label>
					<div class="col-sm-8">
						<input name="sdt" type="text" class="form-control" id="sdt" placeholder="điện thoại" value="<?= $value['sdt'] ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="row">
					<label for="sodonhang" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng:</label>
					<div class="col-sm-8">
						<input name="sodonhang" type="number" class="form-control" id="sodonhang" placeholder="Số đơn hàng" value="<?= $value['sodonhang'] ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<label for="linkfb" class="col-sm-4 form-control-label text-xs-right">Link Facebook:</label>
					<div class="col-sm-8">
						<input name="linkfb" type="text" class="form-control col-sm-10" id="linkfb" placeholder="Đường dẫn Facebook" value="<?= $value['linkfb'] ?>">
					</div>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		<div class="form-group row text-xs-center">
			<div class="col-sm-offset-1 col-sm-12">
				<button type="submit" class="btn btn-outline-success text-xs-center">Lưu</button> 
			</div>
		</div>
	</form>

</body>
</html>