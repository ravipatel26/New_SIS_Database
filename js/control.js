function checkPhoneNumber()
{
    var phoneNumber = document.getElementById('phoneNumber').value;
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if(!phoneNumber.match(phoneno) ){
        //alert('Please enter a valid phone number. ex: (514) 123-4567.');
        document.getElementById('phoneError').value = 'Please enter a valid phone number. ex: (514) 123-4567.';
        document.getElementById('phoneNumber').focus();
        return false;
    }
    return true;
}