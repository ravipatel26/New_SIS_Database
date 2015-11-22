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

    public function addNewProfessor($sql)
    {
        $this->connect->query($sql);
        $professorId = mysqli_insert_id($this->connect);

        return $professorId;
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

    public function addReview($sql)
    {
        $this->connect->query($sql);

    }

    public function addDepartment($sql)
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
        $sql="SELECT courseName, courseNameCode FROM course WHERE deptId = $departmentID";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names = $result->courseName;
            $courseCode = $result->courseNameCode;
            $CourseName = $names.$courseCode;
            $coursesNames.= '<label class="checkbox">'.
                           '<input name="course[]" value="'.$CourseName.'" type="checkbox">'.$CourseName.'</label>';

        }

        return $coursesNames;

    }


    //////////////////////////////
    //GET Courses Taken Name from depid
    //////////////////////////////

    public function getCoursesNameTaken($depID)
    {

        $coursesNames1='';
        $sql="SELECT courseName FROM courses WHERE deptId = '$depID'";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach((array)$records as $result)
        {
            $names=$result->courseName;
            $coursesNames1.='<input type="text">'.$names.'</input>';

        }

        return $coursesNames1;

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
    //GET Professor Name
    //////////////////////////////

    public function getProfessorName()
    {
        $professorNames='';
        $sql="SELECT * FROM Professor ORDER BY professorName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->professorName;
            $professorNames.='<option>'.$names.'</option>';

        }

        return $professorNames;

    }

    //////////////////////////////
    //GET Research Name
    //////////////////////////////

    public function getResearchName()
    {
        $researchNames='';
        $sql="SELECT * FROM Research ORDER BY researchName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->researchName;
            $researchNames.='<option>'.$names.'</option>';

        }

        return $researchNames;

    }


    //////////////////////////////
    //GET Course Name
    //////////////////////////////

    public function getCourseName()
    {
        $courseNames='';
        $sql="SELECT * FROM Course ORDER BY courseName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $courseName = $result->courseName;
            $courseCode = $result->courseNameCode;
            $courses = $courseName.' '.$courseCode;
            $courseNames.='<option>'.$courses.'</option>';
        }

        return $courseNames;

    }


    //////////////////////////////
    //GET Editorial Board Name
    //////////////////////////////

    public function getEditorialBoardName()
    {
        $editorialBoardNames='';
        $sql="SELECT * FROM editorialBoard ORDER BY boardName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $editorialBoardName = $result->boardName;

            $editorialBoardNames.='<option>'.$editorialBoardName.'</option>';
        }

        return $editorialBoardNames;

    }
    //////////////////////////////
    //GET DEPARTEMENTS ID
    //////////////////////////////
    public function getEditorialBoardID($board)
    {
        $sql="SELECT boardId FROM editorialboard WHERE boardName='$board'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $boardID = $result->boardId;
            }
            return $boardID;
        }

    }



    //////////////////////////////
    //GET Journal Name
    //////////////////////////////

    public function getJournalName()
    {
        $journalNames='';
        $sql="SELECT * FROM editorialBoard ORDER BY boardName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $journalName = $result->journalName;

            $journalNames.='<option>'.$journalName.'</option>';
        }

        return $journalNames;

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


//////////////////////////////
//GET Grant Names
//////////////////////////////

    public function getGrantsNames()
    {
        $grantName='';
        $sql="SELECT * FROM Grants";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $grantNames=$result->grantName;
            $grantName.='<option>'.$grantNames.'</option>';
        }

        return $grantName;

    }



//////////////////////////////
//GET Committee Names
//////////////////////////////

    public function getCommitteeName()
    {
        $committeeName ='';
        $sql="SELECT * FROM Services";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }else{
            $committeeName.='<option>C1</option>';
        }
        foreach($records as $result)
        {
            $committees=$result->serviceName;
            $committeesId = $result->serviceId;
            if($committees!=1){
                $committeesId++;
                $committeeName.='<option>C'.$committeesId.'</option>';
            }

        }

        return $committeeName;

    }


}
?>