<div class="container mt-5">
    <form action="<?php echo base_url()?>index.php/Personcenter/removeStaff" method="post">
    <div class="container justify-content-center">
    <div class="row mt-2">
        <label class="font-weight-bold" for="staffRemID">Staff ID: </label>
    </div>
    <div class="row">
    <input type="text" class="form-control col-md-5" id="staffRemID" name="staffID">
    </div>
    <div class="row mt-2">
        <label class="font-weight-bold" for="adminPasswordID">Administrator's Password: </label>
    </div>
    <div class="row">
    <input type="password" class="form-control col-md-5" id="adminPasswordID" name="adminPassword">
    </div>
    <div class="row mt-4">
    <input type="submit" class="btn btn-outline-danger" value="Remove Staff"/>
    </div>
    </div>
    </form>
</div>