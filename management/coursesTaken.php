<?php
session_start();
ini_set('display_errors', 'on');
ini_set('log_errors', 1);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ob_start();
?>
<?php
include("../lib/config.php");
require("../lib/courseTakenProcess.php");
?>
<?php
if(!isset($_SESSION["manager"]))
{
    header("location:/comp353/adminLogin.php");
    exit();
}
?>
<?php
//$mandatsAll=$nouveauProjet->getMandats2();
//$departmentID=$nouveauProjet->getDepartmentID();
//for($i=0;$i<sizeof($mandatsAll);$i++){
//
//    if($mandatsAll[$i][0]==0){
//        $choiceMandat0[]='';
//    }else if($mandatsAll[$i][0]==1){
//        $choiceMandat1[]=$mandatsAll[$i][1];
//    }else if($mandatsAll[$i][0]==2){
//        $choiceMandat2[]=$mandatsAll[$i][1];
//    }else if($mandatsAll[$i][0]==3){
//        $choiceMandat3[]=$mandatsAll[$i][1];
//    }else if($mandatsAll[$i][0]==4){
//        $choiceMandat4[]=$mandatsAll[$i][1];
//    }else if($mandatsAll[$i][0]==5){
//        $choiceMandat5[]=$mandatsAll[$i][1];
//    }else{
//        $choiceMandat6[]=$mandatsAll[$i][1];
//    }

//}
?>
<!DOCTYPE html>
<html>
<?php require("headerManagement.php");?>

<body>
<div class="container-fluid bg-info" style="height: 900px">
    <div id="navigation">
        <div class="row">
            <?php require("navigationManagement.php"); ?>
        </div>
    </div>

    <div class="panel panel-default col-lg-6 col-lg-offset-1" style="width: 80%">
        <div class="panel-heading h2 text-center">Courses Taken</div>
        <div class="panel-body">
            <form id="courseTaken" class="form-horizontal" role="form" method="post" action="courseTakenSQL.php">
                <div class="form-group">
                    <label for="studentName" class="col-md-2 control-label">Student Name :</label>
                    <div class="col-md-4">
                        <select id="studentName" name="studentName" class="form-control" value="<?php echo htmlspecialchars($studentName); ?>" onchange="getDepartmentName(this.value)">
                            <option value="" selected="selected">--- Select a Student ---</option>
                            <?php echo $courseTaken->getStudentName();?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="department" class="col-md-2 control-label">Department ID :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="department" name="department" value="<?php echo $deptName;?>">
                    </div>
                </div>

<!--                submit and reset buttons-->
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-offset-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-danger" type="reset" onclick="location.reload(); ">reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="confirmation" class="alert alert-success hidden">
            <span class="glyphicon glyphicon-star"></span>Information successfully entered!
        </div>
    </div>



</div>

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="../js/bootstrap-datepicker.js"></script>-->

<<script src="../js/functions.js"></script>
<?php
if($_SESSION['success']){
    echo '<script> $("#eventForm").addClass("hidden");
            $("#submission").addClass("hidden");
            $("#confirmation").removeClass("hidden");</script>';
    $_SESSION['success'] = false;
}
?>

</body>



<script src="../js/control.js"></script>
<script src="../js/courseDeptTaken.js"></script>

<script>
    //var studentName = document.getElementById("studentName").val;


//    var departementsList=document.projetNouveau.departementProjet
//    var mandaList=document.projetNouveau.mandatProjet
//
//    //pass a php array with jason encode
//    var mandats=new Array()
//    mandats[0]='';
//    mandats[1]=[""];
//    mandats[2]=["Olfactométrie","Dispersion","Demande de CA","Chauffage Biomasse","Vente équipement","Location équipement","Expertise légale","Traitement odeur","Traitement Biomasse","Mandats spéciaux","RS & DE"];
//    mandats[3]=["Égout","Aqueduc","Fosse septique commerciale","Fosse septique résidentielle","Eau potable","Eaux usées"];
//    mandats[4]=["Bâtiment laitier","Bâtiment porcin","Bâtiment avicole","Bâtiment élevage autre","Bâtiment agricole autre","Bâtiment industriel","Entreposage grain"];
//    mandats[5]=["Bâtiment laitier","Bâtiment porcin","Bâtiment avicole","Bâtiment élevage autre","Bâtiment agricole autre","Bâtiment industriel","Entreposage grain","Bâtiment commercial","Bâtiment autre"];
//    mandats[6]=["Plan de fertilisation"];
//
//    function updateMandats(selectedmandatsgroup){
//        mandaList.options.length=0
//        if (selectedmandatsgroup>0){
//            for (i=0; i<mandats[selectedmandatsgroup].length; i++)
//                mandaList.options[mandaList.options.length]=new Option(mandats[selectedmandatsgroup][i].split("|")[0], mandats[selectedmandatsgroup][i].split("|")[1])
//        }
//    }
</script>

</html>
