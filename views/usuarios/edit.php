<h1>Editar Usuario</h1>

<form action="usuarios/edit" method="POST">
	<input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">
	<p>Nombre: <input type="text" name="nombre" value="<?php echo $usuario["nombre"]; ?>"></p>
	<p>Apellidos: <input type="text" name="apellidos" value="<?php echo $usuario["apellidos"]; ?>"></p>
	<p>Email: <input type="text" name="email" value="<?php echo $usuario["email"]; ?>"></p>
	<p>Username: <input type="text" name="username" value="<?php echo $usuario["username"]; ?>"></p>
	<p>Password: <input type="password" name="password" value="<?php echo $usuario["password"]; ?>"></p>
	<p><input type="submit" value="Save"></p>
</form>