<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("lib/sqlQueries.php");?>

<?php
$committeesInfo = new AdminSystem();

$committeesResult = $_GET['committeesResult'];
$committeesResult = base64_decode(strtr($committeesResult, '-_,', '+/='));

$table='<div id="query01" class="row" style="width: 75%">
                <div class="col-md-8 col-xs-offset-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Professor Name</th><th>Committee</th><th>Semester</th><th>Year</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$committeesResult.
    '</tbody>
                    </table>
                </div>
            </div>';


?>
