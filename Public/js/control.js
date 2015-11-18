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



        var validator = j("#adminLogin").bootstrapValidator({
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
                    url: "../lib/loginSQLProcess.php",
                    data: $('#adminLogin').serialize(),
                    success: function(msg){
                        j("#adminLogin").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                username: {
                    message: "User Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a User Name"
                        },
                        stringLength: {
                            min: 6,
                            max: 8,
                            message: "User Name must between 6 and 8 characters."
                        }
                    }
                },
                email: {
                    message: "Email address is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide an email address"
                        },
                        stringLength: {
                            min: 6,
                            max: 35,
                            message: "Email address must be between 6 and 35 characters long"
                        },
                        emailAddress: {
                            message: "Email address was invalid"
                        }
                    }
                },
                password: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password"
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        }
                    }
                },
                confirm_password: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password confirmation."
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirmation are not the same'
                        }


                    }

                }
            }
        });

        var validator = j("#changePassword").bootstrapValidator({
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
                    url: "admin/changingSQLPass.php",
                    data: $('#changePassword').serialize(),
                    success: function(msg){
                        j("#changePassword").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                username: {
                    message: "User Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a User Name"
                        },
                        stringLength: {
                            min: 6,
                            max: 8,
                            message: "User Name must between 6 and 8 characters."
                        }
                    }
                },
                email: {
                    message: "Email address is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide an email address"
                        },
                        stringLength: {
                            min: 6,
                            max: 35,
                            message: "Email address must be between 6 and 35 characters long"
                        },
                        emailAddress: {
                            message: "Email address was invalid"
                        }
                    }
                },
                password: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password"
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        }
                    }
                },
                newPassword: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password"
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        }
                    }
                },
                confirm_NewPassword: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password confirmation."
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        },
                        identical: {
                            field: 'newPassword',
                            message: 'The password and its confirmation are not the same'
                        }


                    }

                }
            }
        });


        var validator = j("#newAccount").bootstrapValidator({
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
                    url: "admin/newAccountSQLProcess.php",
                    data: $('#newAccount').serialize(),
                    success: function(msg){
                        j("#newAccount").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                username: {
                    message: "User Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a User Name"
                        },
                        stringLength: {
                            min: 6,
                            max: 8,
                            message: "User Name must between 6 and 8 characters."
                        }
                    }
                },
                email: {
                    message: "Email address is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide an email address"
                        },
                        stringLength: {
                            min: 6,
                            max: 35,
                            message: "Email address must be between 6 and 35 characters long"
                        },
                        emailAddress: {
                            message: "Email address was invalid"
                        }
                    }
                },
                password: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password"
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        }
                    }
                },
                confirm_password: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Password confirmation."
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: "PassWord must be between 6 and 10 characters long"
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirmation are not the same'
                        }


                    }

                },
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
                }
            }
        });



        var validator = j("#eventForm").bootstrapValidator({
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
                    url: "../lib/newEventSQLProcess.php",
                    data: $('#eventForm').serialize(),
                    success: function(msg){
                        j("#eventForm").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                profFirstName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's first Name"
                        }
                    }
                },
                profLastName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's last Name"
                        }
                    }
                },
                eventName:{
                    message : "Event name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide an Event name"
                        }
                    }
                },
                eventType:{
                    message : "Event Type name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Event Type"
                        }
                    }
                },
                year:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the Event in question."
                        },
                        integer: {
                            message: 'The year must be numbers (ex. 2015)'
                        },
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: "The year must have 4 digits."
                        }
                    }
                }
            }
        });


        var validator = j("#techCommitteeName").bootstrapValidator({
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
                    url: "../lib/newCommitteSQLProcess.php",
                    data: $('#techCommitteeName').serialize(),
                    success: function(msg){
                        j("#techCommitteeName").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                profFirstName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's first Name"
                        }
                    }
                },
                profLastName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's last Name"
                        }
                    }
                },
                techCommitteeName:{
                    message : "Technical Committee name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide an Technical Committee name"
                        }
                    }
                },
                year:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the Event in question."
                        },
                        integer: {
                            message: 'The year must be numbers (ex. 2015)'
                        },
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: "The year must have 4 digits."
                        }
                    }
                }
            }
        });

        var validator = j("#editorialBoardInforamtion").bootstrapValidator({
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
                    url: "../lib/newCommitteSQLProcess.php",
                    data: $('#editorialBoardInforamtion').serialize(),
                    success: function(msg){
                        j("#editorialBoardInforamtion").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                profFirstName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's first Name"
                        }
                    }
                },
                profLastName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's last Name"
                        }
                    }
                },
                editorialBoardName:{
                    message : "Editorial Board name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide an Editorial Board  name"
                        }
                    }
                },
                journalName:{
                    message : "The journal name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the journal name."
                        }
                    }
                }
                ,
                year:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the journal in question."
                        },
                        integer: {
                            message: 'The year must be numbers (ex. 2015)'
                        },
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: "The year must have 4 digits."
                        }
                    }
                }
            }
        });

        var validator = j("#courseTaken").bootstrapValidator({
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
                    url: "../lib/courseTakenSQLProcess.php",
                    data: $('#courseTaken').serialize(),
                    success: function(msg){
                        j("#courseTaken").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                studentName: {
                    message: "Student Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Student's Name"
                        }
                    }
                },
                courses: {
                    message: "Course Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Course's last Name"
                        }
                    }
                },
                asignements:{
                    message : "Assginements grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide total Assginements grade"
                        }
                    }
                },
                projects:{
                    message : "Projects grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide total Projects grade."
                        }
                    }
                }
                ,
                midTerms:{
                    message : "MidTerms grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the total MidTerms grade."
                        }
                    }
                },
                finalExams:{
                    message : "Final Exam grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the total Final Exam grade."
                        }
                    }
                },
                finalLetterGrades:{
                    message : "The Final Letter grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Final Letter grade."
                        }
                    }
                }
            }
        });

    });
