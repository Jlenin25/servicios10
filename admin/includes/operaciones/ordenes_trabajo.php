<link href="styles/main.css" type="text/css" rel="stylesheet">
<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if($_SESSION['role'] != 7 AND $_SESSION['role'] != 17 AND $_SESSION['role'] != 5 ){


echo "<script>alert('No puedes acceder acá ')</script>";
echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
}else{ ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> ORDENES DE TRABAJO</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Lista de Ordenes</li>
          
        </ul>
      </div>
      <style type="text/css">
        
      </style>
      <!-- <form action="buscador_coti.php" method="get">
      <label>Buscar: </label>
      <input id="buscar_coti" type="text" name="buscador_coti" >
      <input type="submit" name="buscar_coti" class="btn btn-primary" style="margin-bottom:10px;margin-left: 10px;"> -->

    </form>
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          
              

      <!-- TABLA OT -->
     
      <div class="row" style="font-size: 15px;">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="table-responsive">

                
              <table class="table table-hover table-bordered">
                  <thead align="center">
                    <tr>
                      
                      <th>CODIGO </th>
                      <th>CLIENTE</th>
                      <th>VENDEDOR</th>
                      <th>ESTADO</th>
                      <th>COT</th>
                      <th>CREADO</th>
                      <th>PROCESADO</th>
                      <th>Editar</th> 
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                  $estado = 'Aprobado';
                  $all_cot = mysqli_query($conexion,"select * from otcotizacion_servicio order by ot_id ");
                  $i = 1;

                  while($row=mysqli_fetch_array($all_cot)){
                    $nombreRo = $row['ot_cliente'];
                    $codRo = $row['ot_codigo'];
                    ?>
                    <tbody align="center">
                      <tr>
                        
                       <td> <a href="index.php?action=view_ot&otcod=<?php echo $row['ot_codigo']; ?>" style="color: #D35400; font-weight: bold;"> <?php echo $row['ot_codigo']; ?></a></td>
                       <td><?php echo $row['ot_cliente']; ?></td>
                       <td><?php echo $row['ot_asignado']; ?></td>
                       <td><?php echo $row['ot_estado']; ?></td>
                       <td><?php echo $row['ot_cot']; ?></td>
                       
                       <td><?php echo $row['ot_fecha']; ?></td>
                       <td><?php echo $row['ot_fechaEdit']; ?></td>
                      <!-- <td><a href="lista_servicio.php?ruc=<?php echo $row['cot_codigo']; ?>" >Tabla</a></td>  -->
                           <td class="delete"><a href="index.php?action=edit_ot&otcod=<?php echo $row['ot_codigo']; ?>" ><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td> 

                           <td class="delete"><a href="index.php?action=ordenes_trabajo&delete_ot=<?php echo $row['ot_codigo']; ?>" onclick="return confirm('Estas seguro de eliminar que quieres eliminar  a este empleado?');"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></td>

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


      <!-- <a href="index.php?action=add_cotizacion" class="btn btn-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Agregar Cotización</a>  -->

 </main>   

 
<!-- PHP CODIGO  --> 
<?php
if(isset($_GET['delete_cotizacion'])){
  $delete_serv = mysqli_query($conexion,"delete from cotizacion where cot_id='$_GET[delete_cotizacion]' ");

  if($delete_serv){

    echo "<script>window.open('index.php?action=ordenes_trabajo','_self')</script>";


    }
  }

  if(isset($_GET['delete_ot'])){
    $delete_serv = mysqli_query($conexion,"delete from otcotizacion_servicio where ot_codigo='$_GET[delete_ot]' ");
    $delete_serv2 = mysqli_query($conexion,"delete from otcotizacion_servicio2 where ot2_cod='$_GET[delete_ot]' ");
    echo "<script>window.open('index.php?action=ordenes_trabajo','_self')</script>";
  }
  ?>

<?php } ?>

<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

    