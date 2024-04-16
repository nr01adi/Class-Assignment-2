<?php
	$name = $_POST['name'];
	$matricNo = $_POST['matricNo'];
	$addressCu = $_POST['addressCu'];
	$addressHo = $_POST['addressHo'];
	$email = $_POST['email'];
	$phoneNum = $_POST['phoneNum'];

	// Database connection
	$conn = new mysqli('localhost','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into student_detail (name, matricNo, addressCu, addressHo, email, phoneNum) values($name, $matricNo, $addressCu, $addressHo, $email, $phoneNum)");
		$stmt->bind_param("sisssi", $name, $matricNo, $addressCu, $addressHo, $email, $phoneNum);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>