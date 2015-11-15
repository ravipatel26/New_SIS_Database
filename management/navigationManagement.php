<?php
$html = '<nav class="navbar navbar-default" role="navigation">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationBar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand dropdown" href="#">Home</a>
               </div>
               <div class="collapse navbar-collapse" id="navigationBar-collapse">
                  <ul class="nav navbar-nav">
				  	  <li><a href="StudentForm.php">Student Info</a></li>
                  	  <li><a href="#">Professor Info</a></li>
                      <li><a href="#">Courses Info</a></li>
					  <li><a href="#">Grants Info</a></li>
                      <li><a href="#">Services Info</a></li>
                      <li><a href="#">Reviews Info</a></li>
					  <li><a href="#">Boards Info</a></li>
					  <li><a href="../admin/logout.php">Logout</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>