<h1> Novo usuário </h1>

<form action="NovoUsuario.php" method="post">
<table>
 
 <tr><td> Usuário <td><input type="text" name="usuario" id="usuario" size="11" maxlength="11" required>
 <tr><td> Nome <td><input type="text" name="nome" id="nome" size="30" maxlength="30" required>
 <tr><td> Tipo <td> <select name="tipo" id="tipo" required>
 <option value="admin"> Administrador </option>
 <option value ="editor"> Editor </option>
 <tr><td> Digite sua senha <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10" required>
 <tr><td> Confirme sua senha <td><input type="password" name="senha2" id="senha2" size="10" maxlength="10" required>
<tr><td><input type="submit" value=" Cadastrar">
</table>

</form>