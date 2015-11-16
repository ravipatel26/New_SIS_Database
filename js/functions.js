if(document.getElementById('level').value!='--- Select a Level ---'){
    document.getElementById('level').value = "<?php echo htmlspecialchars($level);?>";
}
document.getElementById('country').value = "<?php echo htmlspecialchars($country);?>";

function displayPositionDiv() {
    if (document.getElementById('graduate').checked) {
        document.getElementById('displayPosition').style.display = 'block';
        document.getElementById('displayLevel').style.display = 'block';
    } else {
        document.getElementById('displayPosition').style.display = 'none';
        document.getElementById('displayLevel').style.display = 'none';
    }

    if (document.getElementById('underGraduate').checked) {
        document.getElementById('displaySummer').style.display = 'block';
    } else {
        document.getElementById('displaySummer').style.display = 'none';
    }
}