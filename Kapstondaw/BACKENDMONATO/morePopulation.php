<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_households ORDER BY id DESC";
$result = $conn->query($query);
$total = $result->num_rows;

$residents = array();
while($row = $result->fetch_assoc()) {
  $residents[] = $row;
}

function calculateAge($dob) {
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Population</title>
    <link rel="stylesheet" href="moreInfo.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>

<body>

    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>Total Population</p>
            <a href="#">Logout</a>
        </div>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
        </div>

        <div class="Box-Container">
            <div class="First-Cont">
                <div class="bigBox">
                    <div class="text-cont">
                        <p class="text">TOTAL POPULATION</p>
                        <p class="number"><?= number_format($total) ?></p>
                    </div>
                    <img src="icons/ResidentsSeeMore.png" alt="">
                </div>
            </div>
            <div class="Second-Cont">
                <div class="smallBox">
                    <div class="text-cont">
                        <p class="text">Infant</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/InfantSeeMore.png" alt="">
                </div>
                <div class="smallBox">
                    <div class="text-cont">
                        <p class="text">Child</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/ChildSeeMore.png" alt="">
                </div>

                <div class="smallBox">
                    <div class="text-cont">
                        <p class="text">Adolescents</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/AdolescentsSeeMore.png" alt="">
                </div>

                <div class="smallBox">
                    <div class="text-cont">
                        <p class="text">Adults</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/AdultsSeeMore.png" alt="">
                </div>

                <div class="smallBox">
                    <div class="text-cont">
                        <p class="text">Elderly</p>
                        <p class="number">600</p>
                    </div>
                    <img src="icons/ElderlySeeMore.png" alt="">
                </div>
            </div>
        </div>


        <div class="fourth_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision'] ?></td>
                    </tr>
                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <!-- Add more rows here -->
            </table>
        </div>



    </div>
</body>

</html>