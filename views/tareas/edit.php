<div class="row">
  <div class="col-sm-4"><h2>Editar tarea</h2></div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4"><br /><a href="tareas"><button type="button" class="btn btn-primary add">Volver a tareas</button></a></div>
</div>
<form action="tareas/edit" method="POST" role="form">
	<input type="hidden" name="id" value="<?php echo $tarea["id"]; ?>">
	<div class="form-group">
		<label for="nombre">Nombre: </label>
		<input type="text" class="form-control" name="nombre" value="<?php echo $tarea["nombre"]; ?>"></p>
	</div>
	<div class="form-group">
	<label for="nombre">Fecha: </label>
		<input type="date" class="form-control" name="fecha" value="<?php echo $tarea["fecha"]; ?>"></p>
	</div>
	<div class="form-group">
	<label for="nombre">Prioridad: </label>
		<input type="range" class="form-control" min="0" max="10" name="prioridad" value="<?php echo $tarea["prioridad"]; ?>"></p>
	</div>
  <div class="form-group">
    <label for="categoria">categoria:</label>
		<select name="categoria_id" class="form-control">
			<?php foreach ($categorias as $categoria): 
				if ($categoria["id"]==$tarea["categoria_id"]) { ?>
					<option value="<?php echo $categoria["id"]; ?>" selected>
					<?php echo $categoria["nombre"]; ?>
					</option>
				<?php }else{ ?>
					<option value="<?php echo $categoria["id"]; ?>">
					<?php echo $categoria["nombre"]; ?>
					</option>
				<?php } endforeach; ?>
			
		</select>
    </select>
  </div>	
	<button type="submit" class="btn btn-default">Guardar tarea</button>
</form>