<?php
$title = "หน้าแรกของเว็บไซต์";
require_once "layout/header.php";
require_once "db/connect.php";
$result = $controller->getEmployees();
?>


<h1 class="text-center"><?php echo "ข้อมูลของพนักงาน"; ?></h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ชื่อพนักงาน</th>
            <th scope="col">นามสกุล</th>
            <th scope="col">เงินเดือน</th>
            <th scope="col">แผนก</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th scope="row"><?php echo $row["fname"] ?></th>
                <td><?php echo $row["lname"] ?></td>
                <td><?php echo $row["salary"] ?></td>
                <td><?php echo $row["department_name"] ?></td>
            </tr>
        <?php   } ?>

    </tbody>
</table>
</div>
</body>

</html>