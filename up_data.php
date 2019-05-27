<?php

function upload_data($image_name,$size,$klasor){

if($_FILES[$image_name]){
	if(is_uploaded_file($_FILES[$image_name]['tmp_name'])){
		$uzanti = explode('.', $_FILES[$image_name]['name']);
		$uzanti = $uzanti[1];

		$ad = uniqid().time();

		$gecerli_uzanti = [
			'image/jpg',
			'image/png'
		];

		$dosya_tipi = $_FILES[$image_name]['type'];
		if (in_array($dosya_tipi, $gecerli_uzanti)) {
	        
	        $sizes = 1024 * 1024 * $size;
	        if($sizes >= $_FILES[$image_name]['size']){
	        	$yukle = move_uploaded_file($_FILES[$image_name]['tmp_name'],$klasor.'/'.$ad.'.'.$uzanti);
	        	if ($yukle) {
	        		echo 'başarılı';
	        	}else{
	        		echo 'başarısız';
	        	}
	        }
		}
	}
}

}

if (isset($_POST['gonder'])) {
	
	upload_data('image',3,'upload');
}
?>
<form method="POST" enctype="multipart/form-data">
	<input type="file" name="image">
	<button type="submit" name="gonder">Gonder</button>
</form>