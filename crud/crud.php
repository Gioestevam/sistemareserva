<?php

// Date Default

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Maceio');

// Session Start

session_name('user');
session_start();

// Function Logged

if(empty($_SESSION['logged'])) {
	$_SESSION['logged'] = "no-logged";
}

// Connect MySQL

$connect = new PDO("mysql:host=localhost; dbname=facima", "root", "root");
$connect->query("SET NAMES utf8;");

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
			<td><?php echo $data["status_user"];?></td>
			<td>
				<a href="update.php?edit_id=<?php echo $data['id_user']; ?>">Atualizar</a>
				<a href="../../delete.php?del_id=<?php echo $data['id_user']; ?>">Delete</a>
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

		header("location:logado/lib/user.php");
	}
	

	function login($email, $password, $status) {
		global $connect;
		$login = $connect->prepare("SELECT * FROM user WHERE (email_user = :email_user AND password_user = :password_user) LIMIT 1");
		$login->bindValue("email_user", $email, PDO::PARAM_STR);
		$login->bindValue("password_user", $password, PDO::PARAM_STR);
		$login->execute();
		if(!$login->rowCount() <= 0) {
			$_SESSION['email_user'] 	= $email;
			$_SESSION['logged'] 		= "logged";
			$_SESSION['status_user'] 	= $status;
		} else {
			$_SESSION['logged'] = "no-logged";
		}
	}
	
	function dataUser() {
		global $connect;
		$email = $_SESSION['email_user'];
		if(!empty($email)) {
			$dataUser = $connect->prepare("SELECT * FROM user WHERE email_user = :email LIMIT 1");
			$dataUser->bindValue("email", $email, PDO::PARAM_STR);
			$dataUser->execute();
			if(!$dataUser->rowCount() <= 0) {
				return $dataUser->fetchObject();
			} else {
				return false;
			}
		}
	}

	function logout() {

		global $connect;
		session_name('user');
		session_destroy();
		header("location: index.php");

	}
	
	function getReserve() {
		global $connect;
		$getReserve = $connect->prepare("SELECT * FROM reserve ORDER by id_reserve DESC");
		$getReserve->execute();
		return $getReserve->fetchAll(PDO::FETCH_OBJ);
	}
	
	function getDataStock($id) {
		global $connect;
		$getDataStock = $connect->prepare("SELECT * FROM stock WHERE id_item=:id LIMIT 1");
		$getDataStock->bindValue("id", $id, PDO::PARAM_STR);
		$getDataStock->execute();
		if(!$getDataStock->rowCount() <= 0) {
			return $getDataStock->fetchObject();
		} else {
			return false;
		}
	}
	
	function getDataUserStock($id) {
		global $connect;
		$getDataUserStock = $connect->prepare("SELECT * FROM user WHERE id_user=:id LIMIT 1");
		$getDataUserStock->bindValue("id", $id, PDO::PARAM_STR);
		$getDataUserStock->execute();
		if(!$getDataUserStock->rowCount() <= 0) {
			return $getDataUserStock->fetchObject();
		} else {
			return false;
		}
	}
	
	function getAllStock() {
		global $connect;
		$getAllStock = $connect->prepare("SELECT * FROM stock ORDER by id_item");
		$getAllStock->execute();
		if(!$getAllStock->rowCount() <= 0) {
			return $getAllStock->fetchAll(PDO::FETCH_OBJ);
		} else {
			return false;
		}
	}
	
	function dataStock($id) {
		global $connect;
		$dataStock = $connect->prepare('SELECT * FROM stock WHERE id_item=:id LIMIT 1');
		$dataStock->bindValue("id", $id, PDO::PARAM_STR);
		$dataStock->execute();
		if(!$dataStock->rowCount() <= 0) {
			return $dataStock->fetchObject();
		} else {
			return false;
		}
	}
	
	function reserveItem($item, $quantidade, $entrega, $devolucao, $local) {
		global $connect;
		$datareserva = time();
		$user = dataUser()->id_user;
		$reserveItem = $connect->prepare('INSERT INTO reserve (delivery_reserve, date_reserve, local_reserve, item, quantidade, user, devolution) VALUES (:delivery_reserve, :date_reserve, :local_reserve, :item, :quantidade, :user, :devolution)');
		$reserveItem->bindValue('delivery_reserve', $entrega);
		$reserveItem->bindValue('date_reserve', $datareserva);
		$reserveItem->bindValue('devolution', $devolucao);
		$reserveItem->bindValue('local_reserve', $local);
		$reserveItem->bindValue('item', $item);
		$reserveItem->bindValue('quantidade', $quantidade);
		$reserveItem->bindValue('user', $user);
		$reserveItem->execute();
	}
	
	function updateStockforReserve($item, $valor) {
		global $connect;
		$updateStockforReserve = $connect->prepare('UPDATE stock SET remaining=:valor WHERE id_item=:item');
		$updateStockforReserve->bindValue('valor', $valor);
		$updateStockforReserve->bindValue('item', $item);
		$updateStockforReserve->execute();
	}

	function getStock() {
		global $connect;
		$select = $connect->prepare("SELECT * FROM stock ORDER by id_item DESC");
		$select->execute();
		return $select->fetchAll(PDO::FETCH_OBJ);
	}

	function insertStock($code_item, $name_item, $amount_item, $description_item, $conteudo_item) {
		global $connect;
		$insertStock = $connect->prepare("INSERT INTO stock (code_item, name_item, amount_item, description_item, img_item, remaining) VALUES (:code, :name, :amount, :description, :img, :remaining)");
		$insertStock->bindValue("code", $code_item);
		$insertStock->bindValue("amount", $amount_item);
		$insertStock->bindValue("name", $name_item);
		$insertStock->bindValue("description", $description_item);
		$insertStock->bindValue("img", $conteudo_item);
		$insertStock->bindValue("remaining", $amount_item);
		$insertStock->execute();
	}

?>