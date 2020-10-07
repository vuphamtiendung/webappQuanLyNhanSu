<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'UploadHandler.php';

class nhansu extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		$ketqua = array('mangketqua' => $ketqua);
		// truyền dữ liệu sang cho view.
		$this->load->view('nhansu_view', $ketqua, FALSE);
	}

	public function nhansu_add()
	{
		// Lấy dữ liệu từ view
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$sdt = $this->input->post('sdt');
		$anhavatar = base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);

		// Xử lý phần upload file ảnh
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		/*if (file_exists($target_file)) 
		{
		    echo "Đã có 1 file trùng tên";
		    $uploadOk = 0;
		}*/
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		    echo "Chỉ chấp nhận file ảnh";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		    echo "Lỗi, file chưa được upload";
		// if everything is ok, try to upload file
		} 
		else 
		{
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) 
		    {
		        echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } 
		    else 
		    {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}


		// truyền dữ liệu vào model.
		$this->load->model('nhansu_model');
		
		$trangthai = $this->nhansu_model->insertDataToMysql($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang);
		if($trangthai)
		{
			//echo "<h3>Insert dữ liệu thành công!</h3>";
			$this->load->view('insert_thanhcong_view');
		}
		else
		{
			echo "Insert thất bại";
		}
	}

	// sửa nội dung
	public function sua_nhansu($idnhanvao)
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getDataByID($idnhanvao); // dựa vào id lấy ra phần dữ liệu.
		// đưa dữ liệu sang view sửa.
		// Đưa dữ liệu lên dạng mảng.
		$ketqua = array('dulieukq' => $ketqua);
		$this->load->view('sua_nhanvien_view', $ketqua, FALSE);
	}
	
	public function xoa_nhansu($id)
	{
		$this->load->model('nhansu_model');
		if($this->nhansu_model->removeDataByID($id))
		{
			$this->load->view('xoa_thanhcong_view');
		}
		else
		{
			echo "xóa không thành công!";
		}
	}

	public function update_nhansu()
	{
		// Lấy dữ liệu từ view
		$id = $this->input->post('id');
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sdt = $this->input->post('sdt');
		$sodonhang = $this->input->post('sodonhang');
		$sodienthoai = $this->input->post('sodienthoai');
		$linkfb = $this->input->post('linkfb');
		// xử lý phần upload ảnh

		// Xử lý phần upload file ảnh
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Kiểm tra ảnh có hợp lệ hay không!
		if(isset($_POST["submit"])) 
		{
		    $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		    if($check != false) 
		    {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } 
		    else 
		    {
		        //echo "Chỉ chấp nhận File ảnh";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		//if (file_exists($target_file)) 
		//{
		    //echo "Đã có 1 file bị trùng tên.";
		    //$uploadOk = 0;
		//}
		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) 
		{
		    //echo "Sorry, your file is too large.";
		    //$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
		    //echo "Chỉ chấp nhận file ảnh";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		   // echo "Lỗi! file chưa được upload!";
		// if everything is ok, try to upload file
		} 
		else 
		{
		    if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) 
		    {
		        //echo "The fi-le ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
		    } 
		    else 
		    {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		// thử lấy tên file xem có upload được chưa!
		// echo base_url()."Fileupload/". $_FILES["anhavatar"]["name"];
	    $anhavatar = basename($_FILES["anhavatar"]["name"]);
		// kiểm tra điều kiện, nếu có upload ảnh thì ấy ảnh đó, ngược lại, lấy ảnh avatar 2
	    if($anhavatar){
	    	// in ra ảnh avatar
	    	$anhavatar = base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
	    	//$anhavatar = base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
	    }
	    else
	    {
	    	$anhavatar = $this->input->post('anhavatar2');
	    }
	    // hết câu lệnh else thì ảnh avatar đã xử lý xong


	    // gọi luôn model để xử lý dữ liệu nhận được
	    $this->load->model('nhansu_model');
	    if ($this->nhansu_model->updateByID($id, $ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang))
	    {
	    	//echo "Update thành công!";
	    	// chuyển hướng trang web
	    	$this->load->view('insert_thanhcong_view');
	    }
	    else 
	    {
	    	echo "Update không thành công!";
	    }
	} 

	public function ajax_add()
	{
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sdt = $this->input->post('sdt');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		// $anhavatar = base_url()."Fileupload/". basename($_FILES["anhavatar"]["name"]);
		$anhavatar = $this->input->post('anhavatar');

		// truyền dữ liệu vào model.
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMysql($ten, $tuoi, $sdt, $anhavatar, $linkfb, $sodonhang);
		if($trangthai)
		{
			//echo "<h3>Insert dữ liệu thành công!</h3>";
			//$this->load->view('insert_thanhcong_view');
			echo "Insert thành công";
		}
		else
		{
			echo "Insert thất bại, hãy xem lại code!";
		}
	}

	public function uploadfile()
	{
		$uploadfile = new UploadHandler();
	}

	
}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */
?>