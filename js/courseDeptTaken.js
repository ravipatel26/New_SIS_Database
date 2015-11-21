//JavaScript Document
var xhr = new XMLHttpRequest();

function getDepartmentName(studentName) {

    var url="courseDeptTaken.php?studentName=";
// Register the embedded handler function
    //var myRandom=parseInt(Math.random()*99999999);  //
    xhr.onreadystatechange = receiveDepartmentName;
    xhr.open("GET", url + studentName);
    xhr.send(null);
}

function receiveDepartmentName(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        var num = result.split(',');
        document.getElementById("department").value =num[0];
        document.getElementById("depID").value =num[1];


    }

}