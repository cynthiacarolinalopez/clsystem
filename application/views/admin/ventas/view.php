
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Empresa de Ventas</b><br>
		Utcd EXTRAORDINARIO <br>
		Tel.  <br>
		Email:
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>CLIENTE</b><br>
		<b>Nombre:</b> <?php echo $venta->RazonSocial; ?> <br>
		<b>Nro Comprobante:</b> <?php echo $venta->NroComprobante; ?><br>
		<b>Telefono:</b> <?php echo $venta->Telefono; ?> <br>
		<b>Direccion</b> <?php echo $venta->Direccion; ?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->TipoComprobanteId; ?><br>
		<b>Serie:</b> <?php echo $venta->SerieComprobante; ?><br>
		<b>Nro de Comprobante:</b> <?php echo $venta->NroComprobante; ?><br>
		<b>Fecha</b> <?php echo $venta->Fecha; ?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle): ?>
				
				<tr>
					<td><?php echo $detalle->codigo; ?></td>
					<td><?php echo $detalle->nombre; ?></td>
					<td><?php echo $detalle->precio; ?></td>
					<td><?php echo $detalle->cantidad; ?></td>
					<td><?php echo $detalle->importe; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IGV:</strong></td>
					<td><?php echo $venta->igv; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $venta->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->TotalVenta; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>