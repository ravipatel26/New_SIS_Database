<?php
$html = '<nav class="navbar navbar-default" role="navigation">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationBar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand dropdown" href="index.php">Home</a>
               </div>
               <div class="collapse navbar-collapse" id="navigationBar-collapse">
                  <ul class="nav navbar-nav">
				  	  <li><a href="courseInfo.php">Course Info</a></li>
                  	  <li><a href="studentInfo.php">Student Info</a></li>
                      <li><a href="classList.php">Class List</a></li>
					  <li><a href="studentSupport.php">Student Support</a></li>
                      <li><a href="gradesInfo.php">Grades Info</a></li>
                      <li><a href="committeeInfo.php">Committees Info</a></li>
					  <li><a href="adminLogin.php">Admin</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>