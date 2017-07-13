<?php
session_start();
require_once "../class/config_mssql.php";
$mssql = new pdo_dblib_mssql();

$username = $_POST['username'];
$password = $_POST['password'];
$sql_login="SELECT userid,password FROM dbo.ms_user
            WHERE userid='$username' AND password='$password' and ( ak_sales = 1 or ak_spv = 1 ) ";

$result = $mssql->db->prepare($sql_login); 
$result->execute(); 
$number_of_rows = $result->fetchColumn();

if($number_of_rows){
       
        $statement = $mssql->db->prepare($sql_login);
        $statement->execute();
        while ($row = $statement->fetch()) {
                                            
                $_SESSION['username'] = $username;
                $_SESSION['nama'] = $row["userid"];
                $_SESSION['tanggal'] = date('Y-m-d');	
                
               header('Location: ../home.php');
                exit();
        }         
}else {
    $_SESSION['warning'] = 'Login GAGAL! Username dan Password Tidak Sesuai';
     header('Location: ../index.php');
    exit();
}
?>