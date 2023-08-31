<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){
		try {
			$select = $conn->prepare("SELECT * FROM tblblotter WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$blotter = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_blotter_archive(`complainant`, `respondent`, `victim`, `type`, `location`, `date`, `time`, `details`, `status`) VALUES (
				'{$blotter['complainant']}',
				'{$blotter['respondent']}',
				'{$blotter['victim']}',
				'{$blotter['type']}',
				'{$blotter['location']}',
				'{$blotter['date']}',
				'{$blotter['time']}',	
				'{$blotter['details']}',	
				'{$blotter['status']}'	
			)";
			$conn->query($insert);
			
			$query = "DELETE FROM tblblotter WHERE id = '$id'";
			$result = $conn->query($query);
			
			
			if($result === true){
				$_SESSION['message'] = 'Blotter has been removed!';
				$_SESSION['success'] = 'danger';
				
			}else{
				$_SESSION['message'] = 'Something went wrong!';
				$_SESSION['success'] = 'danger';
			}
		} catch (Exception $e) { 
			$_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
			$_SESSION['success'] = 'danger';
		}
	}else{

		$_SESSION['message'] = 'Missing Blotter ID!';
		$_SESSION['success'] = 'danger';
	}


    header("Location: ../blotter.php");
	$conn->close();

	?>