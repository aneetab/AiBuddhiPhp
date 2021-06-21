<?php
function pr($arr){
    echo '<pre>';
    print_r($arr);
}
function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str)
{
    if($str!='')
    $str=trim($str);
    return mysqli_real_escape_string($con,$str);
}
function get_experts($con)
{
    $sql="select * from sme_apply where status='1'";
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res))
    {
        $data[]=$row;
    }
    return $data;
}
function get_data($con,$sql)
{
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res))
    {
        $data[]=$row;
    }
    return $data;
}
function check_num_rows($con,$sql)
{
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    return '1';
    else
    return '0';
}
function modify($con,$sql)
{
    if(mysqli_query($con,$sql))
    return '1';
    else
    return '0';
}
function get_num_rows($con,$sql)
{
    $res=mysqli_query($con,$sql);
    return mysqli_num_rows($res);
}
?>