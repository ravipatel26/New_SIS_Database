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
				  	  <li><a href="#">Course Info</a></li>
                  	  <li><a href="#">Student Info</a></li>
                      <li><a href="#">Class List</a></li>
					  <li><a href="#">Student Support</a></li>
                      <li><a href="#">Grades Info</a></li>
                      <li><a href="#">Committees Info</a></li>
					  <li><a href="admin/adminLogin.php">Admin</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>