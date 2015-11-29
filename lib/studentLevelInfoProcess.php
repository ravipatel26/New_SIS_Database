<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("lib/sqlQueries.php");?>

<?php
$levelInfo = new AdminSystem();

$levelResult = $_GET['levelResult'];
$levelResult = base64_decode(strtr($levelResult, '-_,', '+/='));

$table='<div id="query03" class="row" style="width: 80%">
                <div class="col-md-10 col-xs-offset-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Professor</th><th>Student Name</th><th>Level</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$levelResult.
    '</tbody>
                    </table>
                </div>
            </div>';


$levelYearResult = $_GET['levelYearResult'];
$levelYearResult = base64_decode(strtr($levelYearResult, '-_,', '+/='));

$table2='<div id="query04" class="row" style="width: 80%">
                <div class="col-md-10 col-xs-offset-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Professor</th><th>Level</th><th>Number of Students</th><th>Year</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$levelYearResult.
    '</tbody>
                    </table>
                </div>
            </div>';
?>
