<?php
$cot = mysqli_query($conexion,"select count(*) as total from cotizacion where cot_estado = 'Aprobado'");
$serv = mysqli_query($conexion,"select count(*) as total from servicios");
$ot = mysqli_query($conexion,"select count(*) as total from otcotizacion_servicio");
$op = mysqli_query($conexion,"select count(*) as total from opcotizacion_servicio");
$proveedor = mysqli_query($conexion,"select count(*) as total from proveedores");
$clientes = mysqli_query($conexion,"select count(*) as total from clientes");
$almacen_entrada = mysqli_query($conexion,"select count(*) as total from ingresos_almacen");
$almacen_salida = mysqli_query($conexion,"select count(*) as total from ingresos_salida");
$cot_vendedor = mysqli_query($conexion,"select cot_asignado ,Count(*) as total from cotizacion where cot_estado = 'Aprobado'  
Group By cot_asignado  Having Count(*) > 1  ;");
$cot_vendedor2 = mysqli_query($conexion,"select cot_asignado  as total1 from cotizacion where cot_estado = 'Aprobado'  
Group By cot_asignado  Having Count(*) > 1  ;");


$cot_cliente = mysqli_query($conexion,"select cot_cliente , Count(*) as juego FROM cotizacion  where cot_estado = 'Aprobado'
Group By cot_cliente Having Count(*) > 1 ;");
$cot_cliente2 = mysqli_query($conexion,"select cot_cliente  as total FROM cotizacion  where cot_estado = 'Aprobado'
Group By cot_cliente Having Count(*) > 1 ;");
//$cot_cliente = mysqli_query($conexion,"select cot_cliente ,cot_estado, Count(*) as juego FROM cotizacion  where cot_estado = 'Aprobado'
//Group By cot_cliente,cot_estado Having Count(*) > 1 ;");


$vent = mysqli_query($conexion,"select SUM(totalall_cot2) as total FROM cotizacion_servicio2 ");
$comp = mysqli_query($conexion,"select SUM(ocp2_total) as total FROM oc_proveedortabla2 ");
?>
<script src="https://kit.fontawesome.com/b14cf01b8c.js" crossorigin="anonymous"></script>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="app-menu__icon fa fa-dashboard"></i> Dashboard</h1>
		</div>
	</div>
	<div class="row" style="font-size: 15px;">
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="index.php?action=view_cotizacion" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fa fa-file-text"></i> Cotizaciones Aprobadas
							</h1>
							<h2>
								Totales:
								<?php
								$cot=mysqli_fetch_assoc($cot);
								echo $cot['total'];
								
								?>
							</h2>
							<h2>
								Por vendedor:
								<?php
								$data=mysqli_fetch_assoc($cot_vendedor);
								$data1=mysqli_fetch_assoc($cot_vendedor2);
								echo $data1['total1'];
								echo ' , ';
								echo $data['total'];

								
								?>
							</h2>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="index.php?action=view_serv" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fa fa-handshake-o"></i> Servicios:
								<?php
								$serv=mysqli_fetch_assoc($serv);
								echo $serv['total'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="index.php?action=ordenes_trabajo" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fas fa-paste"></i> Ordenes de Trabajo:
								<?php
								$ot=mysqli_fetch_assoc($ot);
								echo $ot['total'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="index.php?action=view_Ordpedido" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fa fa-truck"></i> Ordenes de Pedido:
								<?php
								$op=mysqli_fetch_assoc($op);
								echo $op['total'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive" style="color: #0d9d94;">
						<h1>
							<i class="fas fa-users"></i> Clientes:
							<?php
							$clientes=mysqli_fetch_assoc($clientes);
							echo $clientes['total'];
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive" style="color: #0d9d94;">
						<h1>
							<i class="fas fa-people-carry"></i> Proveedores:
							<?php
							$proveedor=mysqli_fetch_assoc($proveedor);
							echo $proveedor['total'];
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive" style="color: #0d9d94;">
						<h1>
							<i class="fas fa-dollar-sign"></i> Ventas:
							<?php
							$venta=mysqli_fetch_assoc($vent);
							echo 'S/.'.$venta['total'];
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive" style="color: #0d9d94;">
						<h1>
							<i class="fas fa-shopping-cart"></i> Compras:
							<?php
							$compra=mysqli_fetch_assoc($comp);
							echo 'S/.'.$compra['total'];
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="#" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fas fa-paste"></i> Almacén Entrada:
								<?php
								$almacen_entrada=mysqli_fetch_assoc($almacen_entrada);
								echo $almacen_entrada['total'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="#" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fas fa-paste"></i> Almacén Salida:
								<?php
								$almacen_salida=mysqli_fetch_assoc($almacen_salida);
								echo $almacen_salida['total'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="tile">
				<div class="tile-body">
					<a href="#" style="text-decoration:none;">
						<div class="table-responsive" style="color: #0d9d94;">
							<h1>
								<i class="fas fa-paste"></i> Cotizacion aprobada por cliente:
								<?php
								$data=mysqli_fetch_assoc($cot_cliente);
								$data2=mysqli_fetch_assoc($cot_cliente2);
								echo $data2['total'];
								echo ' , ' ;
								echo $data['juego'];
								?>
							</h1>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</main>