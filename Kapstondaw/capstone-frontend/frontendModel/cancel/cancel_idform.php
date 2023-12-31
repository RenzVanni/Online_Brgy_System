<?php 
	include '../../frontendServer/server.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$id 	= $conn->real_escape_string($_GET['id']);

	if($id != ''){

		try {
			$select = $conn->prepare("SELECT * FROM tbl_idform WHERE id = ?");
			$select->bind_param("s", $id);
			$select->execute();
			$idForm = $select->get_result()->fetch_assoc();

		$insert = "INSERT INTO del_idform_archive( `applicant_fname`, `applicant_mname`, `applicant_lname`, `applicant_suffix`, `requestor_fname`, `requestor_mname`, `requestor_lname`, `requestor_suffix`, `house_no`, `street`, `subdivision`, `place_of_birth`, `birth_date`, `civil_status`, `contact_number`, `documentFor`, `status`, `date_requested`) VALUES (
				'{$idForm['applicant_fname']}',
				'{$idForm['applicant_mname']}',
				'{$idForm['applicant_lname']}',
				'{$idForm['applicant_suffix']}',
				'{$idForm['requestor_fname']}',
				'{$idForm['requestor_mname']}',
				'{$idForm['requestor_lname']}',
				'{$idForm['requestor_suffix']}',
				'{$idForm['house_no']}',
				'{$idForm['street']}',
				'{$idForm['subdivision']}',
				'{$idForm['place_of_birth']}',
				'{$idForm['birth_date']}',
				'{$idForm['civil_status']}',
				'{$idForm['contact_number']}',
				'{$idForm['documentFor']}',
				'Cancel',
				'{$idForm['date_requested']}'

			)";
			$conn->query($insert);
	 
			$query 		= "DELETE FROM tbl_idform WHERE id = '$id'";
			
			$result 	= $conn->query($query);
			
			if($result === true){
				$_SESSION['message'] = 'idForm has been removed!';
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

		$_SESSION['message'] = 'Missing idForm ID!';
		$_SESSION['success'] = 'danger';
	}

    header("Location: ../../Cart.php");
	$conn->close();