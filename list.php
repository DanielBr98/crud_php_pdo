<div class="col-md-12">
    <a class="btn btn-primary float-right" href="?page=register">New Register</a>
    <br><br>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th colspan="2">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $select = $dataBase->list();
            while ($array = $select->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th><?= $count ?></th>
                    <td><?= $array['name'] ?></td>
                    <td><?= $array['email'] ?></td>
                    <td><?= $array['phoneNumber'] ?></td>
                    <td><a href="?page=edit&id=<?= $array['id'] ?>"><i id="editIcon" class="fas fa-edit"></i></a></td>
                    <td><a onclick="return deleteUser()" href="restrict/controller.php?id=<?= $array['id'] ?>&target=deleteUser&form=true"><i id="deleteIcon" class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php
                $count++;
            }
            ?>
        </tbody>
    </table>
</div>