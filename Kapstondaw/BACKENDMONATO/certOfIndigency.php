<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_certofindigency";
$result = $conn->query($query);

$certofindigency = array();
while($row = $result->fetch_assoc()) {
  $certofindigency[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Indigency</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">
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
            <p>Certificate of Indigency</p>
            <a href="#">Logout</a>
        </div>

        <div class="second_layer">
            <div class="search-cont">
                <p>Search:</p>
                <input type="text" class="searchBar" placeholder=" Enter text here">
            </div>
            <div class="add-cont">
                <a href="#" class="add" id="addIndigency_forself">+ Forself</a>
                <a href="#" class="add" id="addIndigency_forsomeone">+ Forsomeone</a>
                <a href="archives/ArchiveCertOfIndigency.php" class="archiveResidents">Archive</a>
            </div>
        </div>

        <?php include './template/message.php' ?>

        <form action="" class="form-allCert">
            <div class="third_layer">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Name of Applicant</th>
                            <th>Name of Requestor</th>
                            <th>Address</th>
                            <th>Document For</th>
                            <th>Purpose</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($certofindigency)) { ?>
                        <?php $no=1; foreach($certofindigency as $row): ?>
                        <tr>
                            <td><?= $row['applicant_fname']. '' .$row['applicant_mname']. ' ' .$row['applicant_lname'] ?>
                            </td>
                            <td><?= $row['requestor_fname']. ' ' .$row['requestor_mname']. ' ' .$row['requestor_lname'] ?>
                            </td>
                            <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                            <td><?= $row['documentFor'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td><?= $row['date_requested'] ?></td>
                            <td>
                                <select name="Status" id="Status" onchange="changeColor(this)">
                                    <option class="Pending" value="Pending">Pending</option>
                                    <option class="Preparing" value="Preparing">Preparing</option>
                                    <option class="For_Pick_up" value="For_Pick_up">For Pick-up</option>
                                    <option class="Completed" value="Completed">Completed</option>
                                </select>
                            </td>
                            </td>
                            <td>
                                <?php if($row['documentFor'] === 'Self') { ?>
                                <a href="./generate/certOfIndigency_generate_forself.php?id=<?= $row['id'] ?>"
                                    class="print">Print</a>
                                <?php } else {?>
                                <a href="./generate/certOfIndigency_generate_forsomeone.php?id=<?= $row['id'] ?>"
                                    class="print">Print</a>
                                <?php } ?>
                                <a href="./model/remove/remove_certOfIndigency.php?id=<?= $row['id'] ?>"
                                    class="delete">Delete</a>
                            </td>
                        </tr>
                        <?php $no++; endforeach ?>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <button id="prevBtn">Previous</button>
                    <div id="pageNumbers" class="page-numbers"></div>
                    <button id="nextBtn">Next</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-addIndigency_forself">
        <form class="formIndigency_forself" action="./model/add_certOfIndigency.php" method="post">
            <div class="title-cont-modal">
                <p>For Self</p>
                <img src="icons/close 1.png" class="closeForm_forself" alt="">
            </div>

            <div class="modal-layer-indigency-self">
                <div class="input-indigency-self">
                    <label for="applicantName">Applicant Name:</label>
                    <input type="text" id="applicantName" placeholder="Applicant Name">
                </div>
                <div class="input-indigency-self">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" id="house_no" placeholder="Houseno.">
                        <input type="text" id="street" placeholder="Street name">
                        <input type="text" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-indigency-self">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" name="purpose">
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Self">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>

    <div class="modal-addIndigency_forsomeone">
        <form class="formIndigency_forsomeone" action="./model/add_certOfIndigency.php" method="post">
            <div class="title-cont-modal">
                <p>For Someone</p>
                <img src="icons/close 1.png" class="closeForm_forsomeone" alt="">
            </div>

            <div class="modal-layer-indigency-someone">
                <div class="input-indigency-someone">
                    <label for="applicantName">Applicant Name:</label>
                    <input type="text" id="applicantName" placeholder="Applicant Name">
                </div>
                <div class="input-indigency-someone">
                    <label for="requestorName">Requestor Name:</label>
                    <input type="text" id="requestorName" placeholder="Requestor Name">
                </div>
                <div class="input-indigency-someone">
                    <label for="address">Address:</label>
                    <div class="label111">
                        <input type="text" id="house_no" placeholder="Houseno.">
                        <input type="text" id="street" placeholder="Street name">
                        <input type="text" id="subdivision" placeholder="Subdivision name">
                    </div>
                </div>
                <div class="input-indigency-someone">
                    <label for="purpose">Purpose:</label>
                    <input type="text" id="purpose" name="purpose">
                </div>
            </div>
            <input type="hidden" name="documentFor" value="Someone">
            <input type="submit" id="submit" value="Add">
        </form>
    </div>




</body>

</html>

<script src="./js//jQuery-3.7.0.js"></script>
<script src="./js//app.js"></script>
<script src="sidebar.js"></script>
<script>
const addIndigencyLink = document.getElementById('addIndigency_forself');
const modaladdIndigency = document.querySelector('.modal-addIndigency_forself');
const closeForm = document.querySelector('.closeForm_forself');

addIndigencyLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdIndigency.style.display = 'block';
});

closeForm.addEventListener('click', function() {
    modaladdIndigency.style.display = 'none';
});

const addIndigencyLink1 = document.getElementById('addIndigency_forsomeone');
const modaladdIndigency1 = document.querySelector('.modal-addIndigency_forsomeone');
const closeForm1 = document.querySelector('.closeForm_forsomeone');

addIndigencyLink1.addEventListener('click', function(event) {
    event.preventDefault();
    modaladdIndigency1.style.display = 'block';
});

closeForm1.addEventListener('click', function() {
    modaladdIndigency1.style.display = 'none';
});


// JavaScript code to handle pagination
const table = document.getElementById('table');
const rows = table.querySelectorAll('tbody tr');
const totalRows = rows.length;
const rowsPerPage = 10;
let currentPage = 1;

function showRows(page) {
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    rows.forEach((row, index) => {
        if (index >= start && index < end) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function updatePaginationButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageNumbers = document.getElementById('pageNumbers');

    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === Math.ceil(totalRows / rowsPerPage);

    pageNumbers.textContent = currentPage;
}

// Initial setup
showRows(currentPage);
updatePaginationButtons();

// Previous button click event
document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        showRows(currentPage);
        updatePaginationButtons();
    }
});
</script>