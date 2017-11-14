<?php

$connect = new PDO("mysql:host=localhost; dbname=sistemreserve", "root", "root");


	function create() {

		global $connect;


		if(isset($_POST["cadastrar"])) {

			$full_name_user  = filter_input(INPUT_POST,"full_name_user", FILTER_SANITIZE_STRING);
			$name_user 	 	 = filter_input(INPUT_POST,"name_user", FILTER_SANITIZE_STRING);
			$email_user	 	 = filter_input(INPUT_POST,"email_user", FILTER_SANITIZE_STRING);
			$cpf_user		 = filter_input(INPUT_POST,"cpf_user", FILTER_SANITIZE_STRING);
			$password_user	 = sha1(md5(filter_input(INPUT_POST,"password_user", FILTER_SANITIZE_STRING)));

			if(empty($full_name_user) || empty($name_user) || empty($email_user) || empty($cpf_user) || empty($password_user)) {
			?>
			<div class="alert_error">Campos em brancos</div>
			<?php
			} else {
				$insert = $connect->prepare("INSERT INTO user (full_name_user, name_user, email_user, cpf_user, password_user, permission_user, status_user) VALUES (:full_name_user, :name_user, :email_user, :cpf_user, :password_user, 1, 0)");
				$insert-> bindValue(":full_name_user", $full_name_user);
				$insert-> bindValue(":name_user", $name_user);
				$insert-> bindValue(":email_user", $email_user);
				$insert-> bindValue(":cpf_user", $cpf_user);
				$insert-> bindValue(":password_user", $password_user);
				$insert-> execute();
				?>
				<div class="alert_success">Inserido com sucesso!</div>
				<?php
			}
		}	
	}

	function read() {
		
		global $connect;

		$select = $connect->prepare("SELECT * FROM user");
		$select -> setFetchMode(PDO::FETCH_ASSOC);
		$select -> execute();
		while ($data=$select->fetch()){
		?>
		<tr>
			<br>
			<td><?php echo $data["full_name_user"];?></td>
			<td><?php echo $data["name_user"];?></td>
			<td><?php echo $data["email_user"];?></td>
			<td><?php echo $data["cpf_user"];?></td>
			<td><?php echo $data["permission_user"];?></td>
			<td>
				<a href="update.php?edit_id=<?php echo $data['id_user']; ?>">Atualizar</a>
				<a href="delete.php?del_id=<?php echo $data['id_user']; ?>">Delete</a>
			</td>
		</tr>
		<?php
		}
	}

	function update() {

		global $connect;

		if(isset($_POST["done"])) {
			
			$edit_id = $_GET["edit_id"];


			$full_name_user  = filter_input(INPUT_POST,"full_name_user", FILTER_SANITIZE_STRING);
			$name_user 	 	 = filter_input(INPUT_POST,"name_user", FILTER_SANITIZE_STRING);
			$email_user	 	 = filter_input(INPUT_POST,"email_user", FILTER_SANITIZE_STRING);
			$cpf_user		 = filter_input(INPUT_POST,"cpf_user", FILTER_SANITIZE_STRING);
			$password_user	 = sha1(md5(filter_input(INPUT_POST,"password_user", FILTER_SANITIZE_STRING)));

			if(empty($full_name_user) || empty($name_user) || empty($email_user) || empty($cpf_user) || empty($password_user)){
				?>
					<div style="position: absolute; background: #FF0000; width: 100%; float: left; padding: 10px 0; font-family: Arial; font-size: 14px; font-weight: 400; color: #FFF; text-align: center;">Campos em brancos</div>
				<?php
			} else {
				
				$update = $connect->prepare("UPDATE user SET full_name_user=:full_name_user, name_user=:name_user, email_user=:email_user, cpf_user=:cpf_user, password_user=:password_user WHERE id_user='$edit_id'");
				$update-> bindValue(":full_name_user", $full_name_user);
				$update-> bindValue(":name_user", $name_user);
				$update-> bindValue(":email_user", $email_user);
				$update-> bindValue(":cpf_user", $cpf_user);
				$update-> bindValue(":password_user", $password_user);
				$update-> execute();

				?>
					<div style="position: absolute; background: #00FF00; width: 100%; float: left; padding: 10px 0; font-family: Arial; font-size: 14px; font-weight: 400; color: #FFF; text-align: center;">Inserido com sucesso!</div>
				<?php

				header("location:list.php");
			}
		}
	}

	function delete() {

		global $connect;

		$del_id	= $_GET['del_id'];

		$delete  = $connect->prepare("DELETE FROM user WHERE id_user='$del_id'");
		$delete -> execute();

		header("location:list.php");
	}
	

	//Verificação de USUÀRIO 

	function logar(){

		session_start();

		global $connect;

		if(isset($_POST["login"])){

			$email_user	 	 = filter_input(INPUT_POST,"email_user", FILTER_SANITIZE_STRING);
			$password_user	 = sha1(md5(filter_input(INPUT_POST,"password_user", FILTER_SANITIZE_STRING)));

			if(empty($email_user) || empty($password_user)){
				echo "<script>alert('informe email e senha!');</script>";
			}

			$logar = $connect->prepare("SELECT * FROM user WHERE email_user = :email_user AND password_user = :password_user");
			$logar->bindValue(":email_user", $email_user, PDO::PARAM_STR);
			$logar->bindValue(":password_user", $password_user, PDO::PARAM_STR);
			$logar->execute();

			if($logar->rowCount() == 1){
				$_SESSION["email_user"] = $email_user;
				header("location:logado/admin/admin.php");
			} else {
				header("location: index.php");
			}
		}
	}

	function logout() {

		global $connect;

		if(isset($_POST["logout"])){
			session_start();
			session_destroy();
			header("location: index.php");
		}

	}

	// LER ITEM NO ESTOQUE

	function read_stock() {
		
		global $connect;

		$select = $connect->prepare("SELECT * FROM stock");
		$select -> setFetchMode(PDO::FETCH_ASSOC);
		$select -> execute();
		while ($data=$select->fetch()){
		?>
		<tr>
			<br>
			<td><?php echo $data["code_item"];?></td>	
			<td><?php echo $data["name_item"];?></td>
			<td><?php echo $data["description_item"];?></td>
			<td><?php echo $data["amount_item"];?></td>
			<td>
				<a href="update.php?edit_id=<?php echo $data['id_user']; ?>">Atualizar</a>
				<a href="delete.php?del_id=<?php echo $data['id_user']; ?>">Delete</a>
			</td>
		</tr>
		<?php
		}
	}

	// Cadastrar Item no Estoque

	function create_stock(){

		global $connect;

		$code_item 			= $POST_["code_item"];
		//$amount_item 		= filter_input(INPUT_POST,"amount_item", FILTER_SANITIZE_STRING);
		$name_item 			= $POST_["name_item"];
		//$description_item 	= filter_input(INPUT_POST,"description_item", FILTER_SANITIZE_STRING);

		$insert_stock = $connect->prepare("INSERT INTO stock (code_item, name_item) VALUES (:code_item, :name_item)");
		$insert_stock->bindValue(":code_item", $code_item);
		//$insert_stock-> bindValue(":amount_item", $amount_item);
		$insert_stock->bindValue(":name_item", $name_item);
		//$insert_stock-> bindValue(":descripttion_item", $description_item);
		//$insert_stock-> bindValue(":img_item", $conteudo, PDO::PARAM_LOB);
		$insert_stock->execute();
	}

?>