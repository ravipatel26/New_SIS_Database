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
				  	  <li><a href="#">page1</a></li>
                  	  <li><a href="#">page2</a></li>
                      <li><a href="#">page3</a></li>
					  <li><a href="#">page4</a></li>
                      <li><a href="#">page5</a></li>
                      <li><a href="#">page6</a></li>
					  <li><a href="#">page7</a></li>
					  <li><a href="admin/adminLogin.php">Admin</a></li>
                                        </ul>
               </div>
            </nav>';
echo $html;
?>