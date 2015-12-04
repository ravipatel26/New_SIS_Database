<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("lib/sqlQueries.php");?>

<?php
$courseInfo = new AdminSystem();

$semesterResult = $_GET['semesterResult'];
$semesterResult = base64_decode(strtr($semesterResult, '-_,', '+/='));

$table='<div id="query01" class="row" style="width: 80%">
                <div class="col-md-10 col-xs-offset-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Professor</th><th>Class taught</th><th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$semesterResult.
    '</tbody>
                    </table>
                </div>
            </div>';


$courseResult = $_GET['courseResult'];
$courseResult = base64_decode(strtr($courseResult, '-_,', '+/='));

$table2='<div id="query02" class="row" style="width: 80%">
                <div class="col-md-10 col-xs-offset-3">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Professor</th><th>Class taught</th><th>Semester</th><th>Year</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$courseResult.
    '</tbody>
                    </table>
                </div>
            </div>';

?>
