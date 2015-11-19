<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php
class AdminSystem
{
    public $connect = "";
    public $dbHost = "";
    public $dbName = "";
    public $dbUserName = "";
    public $dbPass = "";

    public function __construct()
    {
//        $dbHost = "ykc353_2.encs.concordia.ca";
//        $dbName = "ykc353_2";
//        $dbUsername = "ykc353_2";
//        $dbPass = "hello007";

        $dbHost = "localhost";
        $dbName = "ykc353_2";
        $dbUsername = "root";
        $dbPass = "";

        $this->connect=mysqli_connect($dbHost,$dbUsername,$dbPass,$dbName);
        mysqli_select_db($this->connect,$dbName) or die ("Can not use the database");

        /* change character set to utf8 */
        if (!$this->connect->set_charset("utf8")) {
            //printf("Error loading character set utf8: %s\n", $this->connect->error);
        } else {
            //printf("Current character set: %s\n", $this->connect->character_set_name());
        }
    }

    //////////////////////////
    //PREVENT MYSQL INJECTION
    //////////////////////////
    public function escape($string)
    {
        return $this->connect->real_escape_string($string );

    }


    public function addNewStudent($sql)
    {
        $this->connect->query($sql);
        $studentId = mysqli_insert_id($this->connect);

        return $studentId;

    }


    public function addGraduateStudent($sql)
    {
        $this->connect->query($sql);

    }

    public function addUnderGraduateStudent($sql)
    {
        $this->connect->query($sql);

    }

    public function addCourses($sql)
    {
        $this->connect->query($sql);

    }


    //////////////////////////////
    //GET DEPARTEMENTS ID
    //////////////////////////////
    public function getDepartementID($department)
    {
        $sql="SELECT deptId FROM Department WHERE deptName='$department'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $departementID = $result->deptId;
            }
            return $departementID;
        }

    }


    //////////////////////////////
    //GET DepartMent Name
    //////////////////////////////

    public function getDepartmentName()
    {
        $allDepartments='';
        $sql="SELECT * FROM Department ORDER BY deptName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $departmentNames=$result->deptName;
            $allDepartments.='<option>'.$departmentNames.'</option>';
        }

        return $allDepartments;

    }



    //////////////////////////////
    //GET DepartMent Name from ID
    //////////////////////////////

    public function getDepartmentNameID($id)
    {
        $departmentName = '';
        $sql = "SELECT deptName FROM Department WHERE deptId=$id";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach ($records as $result) {
                $departmentName = $result->deptName;
            }

        }

        return $departmentName;
    }

    //////////////////////////////
    //GET STUDENT DEPARTEMENTS
    //////////////////////////////
    public function getStudentDepartmentName($name)
    {
        $sql="SELECT deptId FROM Students WHERE studentName='$name'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $departmnentID = $result->deptId;
            }
        }


        return $this->getDepartmentNameID($departmnentID);

    }



    //////////////////////////////
    //GET Courses Taken Name
    //////////////////////////////

    public function getCoursesTaken($departmentName)
    {
        $departmentID = $this->getDepartementID($departmentName);
        $coursesNames='';
        $sql="SELECT courseName FROM courses WHERE deptId = '$departmentID'";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->courseName;
            $coursesNames.='<option>'.$names.'</option>';

        }

        return $coursesNames;

    }

    //////////////////////////////
    //GET Student Name
    //////////////////////////////

    public function getStudentName()
    {
        $studentNames='';
        $sql="SELECT * FROM Students ORDER BY studentName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->studentName;
            $studentNames.='<option>'.$names.'</option>';

        }

        return $studentNames;

    }


    //////////////////////////////
    //GET Course Name
    //////////////////////////////

    public function getCourseName()
    {
        $courseNames='';
        $sql="SELECT * FROM Courses ORDER BY courseName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $courses=$result->courseName;
            $courseNames.='<option>'.$courses.'</option>';
        }

        return $courseNames;

    }


    //////////////////////////////
    //GET COUNTRIES
    //////////////////////////////

    public function getCountries()
    {
        $allCountry='';
        $sql="SELECT * FROM countries";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $countryNames=$result->countries_name;
            $allCountry.='<option>'.$countryNames.'</option>';
        }

        return $allCountry;

    }

}
?>