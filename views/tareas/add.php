<div class="row">
  <div class="col-sm-4"><h2>Nueva tarea</h2></div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4"><br /><a href="tareas"><button type="button" class="btn btn-primary add">Volver a tareas</button></a></div>
</div>

<form action="tareas/add" method="POST" role="form">
  <div class="form-group">
    <label for="nombre">Nombre de la tarea:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="fecha">Fecha:</label>
    <input type="text" class="form-control" id="Fecha" value="<?php echo date("Y-m-d"); ?>" name="fecha">
  </div>
  <div class="form-group">
    <label for="prioridad">Prioridad:</label>
    <input type="range" min="0" max="10" class="form-control" id="prioridad" name="prioridad">
  </div>
  <div class="form-group">
    <label for="categoria">categoria:</label>
    <select name="categoria_id" class="form-control">
      <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria["id"]; ?>">
          <?php echo $categoria["nombre"]; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>  
	<button type="submit" class="btn btn-default">Guardar tarea</button>
</form>