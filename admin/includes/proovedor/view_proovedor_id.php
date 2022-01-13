<link href="styles/ver.css" type="text/css" rel="stylesheet">
<?php if ($_SESSION['role'] != 7 and $_SESSION['role'] != 9 and $_SESSION['role'] != 5) {


  echo "<script>alert('No puedes acceder acá ')</script>";
  echo "<script>window.open('index.php?logged_in=Logueaste%20correctamente!','_self')</script>";
} else {
?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-text-o"></i> VER PROVEEDOR POR ID</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><a href="index.php?logged_in=Logueaste%20correctamente!"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="index.php?action=view_proovedor">Lista de Proveedores</a></li>
        <li class="breadcrumb-item active">Proveedores ID</li>

      </ul>
    </div>
    <div class="row" style="font-size: 15px;">
      <div class="col-md-12">
        <div class="tile">
          <?php
          $edit_cat = mysqli_query($conexion, "select * from proveedores where cod_proovedor='$_GET[pro_codigo]'");

          $fetch_cat = mysqli_fetch_array($edit_cat);

          ?>
          <section class="invoice">
            <div class="row mb-4">
              <div class="col-6">
                <h2 class="page-header"><i class="fa fa-globe"></i> <?php echo $fetch_cat['cod_proovedor']; ?></h2>
              </div>
              <div class="col-6">
                <h5 class="text-right">RUC: <b><?php echo $fetch_cat['ruc_proovedor']; ?></b></h5>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-4">
                

                <h5 class="colorText">RAZON SOCIAL: <b class="text-dark"><?php echo $fetch_cat['razon_proovedor']; ?></b></h5>
                <h5 class="colorText">EMAIL 1: <b class="text-dark"><?php echo $fetch_cat['email1_proovedor']; ?></b></h5>
                <h5 class="colorText">CELULAR 1: <b class="text-dark"><?php echo $fetch_cat['celular1_proovedor']; ?></b></h5>
                <h5 class="colorText">ESTADO: <b class="text-dark"><?php echo $fetch_cat['estado_proovedor']; ?></b></h5>

              </div>
              <div class="col-4">
                <h5 class="colorText">CONTACTO: <b class="text-dark"><?php echo $fetch_cat['contacto_proovedor']; ?></b></h5>
               <h5 class="colorText">EMAIL 2: <b class="text-dark"><?php echo $fetch_cat['email2_proovedor']; ?></b></h5>
                <h5 class="colorText">CELULAR 2: <b class="text-dark"><?php echo $fetch_cat['celular2_proovedor']; ?></b></h5>
              </div>
             
            </div>
            <div class="row invoice-info">
              <div class="col-11"><br>
                  <h5 class="colorText">DIRECCIÓN: <b class="text-dark"><?php echo $fetch_cat['direccion_proovedor']; ?></b></h5>
                  <h5 class="colorText">PAGINA WEB: <b class="text-dark"><?php echo $fetch_cat['web_proovedor']; ?></b></h5>

              </div>
            </div>
        </div>
        </section>
      </div>
    </div>
    </div>
  </main>

<?php } ?>