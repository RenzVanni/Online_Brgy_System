<?php 
	include '../../server/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if(!empty($id)){
		try {
			$select = $conn->prepare("SELECT * FROM tbl_complain WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$blotter = $select->get_result()->fetch_assoc();

			$insert = "INSERT INTO del_complain_archive(`complainant_fname`, `complainant_mname`, `complainant_lname`, `complainant_suffix`, `date`, `location`, `time`, `details`, `status`) VALUES (
				'{$blotter['complainant_fname']}',
				'{$blotter['complainant_mname']}',
				'{$blotter['complainant_lname']}',
				'{$blotter['complainant_suffix']}',
				'{$blotter['date']}',
				'{$blotter['location']}',
				'{$blotter['time']}',	
				'{$blotter['details']}',	
				'{$blotter['status']}'	
			)";
			$conn->query($insert);
			
			$query = "DELETE FROM tbl_complain WHERE id = '$id'";
			$result = $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'Complain has been removed!';
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

		$_SESSION['message'] = 'Missing Complain ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../complain.php");
	$conn->close();