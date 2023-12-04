<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_brgyId.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Barangay ID</h2>
            <div class="container requestor">
                <label for="requestor">Requestor</label>
                <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                    placeholder="Enter requestor firstname">
                <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                    placeholder="Enter requestor middlename">
                <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                    placeholder="Enter requestor lastname">
            </div>
            <div class="container">
                <label for="contact-number">Contact Number</label>
                <input required type="text" name="contactNo" id="contact-number" placeholder="Enter Contact Number" />
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="for" class="for">
                    <option value="self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>
            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="applicant_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <input type="hidden" name="applicant_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="applicant_civilStatus" value="<?php echo $_SESSION['civil'] ?>">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_brgyClearance.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Barangay Clearance</h2>
            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <input type="hidden" name="applicant_pob" value="<?php echo $_SESSION['place_of_birth'] ?>" id="">
            <input type="hidden" name="applicant_dob" value="<?php echo $_SESSION['date_of_birth'] ?>" id="">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_endoresement.php" method="POST">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Endorsement</h2>
            <div class="container requestor">
                <label for="requestor">Requestor</label>
                <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                    placeholder="Enter requestor firstname">
                <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                    placeholder="Enter requestor middlename">
                <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                    placeholder="Enter requestor lastname">
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="for" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>

            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">

            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_certOfIndigency.php" method="POST">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Certificate of Indigency</h2>
            <div class="container requestor">
                <label for="requestor">Requestor</label>
                <input class="requestorName" type="text" name="requestor_fname" id="requestor"
                    placeholder="Enter requestor firstname">
                <input class="requestorName" type="text" name="requestor_mname" id="requestor"
                    placeholder="Enter requestor middlename">
                <input class="requestorName" type="text" name="requestor_lname" id="requestor"
                    placeholder="Enter requestor lastname">
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="For" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>

            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">


            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_certOfLBR.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Certificate of Late Birth Registration</h2>
            <div class="container">
                <label for="ffname">Father's Firstname</label>
                <input required type="text" name="ffname" id="ffname" placeholder="Enter Father's Firstname" />
            </div>
            <div class="container">
                <label for="fmname">Father's Middlename</label>
                <input required type="text" name="fmname" id="fmname" placeholder="Enter Father's Middlename" />
            </div>
            <div class="container">
                <label for="flname">Father's Lastname</label>
                <input required type="text" name="flname" id="flname" placeholder="Enter Father's Lastname" />
            </div>
            <div class="container">
                <label for="mfname">Mother's Firstname</label>
                <input required type="text" name="mfname" id="mfname" placeholder="Enter Mother's Firstname" />
            </div>
            <div class="container">
                <label for="mmname">Mohert's Middlename</label>
                <input required type="text" name="mmname" id="mmname" placeholder="Enter Mother's Middlename" />
            </div>
            <div class="container">
                <label for="mlname">Mother's Lastname</label>
                <input required type="text" name="mlname" id="mlname" placeholder="Enter Mother's Lastname" />
            </div>
            <div class="container">
                <label for="for">For</label>
                <select name="documentFor" id="For" class="for">
                    <option value="Self">For self</option>
                    <option value="Someone">For someone else</option>
                </select>
            </div>
            <input type="hidden" name="applicant_fname" value="<?php echo $_SESSION['firstname']?>">
            <input type="hidden" name="applicant_mname" value="<?php echo $_SESSION['middlename']?>">
            <input type="hidden" name="applicant_lname" value="<?php echo $_SESSION['lastname']?>">
            <input type="hidden" name="applicant_houseNo" value="<?php echo $_SESSION['house_no'] ?>" id="">
            <input type="hidden" name="applicant_street" value="<?php echo $_SESSION['street'] ?>" id="">
            <input type="hidden" name="applicant_subdivision" value="<?php echo $_SESSION['subdivision'] ?>" id="">
            <button type="button" class="fake-btn">Request</button>
        </div>
        <div class="confirmation">
            <div class="main-container">
                <div class="reminder-container">
                    <h3>Reminder!</h3>
                    <p>Dear residents, kindly be reminded that in order to claim your documents, please proceed to the
                        barangay office. Be prepared for a short interview regarding the purpose of your request and
                        ensure that you have the necessary payment ready for processing your requested documents. Thank
                        you for your cooperation.</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="active-service-request">Request</button>
                    <button type="button" class="cancel-request">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="active-service" id="active-service">
    <form class="active-form" action="./frontendModel/request_businessClearance.php" method="post">
        <div class="main-form">
            <div class="active-service-close"><img src="./assets/close-login.svg" alt=""></div>
            <h2>Business Clearance</h2>
            <div class="container">
                <label for="business-name">Name of Business</label>
                <input required type="text" name="business_name" id="business-name" placeholder="Enter Business Name" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Firstname</label>
                <input required type="text" name="owner_fname" id="business-owner-fname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Middlename</label>
                <input required type="text" name="owner_mname" id="business-owner-mname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-owner-name">Business Owner Lastname</label>
                <input required type="text" name="owner_lname" id="business-owner-lname"
                    placeholder="Enter Business Owner" />
            </div>
            <div class="container">
                <label for="business-address">Address of Business</label>
                <input required type="text" name="business_address" id="business-address"
                    placeholder="Enter Business Address" />
            </div>
            <button type="submit" class="active-service-request">Request</button>
        </div>
    </form>
</div>