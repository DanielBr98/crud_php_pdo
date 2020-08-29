<?php
$array = $dataBase->user($id);
?>
<div id="page">
    <a class="btn btn-primary" href="?page=list">Back</a>
    <hr>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="restrict/controller.php">
        <input type="hidden" name="target" value="edit">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name:</label>
                <input type="text" class='form-control' name="name" value="<?= $array['name'] ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Email:</label>
                <input type="email" class='form-control' name="email" value="<?= $array['email'] ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Phone Number:</label>
                <input type="text" class='form-control' name="phoneNumber" value="<?= $array['phoneNumber'] ?>" required>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary float-right" type="submit" name="form">Submit</button>
            </div>
        </div>
    </form>
</div>