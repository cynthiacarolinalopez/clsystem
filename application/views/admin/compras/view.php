<div class="row">
	<div class="col-xs-12 text-center">
		<b>Empresa de Ventas</b><br>
		Psje Andaluz <br>
		Tel.  <br>
		Email:
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>COMPROBANTE</b><br>
		<b>Comprobante:</b> <?php echo $compra->TipoComprobante; ?> <br>
		<b>Nro Serie:</b> <?php echo $compra->SerieComprobante; ?><br>
		<b>Nro Comprobante:</b> <?php echo $compra->NroComprobante; ?><br>
		<b>Fecha Compra:</b> <?php echo $compra->Fecha; ?> <br>
		<b>Razon Social</b> <?php echo $compra->proveedor; ?><br>
	</div>	
	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo de Barra</th>
					<th>Detalle</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles_compras as $detalle_compra): ?>
				<tr>
					<td><?php echo $detalle_compra->IdDetalleCompra; ?></td>
					<td><?php echo $detalle_compra->Nombre; ?></td>
					<td><?php echo $detalle_compra->PrecioUnitario; ?></td>
					<td><?php echo $detalle_compra->Cantidad; ?></td>
					<td><?php echo $detalle_compra->Importe; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $compra->subtotal; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IGV:</strong></td>
					<td><?php echo $compra->igv; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $compra->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $compra->total; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>