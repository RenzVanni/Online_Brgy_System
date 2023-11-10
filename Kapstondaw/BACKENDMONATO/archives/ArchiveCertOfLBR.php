<?php include '../server/server.php'?>
<?php
$query =  "SELECT * FROM del_certoflbr_archive";
$result = $conn->query($query);

$certoflbr = array();
while($row = $result->fetch_assoc()) {
  $certoflbr[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archives Certificate of Late Birth Registration</title>
    <link rel="stylesheet" href="../style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="../style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar2.js ?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="../sidenav.css">
</head>

<body>
    <?php include '../model/fetch_brgy_role.php' ?>
    <?php include '../actives/active_restore.php' ?>
    <?php include '../actives/active_account.php' ?>
    <?php include 'sidebar2.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Archives Certificate of Late Birth Registration</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <?php include '../template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Name of Applicant</th>
                        <th>Name of Requestor</th>
                        <th>Name of Parent</th>
                        <th>Name of Father</th>
                        <th>Name of Mother</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Document For</th>
                        <th>Status</th>
                        <th>Date Requested</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($certoflbr)) {?>
                    <?php $no=1; foreach($certoflbr as $row): ?>
                    <tr>
                        <td><?= $row['applicant_fname']. '' .$row['applicant_mname']. ' ' .$row['applicant_lname']?>
                        </td>
                        <td><?= $row['requestor_fname']. ' ' .$row['requestor_mname']. ' ' .$row['requestor_lname'] ?>
                        </td>
                        <td><?= $row['parent_fname']. ' ' .$row['parent_mname']. ' ' .$row['parent_lname'] ?>
                        </td>
                        <td><?= $row['father_fname']. ' ' .$row['father_mname']. ' ' .$row['father_lname'] ?>
                        </td>
                        <td><?= $row['mother_fname']. ' ' .$row['mother_mname']. ' ' .$row['mother_lname'] ?>
                        </td>
                        <td><?= $row['date_of_birth']?></td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                        <td><?= $row['documentFor']?></td>
                        <td><?= $row['status']?></td>
                        <td><?= $row['date_requested']?></td>
                    </tr>
                    <?php $no++; endforeach  ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>