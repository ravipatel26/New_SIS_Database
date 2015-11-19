//JavaScript Document
var xhr = new XMLHttpRequest();

function getCoursesTaken(department) {

    var url="courseTaken.php?department=";
    alert(url+department);
// Register the embedded handler function
    //var myRandom=parseInt(Math.random()*99999999);  //
    xhr.onreadystatechange = receiveCoursesName;
    xhr.open("GET", url + department);
    xhr.send(null);
}

function receiveCoursesName(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        alert(result);
        var num = result.split(',');
        document.getElementById("course").value =num[0];

    }

}