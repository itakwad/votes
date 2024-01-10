<?php 
$typesRes = $conn->query("SELECT * FROM types");
$types = [];
if ($typesRes->num_rows > 0) {
    while ($row = $typesRes->fetch_assoc()) {
        $types[] = $row;
    }
}
$preferences = !empty($user['preferences']) ? unserialize($user['preferences']) : [];
?>


<div class="row">

    <?php

    if (count($errors) > 0) { ?>
        <div class="alert alert-danger">
            <?php
            foreach ($errors as $error) {
                echo $error . "<br />";
            } ?>


        </div>
    <?php
    }

    ?>


    <div class="col-md-3">
        <div class="card">
            <img src="<?php echo $imageUrl ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">الصورة الحالية</h5>
                <a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#changeImage">تغيير</a>
                <?php

                if ($imageUrl != "inc/images/user.png") {

                ?>


                    <a href="#" class="btn btn-danger float-end" onclick="if(confirm('سيتم حذف الصورة!') ) location.href='user_logic.php?delete'; return;">حذف</a>


                <?php

                }


                ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">الاسم</h5>
                <h6><?php echo $user['name'] ?></h6>
                <hr>
                <h5 class="card-title">المفضلة</h5>
                <div class="d-flex">
                    <?php
                    foreach ($types as $type) {

                    ?>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" <?php if (in_array($type['id'], $preferences))  echo 'checked' ?> disabled>
                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled"><?php echo $type['name']; ?></label>
                        </div>



                    <?php }

                    ?>


                </div>

                <hr>

                <a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#userData">تغيير</a>
            </div>
        </div>
    </div>







    <div class="modal fade" id="changeImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="user_logic.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image" required />
                        <input type="submit" name="change_image" value="تعيير الصورة" />
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>




    


<div class="modal fade" id="userData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user_logic.php" method="POST" >
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name'] ?>" required>
                    </div>
                    <br>

                    <?php
                    foreach ($types as $type) {

                    ?>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" <?php if (in_array($type['id'], $preferences))  echo 'checked' ?> name="preferences[]" value="<?php echo $type['id'] ?>">
                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled"><?php echo $type['name']; ?></label>
                        </div>



                    <?php }

                    ?>



                    <br>
                    <button type="submit" name="user_data" class="btn btn-primary">تحديث</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>