<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>

<?php


$existingCoursesResult = $_GET['existingCoursesResult'];
$existingCoursesResult = base64_decode(strtr($existingCoursesResult, '-_,', '+/='));

$table='<div id="query01" class="row" style="width: 75%">
                <div class="col-md-8 col-xs-offset-4">
                    <table class="table  table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Course Name</th><th>Department</th><th>Total Students</th>
                            </tr>
                        </thead>
                        <tbody>'
    .$existingCoursesResult.
    '</tbody>
                    </table>
                </div>
            </div>';


?>
