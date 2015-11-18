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
				  	  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Student Info<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="studentForm.php">Student Information</a></li>
                           <li class="divider"></li>
                           <li><a href="coursesTaken.php">Courses Taken</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                  	  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Professor Info<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="professorInformationForm.php">Professor Information</a></li>
                           <li class="divider"></li>
                           <li><a href="coursesTeaching.php">Courses Teaching</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                      <li><a href="courseInformationForm.php">Courses Info</a></li>
					  <li><a href="grantsInformationForm.php">Grants Info</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Services<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="servicesInformationForm.php">Services Information</a></li>
                           <li class="divider"></li>
                           <li><a href="eventForm.php">Events Information</a></li>
                           <li class="divider"></li>
						   <li><a href="techCommitteeForm.php">Technical Committee Information</a></li>
                           <li class="divider"></li>
                           <li><a href="editorialBoardForm.php">Technical Boards Information</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                      <li><a href="reviewsInformationForm.php">Reviews Info</a></li>
					  <li><a href="boardsInformationForm.php">Boards Info</a></li>
					  <li><a href="../admin/logout.php">Logout</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>