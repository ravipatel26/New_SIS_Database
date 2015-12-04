<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<?php require("lib/sqlQueries.php");?>

<?php
$supportInfo = new AdminSystem();

$supportResult = $_GET['supportResult'];
$supportResult = base64_decode(strtr($supportResult, '-_,', '+/='));

$table='<div id="query01" class="row" style="width: 75%">
                <div class="col-md-8 col-xs-offset-4">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Student Name</th><th>Total Support</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$supportResult.
    '</tbody>
                    </table>
                </div>
            </div>';


?>
