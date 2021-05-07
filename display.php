<?php
include('connection.inc.php');
include('functions.inc.php');
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $sql="select * from files where file_id='$id'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $pdf_doc=$row['file_content'];
    $file_type=$row['file_type'];
    $project_name=$row['file_name'];
        $content="Content-type: application/".$file_type;
        header($content);  
        header('Content-disposition: inline; filename="'.$project_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $pdf_doc; 
    }
?>