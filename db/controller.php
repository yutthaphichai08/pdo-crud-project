<?php
class Controller
{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
        // echo "มีกาเรียกใช้งาน Controller";
    }

    function getDepartments()
    {
        try {
            $sql = "SELECT * FROM departments";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    function getEmployees()
    {
        try {
            $sql = "SELECT * FROM employees as e
                    INNER JOIN departments as d ON e.department_id = d.department_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function insertEmployee($fname, $lname, $salary, $department_id)
    {
        try {
            $sql = "INSERT INTO employees(fname, lname, salary, department_id)
        VALUES (:fname, :lname, :salary, :department_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":salary", $salary);
            $stmt->bindParam(":department_id", $department_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
