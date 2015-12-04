<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("lib/sqlQueries.php");?>

<?php
$levelInfo = new AdminSystem();

$levelYearResult = $_GET['levelYearResult'];
$levelYearResult = base64_decode(strtr($levelYearResult, '-_,', '+/='));

$table='<div id="query04" class="row" style="width: 80%">
                <div class="col-md-10 col-xs-offset-3">
                    <table class="table  table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Professor</th><th>Student Name</th><th>Level</th><th>Year</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$levelYearResult.
    '</tbody>
                    </table>
                </div>
            </div>';


//$courseResult = $_GET['courseResult'];
//$courseResult = base64_decode(strtr($courseResult, '-_,', '+/='));

//$table2='<div id="query02" class="row" style="width: 80%">
//                <div class="col-md-10 col-xs-offset-3">
//                    <table class="table">
//                        <thead>
//                            <tr>
//                                <th>Professor</th><th>Class taught</th><th>Semester</th><th>Year</th>
//                            </tr>
//                        </thead>
//                        <tbody>'
//    .$courseResult.
//    '</tbody>
//                    </table>
//                </div>
//            </div>';

?>
