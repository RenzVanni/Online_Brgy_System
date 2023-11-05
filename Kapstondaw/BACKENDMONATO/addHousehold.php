<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECORD OF BARANGAY INHABITANTS BY HOUSEHOLD</title>
    <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
    <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
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
            <p>RECORD OF BARANGAY INHABITANTS BY HOUSEHOLD</p>
            <a href="#">Logout</a>
        </div>
        <a href="residentInfo.php" class="backContainer">
            <img src="icons/back.png" alt="">
            <p>Go Back</p>
        </a>

        <div class="input-form">
            <div class="headerInfo">
                <p>Household Information</p>
            </div>
            <div class="bodyInfo">
                <div class="leftInfo">
                    <div class="inputFullname">
                        <p>Full name<span>*</span></p>
                        <input type="text" name="lastName[]" id="lastName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Last Name" required>
                        <input type="text" name="firstName[]" id="firstName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="First Name" required>
                        <input type="text" name="middleName[]" id="middleName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Middle Name" required>
                        <input type="text" name="ext[]" class="suffix" id="ext"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Suffix">
                    </div>
                    <div class="inputDob">
                        <p>Date of Birth<span>*</span></p>
                        <input type="date" name="dateBirth[]" id="dateBirth"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputPob">
                        <p>Place of Birth<span>*</span></p>
                        <input type="text" name="placeBirth[]" id="placeBirth"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputCitizenship">
                        <p>Citizenship<span>*</span></p>
                        <input type="text" name="citizenship[]" id="citizenship"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="inputPhoneNo">
                        <p>Phone number</p>
                        <input type="number" name="phoneNo[]" id="phoneNo" placeholder="e.g., 09123456789">
                    </div>
                    <div class="inputEmail">
                        <p>Email</p>
                        <input type="text" name="email[]" id="email" placeholder="Enter your email">
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputAddress">
                        <p>Address<span>*</span></p>
                        <input type="text" name="no[]" class="houseNo" id="no"
                            oninput="this.value = this.value.toUpperCase()" placeholder="House No.">
                        <input type="text" name="streetName[]" id="streetName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Street Name" required>
                        <input type="text" name="subdiName[]" id="subdiName"
                            oninput="this.value = this.value.toUpperCase()" placeholder="Subdivision Name">
                    </div>

                    <div class="inputOccupation">
                        <p>Occupation <span>*</span></p>
                        <input type="text" name="occupation[]" id="occupation"
                            oninput="this.value = this.value.toUpperCase()" required>
                    </div>

                    <div class="inputSex">
                        <p>Sex <span>*</span></p>
                        <select id="sex" name="sex[]" class="sex111" required>
                            <option value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="inputCivilStatus">
                        <p>Civil Status <span>*</span></p>
                        <select id="civilStatus" name="civilStatus[]" class="civilStatus111" required>
                            <option value=""></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="footerInfo">
                <button type="button" class="addSaTable">Create</button>
            </div>
        </div>

        <p class="List">List of Members</p>

        <form action="./model/add_households.php" method="post" class="input-table">
            <table class="main-table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Citizenship</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Occupation</th>
                        <th>Sex</th>
                        <th>Civil Status</th>
                        <th class="houseTitle">Household Head</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be dynamically added here using JavaScript -->
                </tbody>
            </table>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addSaTableButton = document.querySelector('.addSaTable');
        const inputTableBody = document.querySelector('.input-table tbody');

        addSaTableButton.addEventListener('click', function(event) {
            event.preventDefault();

            // Define an array of required fields
            const requiredFields = ['lastName', 'firstName', 'middleName', 'dateBirth', 'placeBirth',
                'citizenship', 'streetName', 'occupation', 'sex', 'civilStatus'
            ];

            // Check if all required fields are filled out
            const allFieldsFilled = requiredFields.every(fieldName => {
                const field = document.getElementById(fieldName);
                return field.value.trim() !== '';
            });

            if (!allFieldsFilled) {
                alert("Please fill out all required fields.");
                return; // Stop execution if not all required fields are filled
            }

            // Continue with creating a new row if all required fields are filled
            const lastName = document.getElementById('lastName').value;
            const firstName = document.getElementById('firstName').value;
            const middleName = document.getElementById('middleName').value;
            const ext = document.getElementById('ext').value;
            const dateBirth = document.getElementById('dateBirth').value;
            const placeBirth = document.getElementById('placeBirth').value;
            const citizenship = document.getElementById('citizenship').value;
            const phoneNo = document.getElementById('phoneNo').value;
            const email = document.getElementById('email').value;
            const houseNo = document.getElementById('no').value;
            const streetName = document.getElementById('streetName').value;
            const subdiName = document.getElementById('subdiName').value;
            const occupation = document.getElementById('occupation').value;
            const sex = document.getElementById('sex').value;
            const civilStatus = document.getElementById('civilStatus').value;

            // Phone number validation for the Philippines (10 digits starting with 09)
            const phoneNoValue = document.getElementById('phoneNo').value;
            if (phoneNoValue.trim() !== "") {
                const phoneNumberPattern = /^(09|\+639)\d{9}$/;
                if (!phoneNumberPattern.test(phoneNoValue)) {
                    alert("Please enter a valid Philippine phone number.");
                    return; // Stop execution if the phone number is invalid
                }
            }

            // Email validation
            const emailValue = document.getElementById('email').value;
            if (emailValue.trim() !== "") {
                const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
                if (!emailPattern.test(emailValue)) {
                    alert("Please enter a valid email address.");
                    return; // Stop execution if the email is invalid
                }
            }

            // Create a new row in the table
            // Create a new row in the table
            const newRow = inputTableBody.insertRow();
            const inputNames = [
                'lastName',
                'firstName',
                'middleName',
                'dateBirth',
                'placeBirth',
                'citizenship',
                'phoneNo',
                'email',
                'no',
                'streetName',
                'subdiName',
                'occupational',
                'sex',
                'civilStatus',
                'ext'
            ];
            // Create a single set of input fields for names
            const nameCell = newRow.insertCell(0);
            const lastNameInput = document.createElement('input');
            lastNameInput.type = 'text';
            lastNameInput.name = 'lastName' + "[]";
            lastNameInput.value = lastName

            const firstNameInput = document.createElement('input');
            firstNameInput.type = 'text';
            firstNameInput.name = 'firstName[]';
            firstNameInput.value = firstName

            const middleNameInput = document.createElement('input');
            middleNameInput.type = 'text';
            middleNameInput.name = 'middleName[]';
            middleNameInput.value = middleName

            const extInput = document.createElement('input');
            extInput.type = 'text';
            extInput.name = 'ext[]';
            extInput.value = ext

            nameCell.appendChild(lastNameInput);
            nameCell.appendChild(firstNameInput);
            nameCell.appendChild(middleNameInput);
            nameCell.appendChild(extInput);

            const dobCell = newRow.insertCell(1);
            const dobInput = document.createElement('input');
            dobInput.type = 'text';
            dobInput.name = 'dateBirth[]';
            dobInput.value = dateBirth

            dobCell.appendChild(dobInput);

            const pobCell = newRow.insertCell(2);
            const pobInput = document.createElement('input');
            pobInput.type = 'text';
            pobInput.name = 'placeBirth[]';
            pobInput.value = placeBirth

            pobCell.appendChild(pobInput);

            const citizenshipCell = newRow.insertCell(3);
            const citizenshipInput = document.createElement('input');
            citizenshipInput.type = 'text';
            citizenshipInput.name = 'citizenship[]';
            citizenshipInput.value = citizenship

            citizenshipCell.appendChild(citizenshipInput);

            const phoneCell = newRow.insertCell(4);
            const phoneInput = document.createElement('input');
            phoneInput.type = 'text';
            phoneInput.name = 'phoneNo[]';
            phoneInput.value = phoneNo

            phoneCell.appendChild(phoneInput);

            const emailCell = newRow.insertCell(5);
            const emailInput = document.createElement('input');
            emailInput.type = 'text';
            emailInput.name = 'email[]';
            emailInput.value = email

            emailCell.appendChild(emailInput);

            const addressCell = newRow.insertCell(6);
            const houseNoInput = document.createElement('input');
            houseNoInput.type = 'text';
            houseNoInput.name = 'no[]';
            houseNoInput.value = document.getElementById('no').value;
            houseNoInput.style.width = '30px';

            const streetNameInput = document.createElement('input');
            streetNameInput.type = 'text';
            streetNameInput.name = 'streetName[]';
            streetNameInput.value = document.getElementById('streetName').value;

            const subdiNameInput = document.createElement('input');
            subdiNameInput.type = 'text';
            subdiNameInput.name = 'subdiName[]';
            subdiNameInput.value = document.getElementById('subdiName').value;

            addressCell.appendChild(houseNoInput);
            addressCell.appendChild(streetNameInput);
            addressCell.appendChild(subdiNameInput);

            const occupationCell = newRow.insertCell(7);
            const occupationInput = document.createElement('input');
            occupationInput.type = 'text';
            occupationInput.name = 'occupational[]';
            occupationInput.value = occupation

            occupationCell.appendChild(occupationInput);

            const sexCell = newRow.insertCell(8);
            const sexInput = document.createElement('input');
            sexInput.type = 'text';
            sexInput.name = 'sex[]';
            sexInput.value = sex

            sexCell.appendChild(sexInput);

            const civilStatusCell = newRow.insertCell(9);
            const civilStatusInput = document.createElement('input');
            civilStatusInput.type = 'text';
            civilStatusInput.name = 'civilStatus[]';
            civilStatusInput.value = civilStatus

            civilStatusCell.appendChild(civilStatusInput);
            // inputElement.readOnly = true; // Make the input read-only
            // cell.appendChild(inputElement);

            const householdHeadCell = newRow.insertCell(10);
            const radioInput = document.createElement('input');
            radioInput.type = 'radio';
            radioInput.name =
                'householdHead' + "[" + inputTableBody.rows.length +
                "]";
            // radioInput.value = 'no'; // Set the value to 'yes'
            console.log(inputTableBody.rows.length)

            radioInput.value = 'no'; // Default value is 'no'
            radioInput.addEventListener('change', function() {
                if (radioInput.checked) {
                    radioInput.value = 'yes';
                }
            });
            console.log(radioInput.value)
            householdHeadCell.appendChild(radioInput);

            // Create a "Delete" button for the "Action" column
            const actionCell = newRow.insertCell(11);
            const deleteButton = document.createElement('button');
            deleteButton.textContent =
                'Delete';
            deleteButton.style.cursor = 'pointer';
            deleteButton.style.color =
                '#ff0000';
            deleteButton.style.fontSize = '10px';
            deleteButton.style.fontFamily =
                'Poppins';
            deleteButton.style.fontStyle = 'normal';
            deleteButton.style.fontWeight =
                '700';
            deleteButton.style.lineHeight = 'normal';
            deleteButton.style.border =
                'none';
            deleteButton.addEventListener('click', function() {
                // Remove the row when the "Delete" button is clicked
                inputTableBody.removeChild(newRow);
            });
            actionCell.appendChild(deleteButton);

            // Clear input fields (except for 'no', 'streetName', and 'subdiName')
            requiredFields.forEach(fieldName => {
                if (fieldName !== 'no' && fieldName !== 'streetName' && fieldName !==
                    'subdiName') {
                    document.getElementById(fieldName).value = '';
                }
            });

            // Clear additional fields
            document.getElementById('ext').value = '';
            document.getElementById('phoneNo').value =
                '';
            document.getElementById('email').value = '';
        });
    });
    </script>


</body>

</html>