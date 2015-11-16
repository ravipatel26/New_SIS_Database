<?php
$html = '<nav class="navbar navbar-default" role="navigation">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationBar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand dropdown" href="adminHome.php">Home</a>
               </div>
               <div class="collapse navbar-collapse" id="navigationBar-collapse">
                  <ul class="nav navbar-nav">
				  	  <li><a href="StudentForm.php">Student Info</a></li>
                  	  <li><a href="professorInformationForm.php">Professor Info</a></li>
                      <li><a href="courseInformationForm.php">Courses Info</a></li>
					  <li><a href="grantsInformationForm.php">Grants Info</a></li>
                      <li><a href="servicesInformationForm.php">Services Info</a></li>
                      <li><a href="reviewsInformationForm.php">Reviews Info</a></li>
					  <li><a href="boardsInformationForm.php">Boards Info</a></li>
					  <li><a href="../admin/logout.php">Logout</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>