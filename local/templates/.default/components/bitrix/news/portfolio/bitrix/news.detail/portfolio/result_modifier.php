
<?php  

$APPLICATION->AddChainItem("Мой пункт", "");

	foreach ($arResult["DISPLAY_PROPERTIES"]["GALLERY"]["FILE_VALUE"] as &$image)
	{
		  $previewImage = CFile::ResizeImageGet(
                	$image["ID"],
                	 array('width'=>100, 
                	 	'height'=>100),
                	 	 BX_RESIZE_IMAGE_PROPORTIONAL,
                	 	  true); 
           $image["PREVIEW_SRC"]= $previewImage["src"];           
	}
	unset($image);


