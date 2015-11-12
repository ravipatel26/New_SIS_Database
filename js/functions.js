if(document.getElementById('level').value!='--- Select a Level ---'){
    document.getElementById('level').value = "<?php echo htmlspecialchars($level);?>";
}
document.getElementById('country').value = "<?php echo htmlspecialchars($country);?>";

function displayPositionDiv() {
    if (document.getElementById('graduated').checked) {
        document.getElementById('displayPosition').style.display = 'block'
    } else {
        document.getElementById('displayPosition').style.display = 'none';
    }
}