
<!DOCTYPE html>
<html lang="en">
   <head>
  <?php 
  include '../script_awal.php';
  include $doc_root.'bs_meta.php';   
  include $doc_root.'bs_css.php';
  require_once "../class/config_mssql.php";
  $mssql = new pdo_dblib_mssql();
  $cari = $_GET['cari'];
  ?>
  <link href="../asset/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../asset/css/menu_nav.css" rel="stylesheet" type="text/css">
  </head>
 <body>
    <?php include $doc_root.'header.php';?>
    <?php include $doc_root.'menu_top.php';?>  
     <div class="container-fluid">

        <!-- START JUDUL, TOMBOL & FORM CARI -->
         <div class="row-fluid">
            <div class="span12">
              <legend>
                  BARANG
                  <form name="search_form" action="#" method="GET" class="pull-right">
                    <input type="text" name="cari" id="cari" class="input-medium" >
                    <input type="hidden" name="id" id="id" class="input-medium" value="<?php echo $id; ?>">
                   </form>

              </legend>
            </div>
         </div>
         <!-- START JUDUL, TOMBOL & FORM CARI -->
    

          <!-- START PAGINATION & PESAN NOTIFIKASI -->
         <div class="row-fluid">
           <div class="span7" style="margin-top: 5px;"><?php include $doc_root.'msg.php';?></div>
         </div>
         <!-- END PAGINATION & PESAN NOTIFIKASI -->
             
         <!-- START TABEL DATA -->
         <div class="row-fluid">
             <div class="span12">     
                <table class="table table-striped table-bordered table-condensed">
                  <thead>
                    <tr>
                        <th width="5%" style="text-align: center;">No</td>
                        <th width="20%">Kode </td>
                        <th width="30%">Nama</td>
                        <th width="20%">Merk</td>
                        <th width="20%">Tipe</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      
                      if (empty($cari)){
                      $query = "SELECT kode,idbarang,namabrg,merkbrg,tipebrg FROM dbo.barang ";
                      }else{
                        $query = "SELECT kode,idbarang,namabrg,merkbrg,tipebrg FROM dbo.barang   
                      WHERE ( kode like '%$cari%' or namabrg like '%$cari%' ) ";
                      }
                      
                      $statement = $mssql->db->prepare($query);
                      $statement->execute(); $i=1; 
                      while ($row = $statement->fetch()) { 
                  ?>
                    <tr>
                      <td><?php  echo $i; ?></td>
                      <td><?php echo $row['kode'];?></td>
                      <td><a href="<?php echo $addr_server;?>appl/barang_rinci.php?id=<?php echo $row['kode'];?>"> 
                      <?php echo $row['namabrg'];?></a></td>
                      <td><?php echo $row['merkbrg'];?></td>
                      <td><?php echo $row['tipebrg'];?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
              </table>
             </div>
         </div>
         <!-- START TABEL DATA -->
    </div><br>
    <?php include $doc_root.'footer.php';?>
    <?php include $doc_root.'bs_js.php';?>
  </body>



















</html>
