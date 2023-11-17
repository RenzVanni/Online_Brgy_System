<?php include '../server/server.php'?>
<?php
$query =  "SELECT * FROM del_certofindigency_archive";
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
    <title>Archives Certificate Of Indigency</title>
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
            <p>Archives Certificate Of Indigency</p>
            <a href="#">Logout</a>
        </div>
        <a href="../certOfIndigency.php" class="backContainer">
            <img src="../icons/back.png" alt="">
            <p>Go Back</p>
        </a>
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
                        <th>Address</th>
                        <th>Document For</th>
                        <th>Purpose</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($certofindigency)) {?>
                    <?php $no=1; foreach($certofindigency as $row): ?>
                    <tr>
                        <td><?= $row['applicant_fname']. '' .$row['applicant_mname']. ' ' .$row['applicant_lname']?>
                        </td>
                        <td><?= $row['requestor_fname']. ' ' .$row['requestor_mname']. ' ' .$row['requestor_lname'] ?>
                        </td>
                        <td><?= $row['house_no']. " ". $row['street']. " ". $row['subdivision']?></td>
                        <td><?= $row['documentFor']?></td>
                        <td><?= $row['purpose']?></td>
                        <td><?= $row['date_requested']?></td>
                        <td><?= $row['status']?></td>
                    </tr>
                    <?php $no++; endforeach  ?>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prevBtn">Previous</button>
                <div id="pageNumbers" class="page-numbers"></div>
                <button id="nextBtn">Next</button>
            </div>
        </div>
    </div>

</body>

</html>

<script>
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