<?php
?>
<div class="second_section container container-fluid my-4 d-flex justify-content-center align-items-center">
    <div class="form-container" id="form-container" style="min-height: 400px;">
        <?php
        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($url);
        $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
        ?>
        <!-- OTP FORM  -->
        <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
            <form method="POST" action="../../controllers/verify-otp.php">
                <h5 style="text-align: center;">
                    OTP has been sent to
                    <span id="phone_no"></span>
                </h5>
                <input type="text" name="otp" id="otp" maxlength="6" pattern="\d*" inputmode="numeric"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                <div style="display: none">
                    <input type="text" name="phone_number" id="phone_number">
                    <input type="text" name="lead_name" id="lead_name">
                    <input type="text" name="lead_email" id="lead_email">
                    <input type="text" name="lang" id="lang">
                    <input type="text" name="project_name" id="project_name">
                    <input type="text" name="developer_name" id="developer_name">
                    <input type="text" name="lead_type" id="lead_type">
                    <input type="text" name="enquiry_type" id="enquiry_type">
                    <input type="text" name="lead_for" id="lead_for">
                    <input type="text" name="country_name" id="country_name">
                    <input type="text" name="file_name" id="file_name" value="<?php echo $filename; ?>">
                </div>

                <button type="submit" class="mt-3" style="font-weight: bold;">
                    VERIFY OTP
                </button>
            </form>
        </div>
        <?php
        $query = mysqli_query($con, "SELECT ip, filename FROM leads ORDER BY creationDate DESC LIMIT 1");
        $fetch = mysqli_fetch_array($query);
        if ($ip == $fetch['ip'] && $filename == $fetch['filename']) {
            ?>
            <div class="p-5 d-flex justify-content-center align-items-center text-center"
                style="width: 100%; height: 100%; line-height: 2.5rem;">
                Thank you for registering with us. Our professionals will contact you soon!
            </div>
            <?php
        } else {
            ?>
            <!--NEW FORM-->
            <form id="lead-form" dir="ltr" onsubmit="return submitLeadForm();">
                <div style="display: none">
                    <input type="text" id="Project" name="Project" value="Livings" />
                    <input type="text" id="Developer" name="Developer" value="Empire" />
                    <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                    <input type="text" id="Language" name="Language" value="English" />
                    <input type="text" id="Country" name="Country" value="United Arab Emirates" />
                    <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
                    <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                    <input type="text" id="LeadSource" name="LeadSource" value="<?php echo $leadSource; ?>" />

                    <!-- CLIENT -->
                    <?php
                    if ($client === "true") {
                        ?>
                        <input type="text" id="IsClient" name="IsClient" value="<?php echo $client; ?>" />
                        <input type="text" id="ClientId" name="ClientId" value="<?php echo $client_id; ?>" />
                        <input type="text" id="ClientEmail" name="ClientEmail" value="<?php echo $client_email; ?>" />
                        <?php
                    }
                    ?>
                </div>
                <!-- NAME -->
                <label>
                    NAME
                </label>
                <input type="text" name="LeadName1" id="LeadName1" required />

                <!-- CONTACT NUMBER -->
                <label>
                    CONTACT NUMBER
                </label>
                <input type="tel" name="phone[main]" id="mobile" placeholder="** *** ****" required />

                <!-- HOW MANY BEDROOMS -->
                <label>
                    HOW MANY BEDROOMS?
                </label>
                <div class="enquiry-radio" style="display: flex;">
                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="Studio" required
                        onchange="updateFields('Livings')" />
                    <label for="EnquiryRadio1" class="m-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                Studio
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-house px-2"></i>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="enquiry-radio" style="display: flex;">
                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="Studio" required
                        onchange="updateFields('Livings (Private Pool)')" />
                    <label for="EnquiryRadio2" class="m-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                Studio + Private Pool
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-water-ladder px-2"></i>
                                <i class="fa-solid fa-house px-2"></i>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="enquiry-radio" style="display: flex;">
                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="1 Bedroom" required
                        onchange="updateFields('Livings')" />
                    <label for="EnquiryRadio3" class="m-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                1 Bedroom
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-bed px-2"></i>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="enquiry-radio" style="display: flex;">
                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="1 Bedroom" required
                        onchange="updateFields('Livings (Private Pool)')" />
                    <label for="EnquiryRadio4" class="m-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                1 Bedroom + Private Pool
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-water-ladder px-2"></i>
                                <i class="fa-solid fa-bed px-2"></i>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="enquiry-radio" style="display: flex;">
                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio5" value="1 Bedroom" required
                        onchange="updateFields('Livings (Duplex + Private Pool)')" />
                    <label for="EnquiryRadio5" class="m-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="px-2">
                                1 Bedroom Duplex + Private Pool
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-water-ladder px-2"></i>
                                <i class="fa-solid fa-bed px-2"></i>
                            </div>
                        </div>
                    </label>
                </div>

                <!-- PURPOSE  -->
                <label>
                    PURPOSE OF ENQUIRY
                </label>
                <div class="row">
                    <div class="col-6 purpose-radio text-center">
                        <input class="" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment" required>
                        <label for="PurposeRadio1" class="m-0">
                            Investment
                        </label>
                    </div>
                    <div class="col-6 purpose-radio text-center">
                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user" required>
                        <label for="PurposeRadio2" class="m-0">
                            End-user
                        </label>
                    </div>
                </div>
                <!-- BUTTON  -->
                <button type="submit" class="submit-click my-3">
                    SUBMIT
                </button>
            </form>
            <?php
        }
        ?>
    </div>
</div>

<!-- SUBMIT LEAD FORM -->
<script>
    function submitLeadForm() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);

        var phoneOTP = document.getElementById('phone_number');
        phoneOTP.value = full_number;

        var phoneTitle = document.getElementById('phone_no');
        phoneTitle.textContent = full_number;

        var LeadName1 = document.getElementById('lead_name');
        LeadName1.value = $("#LeadName1").val();

        var LeadEmail1 = document.getElementById('lead_email');
        LeadEmail1.value = $("#LeadEmail1").val();

        var Language = document.getElementById('lang');
        Language.value = $("#Language").val();

        var Project = document.getElementById('project_name');
        Project.value = $("#Project").val();

        var Developer = document.getElementById('developer_name');
        Developer.value = $("#Developer").val();

        var LeadType = document.getElementById('lead_type');
        LeadType.value = $("#LeadType").val();

        var LeadSource = document.getElementById('lead_source');
        LeadSource.value = $("#LeadSource").val();

        var EnquiryRadio1 = document.getElementById('enquiry_type');
        EnquiryRadio1.value = $("#EnquiryRadio1").val();

        var LeadForRadio1 = document.getElementById('lead_for');
        LeadForRadio1.value = $("#LeadForRadio1").val();

        var Country = document.getElementById('country_name');
        Country.value = $("#Country").val();

        var formData = $("#lead-form").serialize();
        formData += "&leadContact=" + encodeURIComponent(full_number);

        $.ajax({
            url: "<?php echo $controller_url; ?>",
            method: "GET",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.otp) {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    // RENDER OTP FORM
                    $("#lead-form").hide();
                    $("#otp-form").show();
                }
                else if (response.thankyou) {
                    window.location.href = response.redirectUrl;
                }
                else {
                    console.log("Error: ", response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
                console.log("Response Text:", jqXHR.responseText);
            }
        });

        return false;
    }
</script>

<!-- UPDATE PROJECT ACCORDING TO ENQUIRY -->
<script>
    function updateFields(projectName) {
        var projectNameField = document.getElementById('Project');
        projectNameField.value = projectName;
    }
</script>
