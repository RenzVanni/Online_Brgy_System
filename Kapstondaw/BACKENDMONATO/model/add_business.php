<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
    $taxpayer_fname  = $conn->real_escape_string($_POST['taxPayer_fname']);
    $taxpayer_mname  = $conn->real_escape_string($_POST['taxPayer_mname']);
    $taxpayer_lname  = $conn->real_escape_string($_POST['taxaPyer_lname']);
    $taxpayer_suffix  = $conn->real_escape_string($_POST['taxPayer_suffix']);

    $businessName 	= $conn->real_escape_string($_POST['business_name']);
    
    $house_no 	    = $conn->real_escape_string($_POST['taxPayer_houseNo']);
    $street 	    = $conn->real_escape_string($_POST['taxPayer_street']);
    $subdivision 	    = $conn->real_escape_string($_POST['taxPayer_subdivision']);

    $businessType  = $conn->real_escape_string($_POST['businessType']);
    $dateStarted  = $conn->real_escape_string($_POST['date_started']);
    $business_status  = $conn->real_escape_string($_POST['businessStatus']);


    if(!empty($house_no) && !empty($street) && !empty($subdivision)){

        $insert  = "INSERT INTO tbl_business (`taxpayer_fname`, `taxpayer_mname`, `taxpayer_lname`, `taxpayer_suffix`, `business_name`, `house_no`, `street`, `subdivision`, `business_type`, `business_status`, `business_started`) 
        VALUES ('$taxpayer_fname', '$taxpayer_mname', '$taxpayer_lname', '$taxpayer_suffix', '$businessName', '$house_no', '$street', '$subdivision', '$businessType', '$business_status', '$dateStarted')";
        $result  = $conn->query($insert);

        if($result === true){
            $_SESSION['message'] = 'Business added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }

    }else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../business.php");

	$conn->close();