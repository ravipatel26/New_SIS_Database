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
                        //stringLength: {
                        //    min : 6,
                        //    max: 35,
                        //    message: "First name must between 6 and 35 characters."
                        //}
                    }
                },
                lastName:{
                    message : "Last name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide a student last name"
                        }
                        //stringLength: {
                        //    min : 6,
                        //    max: 35,
                        //    message: "Last name must between 6 and 35 characters."
                        //}
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
                        }
                    }
                },
                province : {
                    validators:{
                        notEmpty:{
                            message: "Please enter the province."
                        }
                    }
                },
                postalCode : {
                    validators:{
                        notEmpty:{
                            message: "Please enter the Postal Code."
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
                        }
                    }
                },
                postalCode : {
                    validators:{
                        notEmpty:{
                            message: "Please enter the Postal Code."
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
