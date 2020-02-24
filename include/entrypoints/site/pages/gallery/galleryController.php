<?php 
class galleryController extends EntryPointController{
  
    function action_index(){
        //die("gallery");
        $this->params['gallery']=$this->getGalleryImage();
       // print_r($this->params['gallery']);
        $this->view='gallery';
    }
    
    function getGalleryImage(){
       global $vjconfig,$db;
       $url=$vjconfig['baseurl'];
       $sql="select replace(file_path,"."'/var/www/html/idsna/',"."'$url'".") as path from media_files
              inner join gallery_images on
              media_files.id=gallery_images.image where gallery_images.deleted=0";
       //die($sql);
       $rows=$db->fetchRows($sql);
       //die($rows);
       //print_r($rows);
    return $rows;
    }
}
?>