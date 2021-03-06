<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 14 AND $_SESSION['role'] != 5){
  echo "<script>alert('No sos de servicios')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}else{
  ?>
<?php include '../web/bd.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-handshake-o"></i> PRODUCTOS / SERVICIOS</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista de Servicios</li>
          
        </ul>
      </div>
        <form action="buscador_serv.php" method="get">
          <label>Buscar: </label>
          <input type="text" id="buscar_coti"name="buscador">
          <input type="submit" name="buscar_serv"  class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;">
        </form>
        <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">
                
              <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>
                      
          
                      <th>CODIGO</th>
                      <th>NOMBRE </th>
                      <th>IMAGEN </th>
                      <th>DISPONIBLES</th>
                      <th>CATEGORIA</th>
                      <th>ESTADO </th>
                      <th>PROVEEDOR</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $all_serv = mysqli_query($conexion,"select * from servicios order by servicio_id ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_serv)){
                    $nombreRo = $row['servicio_nombre'];
                    $codRo = $row['servicio_cod'];
                    ?>
                    <tbody align="center">
                     <tr>
             
                    <td><a href="index.php?action=view_serv_id&servicio_codigo=<?php echo $row['servicio_cod'];?>" style="color:#dc3545;font-weight: bold;"><?php echo $row['servicio_cod']; ?></a> </td>
                    <td><?php echo $row['servicio_nombre']; ?></td>
                    <td><img style="object-fit: cover;" src="servicios_fotos/<?php echo $row['servicio_foto']; ?>" width="70" height="70" /></td>
                    <td><?php echo $row['servicio_disponibles']; ?> Disponibles</td>
                    
                    <td><?php echo $row['servicio_categoria']; ?></td>
                    <td><?php echo $row['servicio_estado']; ?></td>
                    <td><?php echo $row['servicio_proveedor']; ?></td>
                    
                    <?php if ($codRo != $_SESSION['cod_user']) {?>
                     <td class="delete"><a href="index.php?action=edit_serv&serv_id=<?php echo $row['servicio_id'];?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>

                     <td class="delete"><a href="index.php?action=view_serv&delete_serv=<?php echo $row['servicio_id'];?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>
                   <?php } ?> 
                 </tr>

               </tbody>
                    <?php $i++;} // End while loop ?>
                </table>
             </div>

               </form>
            </div>
          </div>
        </div>
      </div>

      <a href="index.php?action=add_serv" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar P/S</a> 
 </main>   

 
<!-- PHP CODIGO  --> 
<?php
// Delete User cuenta

if(isset($_GET['delete_serv'])){
  $delete_serv = mysqli_query($conexion,"delete from servicios where servicio_id='$_GET[delete_serv]' ");
  
  if($delete_serv){
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  
   
    }
  }





// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($conexion,"delete from servicios where servicio_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Los items seleccionados fueron eliminado correctamente!')</script>";
  
  echo "<script>window.open('index.php?action=view_serv','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($conexion)!')</script>";
  }
  }
}
 ?>

<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    