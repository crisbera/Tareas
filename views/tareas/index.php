<div class="row">
  <div class="col-sm-12"><h2>Lista de tareas</h2></div>
</div>
<div class="row">
	<div class="col-sm-10">
<ul class="nav nav-tabs">

   <?php
  	$i = 0;
  	$categoriasId= array();
	foreach ($categorias as $categoria): 
		if ($i==0): ?>
			<li class="active"><a data-toggle="tab" href="#<?php echo $categoria["nombre"]; ?>"><?php echo $categoria["nombre"]; ?></a></li>
	<?php else: ?>
		 <li><a data-toggle="tab" href="#<?php echo $categoria["nombre"]; ?>"><?php echo $categoria["nombre"]; ?></a></li>
	<?php 
		endif; 
		$i++;
		$categoriaId["id"][] = $categoria["id"];
		$categoriaId["nombre"][] = $categoria["nombre"];
	endforeach;
	 ?>
</ul>

</div>
  	<div class="col-sm-2"><a href="tareas/add"><button type="button" class="btn btn-primary add"><span class="glyphicon glyphicon-plus"></span> Tarea</button></a></div>
</div>

<div class="tab-content">
<?php
	for ($j=0; $j < $i ; $j++):
		if ($j==0): ?>
			<div id="<?php echo $categoriaId["nombre"][$j]; ?>" class="tab-pane fade in active">
		<?php else: ?>
			<div id="<?php echo $categoriaId["nombre"][$j]; ?>" class="tab-pane fade">
		<?php endif; ?>
		<br>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Fecha</th>
				<th>Prioridad</th>
				<th>Acción</th>
			</tr>
		<?php foreach ($tareas as $tarea): 
				if ($tarea[1] == $categoriaId["id"][$j]):
		?>
			<tr>
				<td><?php echo $tarea[0]; ?></td>
				<td><?php 
					if($tarea[5]==0):
						echo "<s>".$tarea[2]."</s>"; 	
					else:
						echo $tarea[2];
					endif;
					?>
				</td>
				<td><?php
					$date = date_create($tarea[3]);
					echo date_format($date, 'd/m/Y');
					?>
				</td>
				<td><?php 
					if ($tarea[4]<=3):
						echo '<span class="label label-success">Baja&nbsp;&nbsp;&nbsp;</span>';
					elseif($tarea[4]<=6):
						echo '<span class="label label-warning">Media</span>';	
					elseif($tarea[4]<=10):
						echo '<span class="label label-danger">Alta&nbsp;&nbsp;&nbsp;</span>';
					endif;
					?>
				</td>
				<td><a href="tareas/edit/<?php echo $tarea[0]; ?>"><span class="glyphicon glyphicon-edit"></a>
			<?php 	if ($tarea[5]==0): ?>
						<a href="tareas/status/on/<?php echo $tarea[0]; ?>">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					<?php else: ?>
						<a href="tareas/status/off/<?php echo $tarea[0]; ?>">
							<span class="glyphicon glyphicon-ok"></span>
						</a>
			<?php 	endif; ?>
						<a href="tareas/delete/<?php echo $tarea[0]; ?>">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
			</tr>
		<?php 
		endif;
		endforeach; 
		?>
		</table>
	</div>
<?php endfor; ?>
</div>