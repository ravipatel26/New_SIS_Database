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
};


var j = jQuery.noConflict();
    j(document).ready(function () {<!-- jQuery and Bootstrap JS -->

        j("#datePicker")
            .datepicker({
                format: 'mm/dd/yyyy'
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#studentInforamtion").bootstrapValidator("revalidateField", "birthDate");
        });

        var validator = j("#studentInforamtion").bootstrapValidator({
            feedbackIcons: {
                valid: "glyphicon glyphicon-ok",
                invalid: "glyphicon glyphicon-remove",
                validating: "glyphicon glyphicon-refresh"
            },
            live: 'enabled',
            submitButtons: 'button[type="submit"]',
            submitHandler: function(validator, form, submitButton) {

                j.ajax({
                    type: "POST",
                    url: "../lib/newStudentSQLProcess.php",
                    data: $('#studentInforamtion').serialize(),
                    success: function(msg){
                        j("#studentInforamtion").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                firstName:{
                    message : "First name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide a student first name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The first name can consist of alphabetical characters and spaces only'
                        }
                    }
                },
                lastName:{
                    message : "Last name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide a student last name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The last name can consist of alphabetical characters and spaces only'
                        }
                    }
                },
                birthDate: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The date is not a valid'
                        }
                    }
                },
                email :{
                    message : "Email address is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide an email address"
                        },
                        stringLength: {
                            min : 6,
                            max: 35,
                            message: "Email address must be between 6 and 35 characters long"
                        },
                        emailAddress: {
                            message: "Email address was invalid"
                        }
                    }
                },
                gender : {
                    validators: {
                        notEmpty : {
                            message : "Please select a gender."
                        }
                    }
                },
                address : {
                    validators: {
                        notEmpty : {
                            message: "Please enter an address."
                        }
                    }
                },
                city : {
                    validators:{
                        notEmpty:{
                            message: "Please enter the city."
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The City can consist of alphabetical characters and spaces only'
                        }
                    }
                },
                province : {
                    validators:{
                        notEmpty:{
                            message: "Please enter the province."
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The Province can consist of alphabetical characters and spaces only'
                        }
                    }
                },
                postalCode : {
                    validators: {
                        zipCode: {
                            country: 'CA',
                            message: 'The value is not a valid Canadian Postal Code'
                        }
                    }
                },
                country : {
                    validators:{
                        notEmpty:{
                            message: "Please chose a country."
                        }
                    }
                },
                phoneNumber : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a phone number."
                        },
                        phone: {
                            country: 'US',
                            message: "Please enter a valid phone number"
                        }
                    }
                },
                studentNumber : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a studentNumber."
                        },
                        stringLength: {
                            min : 8,
                            max: 8,
                            message: "Student number must be 8 digits long"
                        },
                        integer: {
                            message: 'Please enter only digits.'
                        }
                    }
                },
                type : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a student type."
                        }
                    }
                },
                status : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a student status."
                        }
                    }
                },
                position : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a student position."
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The student position can consist of alphabetical characters and spaces only'
                        }
                    }
                },
                level : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a student level."
                        }
                    }
                },
                summer : {
                    validators:{
                        notEmpty:{
                            message: "Please choose a value."
                        }
                    }
                },
                department : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a student department."
                        }
                    }
                }

            }
        });






    });
