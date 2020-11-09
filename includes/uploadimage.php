<?php
      if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
               //$errors[]= "<div class='alert alert-danger'>Extension Not Allowed, Default Image Used.</div>";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be exactly 2 MB';
            }
            
            if(empty($errors)==true){
               $md5_file_name = md5($file_name);
               $new_file_name = $firstname.$lastname.'-'.$md5_file_name.'.'.$file_ext;
               move_uploaded_file($file_tmp,"images/profile/".$new_file_name);
               $imgpath = "images/profile/".$new_file_name;
               //$imgpath = $firstname.$lastname.'-'.$file_name.'.'.$file_ext;
            }else{
               print_r($errors);
            }
         }//else {
            //$imgpath = "images/profile/default.png";
         //}
?>
