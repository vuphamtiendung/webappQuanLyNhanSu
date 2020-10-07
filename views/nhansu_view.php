<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giao diện hiển thị danh sách nhân sự </title>

	<!--kết nối bootstrap 4-->
	<script type="text/javascript" src="<?php echo base_url(); ?>/vendor/bootstrap.js"></script>
	<!--jquery upload -->
	<script type="text/javascript" src="<?php echo base_url(); ?>/jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/jqueryupload/js/jquery.fileupload.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>
<body>
	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Danh sách nhân sự</h3>
			<hr>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="card-deck-wrapper">
				<div class="card-deck">

					<?php foreach ($mangketqua as $value): ?>
						<div class="col-sm-4">
							<div class="card">
								<img class="card-img-top img-fluid" src="<?= $value['anhavatar'] ?>" alt="Card image cap">
								<div class="card-block">
									<h4 class="card-title ten"><?= $value['ten'] ?></h4>
									<p class="card-text tuoi">Tuổi: <b><?= $value['tuoi'] ?></b></p>
									<p class="card-text sdt">Sđt: <b><?= $value['sdt'] ?></b></p>
									<p class="card-text sodonhang">Số đơn hàng hoàn thành: <?= $value['sodonhang'] ?>
									</p>
									<p class="card-text linkfb">
										<small>
											<a href="<?= $value['linkfb'] ?>" class="btn btn-secondary btn-xs"> Facebook <i class="fa fa-chevron-right"></i></a>
										</small>
									</p>
									<p class="card-text editns">
										<small>
											<a href="<?= base_url()?>/index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs"> Sửa <i class="fa fa-pencil"></i></a>
										</small>

										<small>
											<a href="<?= base_url()?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-outline-danger btn-xs"> Xóa <i class="fa fa-pencil"></i>
											</a>
										</small>
									</p>

								</div>
							</div> <!-- encard -->
						</div>
					<?php endforeach ?>

				</div>
			</div>


			<div class="container">
				<div class="text-xs-center">
					<h3 class="display-3">Thêm mới nhân sự</h3>
					<hr>
				</div>
			</div>

			<!-- <form action="/index.php/nhansu/nhansu_add" class="col-sm-10" method="post" enctype="multipart/form-data"> -->
				<div class="form-group row">
					<div class="col-sm-6">
						<div class="row">
							<label for="anh" class="col-sm-4 form-control-label text-xs-right">Ảnh đại diện</label>
							<div class="col-sm-8">
								<input name="files[]" type="file" class="form-control" id="anhavatar" placeholder="Upload anh">
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<div class="row">
								<label for="ten" class="col-sm-4 form-control-label text-xs-right">Tên nhân viên:</label>
								<div class="col-sm-8">
									<input name="ten" type="text" class="form-control" id="ten" placeholder="Tên nhân viên giao hàng">
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
								<input name="tuoi" type="number" class="form-control" id="tuoi" placeholder="Tuổi nhân viên">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<label for="sdt" class="col-sm-4 form-control-label text-xs-right">Số điện thoại:</label>
							<div class="col-sm-8">
								<input name="sdt" type="text" class="form-control" id="sdt" placeholder="điện thoại">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<label for="sodonhang" class="col-sm-4 form-control-label text-xs-right">Số đơn hàng:</label>
							<div class="col-sm-8">
								<input name="sodonhang" type="number" class="form-control" id="sodonhang" placeholder="Số đơn hàng">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<label for="linkfb" class="col-sm-4 form-control-label text-xs-right">Link Facebook:</label>
							<div class="col-sm-8">
								<input name="linkfb" type="text" class="form-control col-sm-10" id="linkfb" placeholder="Đường dẫn Facebook">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="offset-1 col-sm-12 text-xs-center">
						<button type="button" class="btn btn-outline-success nutxulyajax ">Thêm mới(bằng ajax)</button> 
						<button type="reset" class="btn btn-outline-danger text-center">Nhập lại</button> 
					</div>
				</div>
			<!-- </form> -->
		</div>
	</div>
	
	<script>
	/* Xử lý Javacript */
	/* xử lý upload file ảnh */
	duongdan = '<?php echo base_url() ?>';
	/* Phần code này có thể lấy trong file,
	 theo đường dẫn: jqueryupload/basic.html */
	$('#anhavatar').fileupload({
        url: duongdan + 'index.php/nhansu/uploadfile',
        dataType: 'json',
        done: function (e, data) 
        {
            $.each(data.result.files, function (index, file){
                tenfile = file.url;
            });
        }
    })


	$('.nutxulyajax').click(function(event) 
	{
		/* xử lý tầng dữ liệu */
		$.ajax(
		{
			url: 'nhansu/ajax_add',
			type: 'POST',
			dataType: 'json',
			data:{
				ten: $('#ten').val(),
				tuoi: $('#tuoi').val(),
				sdt: $('#sdt').val(),
				anhavatar: tenfile,
				linkfb: $('#linkfb').val(),
				sodonhang: $('#sodonhang').val()
			},
		})
		.done(function() 
		{
			console.log("success");
			
			// thêm nội dung bằng hàm append()
		})
		.fail(function() 
		{
			console.log("error");
		})
		.always(function() 
		{
			// xử lý dữ liệu phần giao diện.
			console.log("complete")
			noidung = '<div class="col-sm-4">';
			noidung += '<div class="card">';
			noidung += '<img class="card-img-top img-fluid" src="'+ tenfile +'" alt="Card image cap">';
			noidung += '<div class="card-block">';
			noidung += '<h4 class="card-title ten">'+ $('#ten').val() +'</h4>';
			noidung += '<p class="card-text tuoi"><b>'+ $('#tuoi').val() +'</b></p>';
			noidung += '<p class="card-text sdt">Sđt:<b>'+ $('#sdt').val() +'</b></p>';
			noidung += '<p class="card-text sodonhang">Số đơn đã hoàn thành: '+ $('#sodonhang').val() +'</p>';
			noidung += '<p class="card-text linkfb">';
			noidung += '<small>';
			noidung += '<a href="<?= $value['linkfb'] ?>" class="btn btn-secondary btn-xs"> Facebook <i class="fa fa-chevron-right"></i></a>';
			noidung += '</small>';
			noidung += '</p>';
			noidung += '<p class="card-text editns">';
			noidung += '<small>';
			noidung += '<a href="<?= base_url()?>/index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs"> Sửa <i class="fa fa-pencil"></i></a>';
			noidung += '</small>';
			noidung += '<small>';
			noidung += '<a href="<?= base_url()?>/index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-outline-danger btn-xs"> Xóa <i class="fa fa-pencil"></i></a>';
			noidung += '</small>';
			noidung += '</p>';
			noidung += '</div>';
			noidung += '</div>';
			noidung += '</div>';

			$('.card-deck').append(noidung);
			// xóa trống các ô trên giao diện.
			$('#ten').val();
			$('#tuoi').val();
			$('#sdt').val();
			$('#linkfb').val();
			$('#sodonhang').val();
		});
	});
	
	</script>
</body>
</html>