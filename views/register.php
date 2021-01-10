<div id="page">
    <a class="btn btn-primary" onclick="link('list')">Back</a>
    <hr>
    <h1>Register</h1>
    <hr>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="controller/controller.php">
        <input type="hidden" name="target" value="register">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name:</label>
                <input type="text" class='form-control' name="name" placeholder="Type the Name" required>
            </div>
            <div class="form-group col-md-6">
                <label>Email:</label>
                <input type="email" class='form-control' name="email" placeholder="Type the Email" required>
            </div>
            <div class="form-group col-md-6">
                <label>Phone Number:</label>
                <input type="text" class='form-control' name="phoneNumber" placeholder="Type the Phone Number" required>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary float-right" type="submit" name="form">Submit</button>
            </div>
        </div>
    </form>
</div>