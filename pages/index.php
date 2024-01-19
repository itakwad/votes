<?php
$typesRes = $conn->query("SELECT * FROM types");
$types = [];
if ($typesRes->num_rows > 0) {
    while ($row = $typesRes->fetch_assoc()) {
        $types[$row['id']] = $row;
    }
}


$vote_per_page = 4; // عدد العناصر في الصفحة الواحدة

$vote_page = isset($_GET['vote_page']) ? $_GET['vote_page'] : 1; // الصفحة الحالية

$start_from = ($vote_page - 1) * $vote_per_page;



$votes = $conn->query("SELECT * FROM votes LIMIT $start_from, $vote_per_page");
$preferences = !empty($user['preferences']) ? unserialize($user['preferences']) : [];


?>

<div class="alert alert-info my-2" role="alert">
    <h2 class="p-2">شارك برأيك </h2>
</div>

<nav aria-label="Page navigation example">
    <?php
    $sql = "SELECT COUNT(*) AS total FROM votes";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $vote_per_page);


    ?>
    <ul class="pagination justify-content-center my-2">
        <?php for ($i = 1; $i <= $total_pages; $i++) {
        ?>
            <li class="page-item"><a class="page-link <?php if($vote_page==$i) echo 'active'; ?>" href="<?php echo 'home.php?page=index&&vote_page='.$i; ?>"> <?php echo $i ?></a></li>
        <?php } ?>
    </ul>

</nav>

<div class="row">

    <?php
    $count = 1;

    while ($vote = $votes->fetch_assoc()) {


        $type_id = $vote['type_id'];
        if (in_array($type_id, $preferences)) {
            $vote_id = $vote['id'];
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * from user_votes WHERE user_id='$user_id' AND vote_id='$vote_id'";
            $res = $conn->query($sql);
            if ($res->num_rows > 0) {

                //يتم عرض نتائج الاستبيان
                $sql = "SELECT vote_choice, COUNT(*) as count FROM user_votes 
                WHERE vote_id = '$vote_id' GROUP BY vote_choice";
                $r = $conn->query($sql);
                $yes_count = 0;
                $no_count = 0;
                while ($row = $r->fetch_array()) {
                    if ($row['vote_choice'] == 0) {
                        $no_count = $row['count'];
                    }
                    if ($row['vote_choice'] == 1) {
                        $yes_count = $row['count'];
                    }
                }
                $total = $yes_count + $no_count;

    ?>
                <div class="col-6 px-3 py-1 my-2 ">
                    <span class="badge text-bg-warning mb-2"><?php echo $types[$type_id]['name']; ?></span>
                    <p class="lead mb-4 vote-block"><?php echo $vote['vote_text']; ?></p>

                    <div class="">
                        <div class="progress my-1" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 25px;">
                            <span class="me-2 fs-6 text" style="width: 35px;">نعم</span>
                            <div class="progress-bar bg-success" style="width: <?php echo number_format($yes_count * 100 / $total, 2) ?>%"><?php echo number_format($yes_count * 100 / $total, 2) ?></div>
                        </div>

                        <div class="progress my-1" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 25px;">
                            <span class="me-2 fs-6 text" style="width: 35px;">لا</span>
                            <div class="progress-bar bg-danger" style="width: <?php echo number_format($no_count * 100 / $total, 2) ?>%"><?php echo number_format($no_count * 100 / $total, 2) ?></div>
                        </div>
                    </div>

                </div>
            <?php

            } else {
                // يتم عرض الاستبيان
                $no_url = "vote_logic.php?action=0&&vote_id=" . $vote['id']."&&vote_page=".$vote_page;
                $yes_url = "vote_logic.php?action=1&&vote_id=" . $vote['id']."&&vote_page=".$vote_page;
            ?>
                <div class="col-6 px-3 py-1 my-2 ">
                    <span class="badge text-bg-warning mb-2"><?php echo $types[$type_id]['name']; ?></span>
                    <p class="lead mb-4 vote-block"><?php echo $vote['vote_text']; ?></p>

                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-success btn-lg px-4 gap-3" onclick="if(confirm('لقد اخترت نعم ')) location.href='<?php echo $yes_url ?>' ; return ;  ">نعم</a>
                        <a class="btn btn-danger btn-lg px-4" onclick="if(confirm('لقد اخترت لا ')) location.href='<?php echo $no_url ?>' ; return ;  ">لا</a>
                    </div>

                </div>
    <?php

            }
            if ($count % 2 == 0) {
                echo "<hr class='custom-horizontal-line'/>";
            }
            $count++;
        }
    }


    ?>
</div>