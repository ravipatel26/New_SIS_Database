<?php
  
class PagesController {

    public function Home() 
	{
      require_once(DIR_ROOT . '/MVC/Views/Pages/Home.php');
    }

    public function Error() 
	{
      require_once(DIR_ROOT . '/MVC/Views/Pages/Error.php');
    }
}
 
?>