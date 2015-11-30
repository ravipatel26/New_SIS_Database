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
                           Student Information Entry<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="studentForm.php">Student Information</a></li>
                           <li class="divider"></li>
                           <li><a href="coursesTakenForm.php">Courses Taken</a></li>
                           <li class="divider"></li>
                           <li><a href="studentGrades.php">Student Grades</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                  	  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Professor Information Entry<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="professorInformationForm.php">Professor Information</a></li>
                           <li class="divider"></li>
                           <li><a href="coursesTeaching.php">Courses Teaching</a></li>
                           <li class="divider"></li>
                           <li><a href="researchForm.php">Research</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                      <li><a href="courseInformationForm.php">Courses Info Entry</a></li>
					  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Grant Information Entry<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="newGrant.php">New Grants</a></li>
                           <li class="divider"></li>
                           <li><a href="grantUsedForm.php">Grant Usage Information</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           Services Information Entry<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="committeeInformationForm.php">Committee Information</a></li>
                           <li class="divider"></li>
                           <li><a href="eventForm.php">Events Information</a></li>
                           <li class="divider"></li>
						   <li><a href="techCommitteeForm.php">Technical Committee Information</a></li>
                           <li class="divider"></li>
                           <li><a href="editorialBoardForm.php">Editorial Boards Information</a></li>
                           <li class="divider"></li>
                         </ul>
                      </li>
                      <li><a href="reviewsInformationForm.php">Reviews Information Entry</a></li>
					  <li><a href="departmentForm.php">Departments Information Entry</a></li>
					  <li><a href="newAccount.php">New User Account</a></li>
					  <li></li>
					  <li></li>
					  <li><a href="../admin/logout.php">Logout</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>