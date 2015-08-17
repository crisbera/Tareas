<h1>Manejo de usuarios</h1>
<a href="usuarios/add">Agregar usuario</a>
<a href="groups">Grupos</a>
<a href="users/login">Entrar</a>

<table border="1">
	<tr>
		<th>ID</th>		
		<th>Nombre</th>		
		<th>Apellido</th>		
		<th>Action</th>		
	</tr>
	
	<?php
		foreach($usuarios as $usuario){ ?>
		<tr>
		<td><?php echo $usuario['id']; ?></td>
		<td><?php echo $usuario['nombre']; ?></td>
		<td><?php echo $usuario['apellidos']; ?></td>
		<td>
			<a href="usuarios/edit/<?php echo $usuario['id']; ?>">Edit</a> | 
			<a href="usuarios/delete<?php echo $usuario['id']; ?>">Delete</a>
		</td>
		</tr>
	<?php }	?>	
	
</table>