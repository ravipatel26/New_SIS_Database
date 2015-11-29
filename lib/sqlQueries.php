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

    public function addNewCommittee($sql)
    {
        $this->connect->query($sql);
        $committeeId = mysqli_insert_id($this->connect);

        return $committeeId;
    }

    public function addGraduateStudent($sql)
    {
        $this->connect->query($sql);

    }

    public function addUnderGraduateStudent($sql)
    {
        $this->connect->query($sql);

    }

    public function addCoursesTaken($sql)
    {
        $this->connect->query($sql);

    }

    public function addCourses($sql)
    {
        $this->connect->query($sql);

    }

    public function addNewEvent($sql)
    {
        $this->connect->query($sql);
        $eventId = mysqli_insert_id($this->connect);
        return $eventId;

    }


    public function addCoursesTeaching($sql)
    {
        $this->connect->query($sql);

    }

    public function addNewGrades($sql)
    {
        $this->connect->query($sql);

    }

    public function addReview($sql)
    {
        $this->connect->query($sql);
        $reviewId = mysqli_insert_id($this->connect);
        return $reviewId;

    }

    public function addNewBoard($sql)
    {
        $this->connect->query($sql);
        $editorialBoardId = mysqli_insert_id($this->connect);
        return $editorialBoardId;

    }

    public function addDepartment($sql)
    {
        $this->connect->query($sql);
//        $reviewId = mysqli_insert_id($this->connect);
//        return $reviewId;

    }

    public function addNewGrant($sql)
    {
        $this->connect->query($sql);

    }

    public function addNewService($sql)
    {
        $this->connect->query($sql);

    }


        //////////////////////////////
    //GET DEPARTEMENTS ID
    //////////////////////////////
    public function getDepartementID($department)
    {
        $sql="SELECT deptId FROM department WHERE deptName='$department'";
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
    //GET Professor Teaching ID
    //////////////////////////////
    public function getProfessorIdTeaching($courseId, $semesterId, $year)
    {
        $sql="SELECT professorId FROM teaching WHERE courseId='$courseId' AND semesterId='$semesterId' AND year='$year'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $professorId = $result->professorId;
            }
            return $professorId;
        }

    }

    //////////////////////////////
    //GET DepartMent Name
    //////////////////////////////

    public function getDepartmentName()
    {
        $allDepartments='';
        $sql="SELECT * FROM department ORDER BY deptName ASC";
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
    //GET DepartMent Name
    //////////////////////////////

    public function getDepartmentIdName()
    {
        $allDepartments='';
        $sql="SELECT * FROM department ORDER BY deptName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $departmentNames=$result->deptName;
            $id = $result->deptId;
            $allDepartments.='<option value="'.$id.'">'.$departmentNames.'</option>';
        }

        return $allDepartments;

    }



    //////////////////////////////
    //GET DepartMent Name from ID
    //////////////////////////////

    public function getDepartmentNameID($id)
    {
        $departmentName = '';
        $sql = "SELECT deptName FROM department WHERE deptId=$id";
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
        $sql="SELECT deptId FROM student WHERE studentName='$name'";
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
        $sql="SELECT courseName, courseNameCode, courseId FROM course WHERE deptId = $departmentID";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $names = $result->courseName;
                $courseId = $result->courseId;
                $courseCode = $result->courseNameCode;
                $CourseName = $names.' '.$courseCode;
                $coursesNames.= '<label class="checkbox">'.
                               '<input id="course" name="course[]" value="'.$courseId.'" type="checkbox">'.$CourseName.'</label>';

            }
        }
        return $coursesNames;

    }


    public function getCourseTakenId($courseId,$studentId){

        $courseTakenId ='';

        $sql="SELECT courseTakenId FROM coursetaken WHERE studentId='$studentId' AND courseId='$courseId'";

        $results=mysqli_query($this->connect, $sql);

        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $courseTakenId = $result->courseTakenId;

            }
        }
        return $courseTakenId;


    }

    //////////////////////////////
    //GET Courses Taken Name from depid
    //////////////////////////////

    public function getCoursesNameTaken($depID)
    {

        $coursesNames1='';
        $sql="SELECT courseName FROM course WHERE deptId = '$depID'";
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
        $sql="SELECT * FROM student ORDER BY studentName ASC";
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
    //GET Student Name
    //////////////////////////////

    public function getStudentNameId()
    {
        $studentNames='';
        $sql="SELECT * FROM student ORDER BY studentName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->studentName;
            $id = $result->studentId;
            $studentNames.='<option value="'.$id.'">'.$names.'</option>';

        }

        return $studentNames;

    }


    //////////////////////////////
    //GET course ID
    //////////////////////////////
    public function getCourseID($courseName,$code)
    {
        $sql="SELECT courseId FROM course WHERE courseName = '$courseName' AND courseNameCode = '$code'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $courseId = $result->courseId;
            }
            return $courseId;
        }

    }

    //////////////////////////////
    //GET student ID
    //////////////////////////////
    public function getStudentID($studentName)
    {
        $sql="SELECT studentId FROM student WHERE studentName='$studentName'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $studentID = $result->studentId;
            }
            return $studentID;
        }

    }

    //////////////////////////////
    //GET semester ID
    //////////////////////////////
    public function getSemesterID($semester)
    {
        $sql="SELECT semesterId FROM semester WHERE semesterName='$semester'";
        $results = mysqli_query($this->connect, $sql);
        if ($results->num_rows) {
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            foreach($records as $result)
            {
                $semesterID = $result->semesterId;
            }
            return $semesterID;
        }

    }

    //////////////////////////////
    //GET Semester Name
    //////////////////////////////

    public function getSemesterName()
    {
        $semesterNames='';
        $sql="SELECT * FROM semester";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->semesterName;
            $semesterNames.='<option>'.$names.'</option>';

        }

        return $semesterNames;

    }

    public function getSemesterNameId()
    {
        $semesterNames='';
        $sql="SELECT * FROM semester";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->semesterName;
            $id = $result->semesterId;
            $semesterNames.='<option value="'.$id.'">'.$names.'</option>';

        }

        return $semesterNames;

    }

    public function getSemesterNameById($id)
    {
        $semesterName='';
        $sql="SELECT semesterName FROM semester WHERE semesterId='$id'";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $semesterName=$result->semesterName;

        }

        return $semesterName;

    }


    public function getSemesterNameTeached($sql,$courseName,$professorName){

        $semesterName='';
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
            $semesterNames='';

            foreach($records as $result)
            {
                $semesterName=$result->semesterName;
                $semesterNames.='<tr>'.
                    '<td>'.$professorName.'</td><td>'.$courseName.'</td><td>'.$semesterName.'</td>'.
                    '</tr>';
            }

        }
        return $semesterNames;
    }

    public function getLevelStudentNameTeached($sql,$professorName,$level){

        $studentName='';
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
            $studentNames='';

            foreach($records as $result)
            {
                $studentName=$result->studentName;

                $studentNames.='<tr>'.
                    '<td>'.$professorName.'</td><td>'.$studentName.'</td><td>'.$level.'</td>'.
                    '</tr>';
            }

        }
        return $studentNames;
    }


    public function getLevelByYear($sql,$professorName,$year){

        $levelNumber='';
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
            $levelNumbers='';

            foreach($records as $result)
            {
                $levelNumber=$result->NumberStudents;
                $level=$result->studentLevel;

                $levelNumbers.='<tr><td>'.$professorName.'</td><td>'.$level.'</td><td>'.$levelNumber.'</td><td>'.$year.'</td></tr>';
            }

        }
        return $levelNumbers;
    }



    public function getCourseBySemesterTeached($sql,$professorId){

        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
            $allCourses='';

            foreach($records as $result)
            {
                $semesterId = $result->semesterId;
                $semesterName = $this->getSemesterNameById($semesterId);
                $coursesId = $result->courseId;
                $courseName=$this->getCourseNameById($coursesId);
                $yearTaught=$result->year;
                $professorName=$this->getProfessorNameById($professorId);

                $allCourses.='<tr>'.'<td>'.$professorName.'</td><td>'.$courseName.'</td><td>'.$semesterName.'</td><td>'.$yearTaught.'</td>'.'</tr>';
            }

        }
        return $allCourses;
    }


    //////////////////////////////
    //GET Professor Name by id
    //////////////////////////////

    public function getProfessorNameById($professorId)
    {
        $professorName='';
        $sql="SELECT professorName FROM professor WHERE  professorId='$professorId'";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $professorName=$result->professorName;
        }

        return $professorName;

    }

    //////////////////////////////
    //GET Professor Name
    //////////////////////////////

    public function getProfessorName()
    {
        $professorNames='';
        $sql="SELECT * FROM professor ORDER BY professorName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->professorName;
            $professorNames.='<option value="'.$names.'">'.$names.'</option>';

        }

        return $professorNames;

    }
    //////////////////////////////
    //GET Professor Name and id
    //////////////////////////////

    public function getProfessorNameId()
    {
        $professorNames='';
        $sql="SELECT * FROM professor ORDER BY professorName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names = $result->professorName;
            $id = $result->professorId;
            $professorNames.='<option value="'.$id.'">'.$names.'</option>';

        }

        return $professorNames;

    }

    //////////////////////////////
    //GET Professor Name and id2
    //////////////////////////////

    public function getProfessorNameId2()
    {
        $professorNames='';
        $sql="SELECT * FROM professor ORDER BY professorName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        $professorNames.='<option value="" selected="selected">--- Select a Professor\'s Name ---</option>';
        foreach($records as $result)
        {
            $names = $result->professorName;
            $id = $result->professorId;
            $professorNames.='<option value="'.$id.'-'.$names.'">'.$names.'</option>';

        }

        return $professorNames;

    }

    //////////////////////////////
    //GET Research Name
    //////////////////////////////

    public function getResearchName()
{
    $researchNames='';
    $sql="SELECT * FROM research ORDER BY researchName ASC";
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
    //GET Research Name id
    //////////////////////////////
    public function getResearchNameId()
    {
        $researchNames='';
        $sql="SELECT * FROM research ORDER BY researchName ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $names=$result->researchName;
            $id = $result->researchId;
            $researchNames.='<option value="'.$id.'">'.$names.'</option>';

        }

        return $researchNames;

    }


    //////////////////////////////
    //GET Course Name id
    //////////////////////////////

    public function getCourseNameId()
    {
        $courseNames='';
        $sql="SELECT * FROM course ORDER BY courseName ASC";
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

            $id = $result->courseId;
            $courseNames.='<option value="'.$id.'">'.$courses.'</option>';
        }

        return $courseNames;

    }

    //////////////////////////////
    //GET Course Name id2
    //////////////////////////////

    public function getCourseNameId2()
    {
        $courseNames='';
        $sql="SELECT * FROM course ORDER BY courseName ASC";
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

            $id = $result->courseId;
            $courseNames.='<option value="'.$id.'-'.$courses.'">'.$courses.'</option>';
        }

        return $courseNames;

    }


    //////////////////////////////
    //GET Course Name
    //////////////////////////////

    public function getCourseName()
    {
        $courseNames='';
        $sql="SELECT * FROM course ORDER BY courseName ASC";
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

    public function getCourseNameById($id)
    {
        $semesterName='';
        $sql="SELECT courseName, courseNameCode FROM course WHERE courseId='$id'";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $courseName=$result->courseName;
            $courseNameCode=$result->courseNameCode;

        }

        return $courseName.' '.$courseNameCode;

    }


    //////////////////////////////
    //GET Editorial Board Name
    //////////////////////////////

    public function getEditorialBoardName()
    {
        $editorialBoardNames='';
        $sql="SELECT * FROM editorialboard ORDER BY boardName ASC";
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
        $sql="SELECT * FROM editorialboard ORDER BY boardName ASC";
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
        $sql="SELECT * FROM grants";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $grantNames=$result->grantName;
            $id = $result->grantId;
            $grantName.='<option value="'.$id.'">'.$grantNames.'</option>';
        }

        return $grantName;

    }



//////////////////////////////
//GET Committee Names
//////////////////////////////

    public function getCommitteeName()
    {
        $committeeName ='';
        $sql="SELECT DISTINCT serviceName FROM services ORDER BY  serviceName ASC ";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }

            $committeesId = 1;
            foreach($records as $result)
            {
                if($result->serviceName){
                    $committees=$result->serviceName;
                    $Id = substr($committees,1);
                    if($Id==$committeesId){
                        $committeeName.='<option>'.$committees.'</option>';
                        ++$committeesId;
                    }
                    if($Id<$committeesId){
                        $committeeName.='<option>C'.$committeesId.'</option>';

                        $committeesId++;
                    }
                }

            }

        }else{
            $committeeName.='<option>C1</option>';
        }

        //$committeeName.='<option>C'.$committeesId.'</option>';


        return $committeeName;

    }

    //////////////////////////////
    //GET Year Taught
    //////////////////////////////

    public function getYearTaught()
    {
        $allYears='';
        $sql="SELECT DISTINCT year FROM teaching ORDER BY year ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $years=$result->year;
            $allYears.='<option>'.$years.'</option>';
        }

        return $allYears;

    }

    //////////////////////////////
    //GET Year Supervised
    //////////////////////////////

    public function getYearSupervised()
    {
        $allYears='';
        $sql="SELECT DISTINCT year FROM supervises ORDER BY year ASC";
        $results= mysqli_query($this->connect, $sql);
        if($results->num_rows){
            while ($row = $results->fetch_object()) {

                $records[] = $row;

            }
        }
        foreach($records as $result)
        {
            $years=$result->year;
            $allYears.='<option>'.$years.'</option>';
        }

        return $allYears;

    }




}
?>