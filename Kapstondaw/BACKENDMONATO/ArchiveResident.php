<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Residents</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="./style/generateCert.css?<?php echo time(); ?>">
    <script src="sidebar.js ?<?php echo time(); ?>"></script>

</head>
<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/import_residents.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>

    <div class="home_residents">
        <div class="first_layer">
            <p>Resident Information</p>
            <a href="#">Logout</a>
        </div>
        <a href="residentInfo.php" class="backContainer">
                <img src="icons/back.png" alt="">
                <p>Go Back</p>
            </a>
        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input class="searchBar" type="text" placeholder=" Enter text here">
                <a href="#" id="sortFilter">Sort & Filter </a>

                <div class="sort">
                    <div class="header-sort">
                        <img src="icons/close 1.png" alt="" class="close-sort">
                    </div>
                    <div class="sortby-cont">
                        <p>Sort by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?age=filter">Age</a></li>
                                <li><a href="?senior=true">SNR</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sortby-cont">
                        <p>Filter by</p>
                        <div class="sort-btn">
                            <ul>
                                <li><a href="?filter=sex&value=male">Male</a></li>
                                <li><a href="?filter=sex&value=female">Female</a></li>
                                <li><a href="?filter=civil_status&value=Single">Single</a></li>
                                <li><a href="?filter=civil_status&value=Married">Married</a></li>
                                <li><a href="?filter=civil_status&value=Divorced">Divorced</a></li>
                                <li><a href="?filter=civil_status&value=Widowed">Widowed</a></li>
                                <li><a href="?filter=voter_status&value=voter">Voter</a></li>
                                <li><a href="?filter=osy&value=OSY">OSY</a></li>
                                <li><a href="?filter=pwd&value=PWD">PWD</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>

        <?php include './template/message.php' ?>

        <div class="third_layer">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Civil Status</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($residents)) { ?>
                    <?php $no=1; foreach($residents as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['firstname'] ?> <?=$row['middlename'] ?> <?= $row['lastname']?></td>
                        <td><?= calculateAge($row['date_of_birth'])?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['date_of_birth'] ?></td>
                        <td><?= $row['place_of_birth'] ?></td>
                        <td><?= $row['civil_status'] ?></td>
                        <td><?= $row['house_no']. " " .$row['street']. " " .$row['subdivision'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="actions">
                            <a href="#" class="edit" id="editResidents" onclick="editResident(this)"
                                data-id="<?= $row['id'] ?>" data-fname="<?= $row['firstname'] ?>"
                                data-mname="<?= $row['middlename'] ?>" data-lname="<?= $row['lastname'] ?>"
                                data-sex="<?= $row['sex'] ?>" data-houseNo="<?= $row['house_no'] ?>"
                                data-street="<?= $row['street'] ?>" data-subdivision="<?= $row['subdivision'] ?>"
                                data-dbirth="<?= $row['date_of_birth'] ?>" data-pbirth="<?= $row['place_of_birth'] ?>"
                                data-cstatus="<?= $row['civil_status'] ?>" data-occupation="<?= $row['occupation'] ?>"
                                data-email="<?= $row['email'] ?>" data-contactNo="<?= $row['contact_no'] ?>"
                                data-vstatus="<?= $row['voter_status'] ?>" data-citizenship="<?= $row['citizenship'] ?>"
                                data-householdNo="<?= $row['household_no'] ?>" data-osy="<?= $row['osy'] ?>"
                                data-pwd="<?= $row['pwd'] ?>">Edit</a>
                            <?php 
                                $userExists = false;
                                foreach($users as $user) {
                                    if ($user['firstname'] === $row['firstname'] && $user['lastname'] === $row['lastname']) {
                                        $userExists = true;
                                        break;
                                    }
                                }
                            ?>
                            <?php if(!$userExists) { ?>
                            <a href="#" class="accountBtn" onclick="createAccount(this)"
                                data-fname="<?= $row['firstname'] ?>" data-mname="<?= $row['middlename'] ?>"
                                data-lname="<?= $row['lastname'] ?>"
                                data-age="<?= calculateAge($row['date_of_birth']) ?>" data-sex="<?= $row['sex'] ?>"
                                data-houseNo="<?= $row['house_no'] ?>" data-street="<?= $row['street'] ?>"
                                data-subdivision="<?= $row['subdivision'] ?>" data-cstatus="<?= $row['civil_status'] ?>"
                                data-dbirth="<?= $row['date_of_birth'] ?>" data-email="<?= $row['email'] ?>">Account</a>
                            <?php } ?>
                            <a href="#" class="delete delete-archive" id="delete-archive">Delete</a>

                            <div class="modal-delete">
                                <div class="form-delete">
                                    <div class="delete-cont">
                                        <p>Delete</p>
                                        <img src="icons/close 1.png" alt="" class="close-delete">
                                    </div>
                                    <div class="delete-description">
                                        <p>Deleting this will remove all data
                                            and cannot be undone.</p>
                                    </div>
                                    <div class="delete-submit">
                                        <a href="./model/remove/remove_resident.php?id=<?= $row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $no++; endforeach ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <button id="nextButton" onclick="showNextRows()">Next</button>
                        </td>
                    </tr>
                </tfoot>
                <!-- Add more rows here -->
            </table>
        </div>
    </div>

</body>
</html>