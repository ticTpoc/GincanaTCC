<html>
<head>
</head>
<body>
<h1> Cadastrar </h1>
<h3> Novo Usuário </h3>

<form action="novo_usuario.php" method="post">
<table>
 <tr><td> Usuário <td><input type="text" name="usuario" id="usuario" size="15" maxlength="10" required>
 <tr><td> RM <td><input type="text" name="nome" id="nome" size="15" maxlength="30" required>
 <tr><td> Tipo <td> <select name="tipo" id="tipo" required>
 <option value="admin"> Administrador </option>
 <option value ="editor"> Jogador </option>
 <tr><td> Digite sua senha <td><input type="password" name="senha1" id="senha1" size="15" maxlength="30" required>
 <tr><td> Confirme sua senha <td><input type="password" name="senha2" id="senha2" size="15" maxlength="30" required>
<tr><td><input type="submit" value=" Cadastrar">
</table>

</form>

</body>	
</html>