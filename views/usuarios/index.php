<h2>Manejo de usuarios</h2>

<table border="1">
	<tr>
		<th>ID</th>		
		<th>Username</th>		
		<th>Email</th>		
		<th>Acción</th>		
	</tr>
	
	<?php
		foreach($usuarios as $usuario){ ?>
		<tr>
		<td><?php echo $usuario['id']; ?></td>
		<td><?php echo $usuario['username']; ?></td>
		<td><?php echo $usuario['email']; ?></td>
		<td>
			<a href="usuarios/edit/<?php echo $usuario['id']; ?>">Edit</a> | 
			<a href="usuarios/delete<?php echo $usuario['id']; ?>">Delete</a>
		</td>
		</tr>
	<?php }	?>	
	
</table>