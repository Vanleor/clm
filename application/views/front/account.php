<style media="screen">
.optiony {
  color:black;
}
</style>

<!-- Main Dashboard -->
<article class="maincontent" id="page-content-wrapper">
  <div class="pagewrapper myaccount">
    <h1>My Account</h1>
    <section class="personal-info">
      <h4>Personal Information</h4>
      <ul>
        <li>
          <label>Full Name</label>
          <input type="text"
          name="full_name" placeholder="Full name" required="required"
          value="<?php echo $seller->full_name ?>">
        </li>
        <li>
          <label>Birth Date</label>
          <input type="date" required="required"
          name="birth_date"
          value="<?php echo $seller->birth_date ?>">
        </li>
        <li>
          <label>Gender</label>
          <select name="gender">
            <option class="optiony">Male</option>
            <option class="optiony">Female</option>
          </select>
        </li>
        <li>
          <label>Civil Status</label>
          <select name="civil_status">
            <option class="optiony">Single</option>
            <option class="optiony">Married</option>
            <option class="optiony">Widowed</option>
          </select>
        </li>
        <li>
          <label>Home Address</label>
          <input type="text" placeholder="Home address" required="required"
          name="home_address" value="<?php echo $seller->home_address ?>">
        </li>
        <li>
          <label>Office Address</label>
          <input type="text" placeholder="Office address" required="required"
          name="office_address" value="<?php echo $seller->office_address ?>">
        </li>
      </ul>
    </section>
    <section class="contact-info">
      <h4>Contact Information</h4>
      <ul>
        <li>
          <label>Mobile</label>
          <input type="text" name="mobile_num" value="<?php echo $seller->mobile_num ?>"
          placeholder="Mobile" required="required">
        </li>
        <li>
          <label>Office / Fax</label>
          <input type="text" name="office_fax" value="<?php echo $seller->office_fax ?>"
          placeholder="Office / Fax">
        </li>
        <li>
          <label>Home</label>
          <input type="text" name="home_num" value="<?php echo $seller->home_num ?>"
          placeholder="Mobile">
        </li>
        <li>
          <label>Email Address</label>
          <input type="email" name="email" value="<?php echo $seller->email ?>"
          placeholder="Email" required="required">
        </li>
      </ul>
    </section>
    <section class="real-estate-record">
      <h4>Real Estate Record</h4>
      <h5>Are you a broker or an agent?</h5>
      <ul class="choice">
        <li>
          <input type="radio" id="chk_broker" name="real_estate_record_type" value="Broker">
          <label>Broker</label>
        </li>
        <li>
          <input type="radio" id="chk_agent" name="real_estate_record_type" value="Agent">
          <label>Agent</label>
        </li>
      </ul>
      <!-- Show if Broker is selected -->
      <aside id="real_estate_record_dynamic">
        <ul>
        </aside>

        <ul>
          <li>
            <h6>Upload 1x1 photo <span>(.jpg &amp; .png only)</span></h6>
            <input type="file" name="image_url" id="file" class="inputfile" accept=".jpg,.png,.jpeg">
            <label for="file">BROWSE</label>
          </li>
        </ul>
      </section>

      <input type="submit" name="" value="SUBMIT">
    </div>
  </article>
  <!-- End of Main Dashboard -->

  <!-- js stuffs for init -->

<script type="text/javascript">
var gender = "<?php echo $seller->gender; ?>";
var civil_status = "<?php echo $seller->civil_status; ?>";
var real_estate_record_type = "<?php echo $seller->real_estate_record_type; ?>";
var json_payload = <?php echo $seller->real_estate_record_payload; ?>;
</script>

<script src="<?php echo base_url('public/front/') ?>js/custom/account_management.js"></script>