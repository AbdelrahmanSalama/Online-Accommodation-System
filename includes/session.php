<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['1'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['0'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE ID=:ID");
			$stmt->execute(['ID'=>$_SESSION['email']]);
			$user = $stmt->fetch();
			echo "string";
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>