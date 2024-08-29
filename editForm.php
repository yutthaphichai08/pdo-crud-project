<?php
$title = "หน้าแรกของเว็บไซต์";
require_once "layout/header.php";
require_once "db/connect.php";
$result = $controller->getDepartments();


if (!isset($_GET["id"])) {
    header("Location:index.php");
} else {
    $id = $_GET["id"];
    $emp = $controller->getEmployeeDetail($id);
    // echo $id;
    // print_r($emp);
}

?>

<h1 class="text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูล"; ?></h1>
<form method="POST" action="updateEmployee.php">
    <input type="hidden" name="emp_id" value="<?php echo $emp["emp_id"] ?>" />
    <div class="form-group">
        <label for="fname">ชื่อ</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $emp["fname"] ?>" required>
    </div>
    <div class="form-group">
        <label for="lname">นามสกุล</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $emp["lname"] ?>" required>
    </div>
    <div class=" form-group">
        <label for="salary">เงินเดือน</label>
        <input type="text" name="salary" class="form-control" value="<?php echo $emp["salary"] ?>" required>
    </div>
    <div class="form-group">
        <label for="department">แผนก</label>
        <select name="department_id" class="form-control">
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option
                    <?php if ($row["department_id"] == $emp["department_id"]) echo "selected" ?>
                    value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"] ?></option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" name="submit" value="บันทึก" class="btn btn-primary my-3">
</form>
</div>
</body>

</html>