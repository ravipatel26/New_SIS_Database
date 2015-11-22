
var j = jQuery.noConflict();
    j(document).ready(function () {<!-- jQuery and Bootstrap JS -->

        j("#datePicker")
            .datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on("changeDate show", function() {
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
                        notEmpty:{
                            message: "Please enter a Zip Code."
                        },
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
                            message: "Please enter a valid phone number (ex: 514-123-4567)"
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

        var validator = j("#professorInformationForm").bootstrapValidator({
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
                    url: "../lib/newProfessorSQLProcess.php",
                    data: $('#professorInformationForm').serialize(),
                    success: function(msg){
                        j("#professorInformationForm").addClass("hidden");
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
                            message : "Please provide a Professor's first name"
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
                            message : "Please provide a Professor's last name"
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The last name can consist of alphabetical characters and spaces only'
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
                phoneNumber : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a phone number."
                        },
                        phone: {
                            country: 'US',
                            message: "Please enter a valid phone number (ex: 514-123-4567)"
                        }
                    }
                },
                professorNumber : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a Professor's employee Number."
                        },
                        stringLength: {
                            min : 8,
                            max: 8,
                            message: "Professor's employee number must be 8 digits long"
                        },
                        integer: {
                            message: 'Please enter only digits.'
                        }
                    }
                },
                department : {
                    validators:{
                        notEmpty:{
                            message: "Please enter a Professor's department."
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


        j("#eventFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#eventForm").bootstrapValidator("revalidateField", "eventYear");
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
                eventYear:{
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


        j("#committeeFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#techCommitteeName").bootstrapValidator("revalidateField", "committeeYear");
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
                committeeYear:{
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


        j("#editorialBoardFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#editorialBoardInforamtion").bootstrapValidator("revalidateField", "editorialBoardYear");
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
                editorialBoardYear:{
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



        j("#courseYearFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#courseTaken").bootstrapValidator("revalidateField", "courseYear");
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
                department: {
                    message : "The department is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Department"
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
                courseYear:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the course taken."
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


        j("#studentGradesFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#studenGrades").bootstrapValidator("revalidateField", "courseYear");
        });
        var validator = j("#studenGrades").bootstrapValidator({
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
                    url: "../lib/studentGradesSQLProcess.php",
                    data: $('#studenGrades').serialize(),
                    success: function(msg){
                        j("#studenGrades").addClass("hidden");
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
                            message: "Please provide a Course's Name"
                        }
                    }
                },
                department:{
                    message : "The department is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Department"
                        }
                    }
                },
                semester:{
                    message : "Semester grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide Semester."
                        }
                    }
                },
                courseYear:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the course taken."
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


        var validator = j("#courseList").bootstrapValidator({
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
                    url: "../lib/newCourseSQLProcess.php",
                    data: $('#courseList').serialize(),
                    success: function(msg){
                        j("#courseList").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                courseName: {
                    message: "Course Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Course Name"
                        }
                    }
                },
                courseCode: {
                    message: "Course Code is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Course Code"
                        },
                        integer: {
                            message: 'The Course Code must be numbers.'
                        },
                        stringLength: {
                            min: 3,
                            max: 3,
                            message: "The Course Code must have 3 digits."
                        }
                    }
                },
                department:{
                    message : "The department is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Department"
                        }
                    }
                }

            }
        });

        j("#coursesTeachingFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#coursesTeaching").bootstrapValidator("revalidateField", "teachYear");
        });

        var validator = j("#coursesTeaching").bootstrapValidator({
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
                    url: "../lib/courseTeachingSQLProcess.php",
                    data: $('#coursesTeaching').serialize(),
                    success: function(msg){
                        j("#coursesTeaching").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                professorName: {
                    message: "Professor's Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's Name"
                        }
                    }
                },
                courses: {
                    message: "Course Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Course's Name"
                        }
                    }
                },
                semester:{
                    message : "Semester grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide Semester."
                        }
                    }
                },
                teachYear:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the course teached."
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


        j("#grantYearForm")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#grantInformationForm").bootstrapValidator("revalidateField", "grantYear");
        });

        var validator = j("#grantInformationForm").bootstrapValidator({
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
                    url: "../lib/newGrantSQLProcess.php",
                    data: $('#coursesTeaching').serialize(),
                    success: function(msg){
                        j("#coursesTeaching").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                professorName: {
                    message: "Professor's Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's Name"
                        }
                    }
                },
                grantName: {
                    message: "Grant Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Grant's Name"
                        }
                    }
                },
                grantAmount:{
                    message : "Grant Amount grade is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide Grant Amount."
                        }

                    }
                },
                grantYear:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year for the grant."
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
                },
                researchName: {
                    message: "Research Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Research's Name"
                        }
                    }
                },
                studentName: {
                    message: "Student Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Student's Name"
                        }
                    }
                }
            }
        });

        j("#grantUsageYearForm")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#grantUsage").bootstrapValidator("revalidateField", "grantUsedYear");
        });

        var validator = j("#grantUsage").bootstrapValidator({
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
                    url: "../lib/grantUsageSQLProcess.php",
                    data: $('#grantUsage').serialize(),
                    success: function(msg){
                        j("#grantUsage").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                grantName: {
                    message: "Grant Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Grant's Name"
                        }
                    }
                },
                grantAmountUsed:{
                    message : "Grant Amount used is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide grant amount used."
                        }

                    }
                },
                grantUsedYear:{
                    message : "The year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the year that the grant is used."
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


        j("#journalFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#reviewInformation").bootstrapValidator("revalidateField", "journalYear");
        });
        var validator = j("#reviewInformation").bootstrapValidator({
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
                    url: "../lib/newReviewSQLProcess.php",
                    data: $('#reviewInformation').serialize(),
                    success: function(msg){
                        j("#reviewInformation").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                editorialBoardName: {
                    message: "Editorial Board's Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Editorial Board's Name"
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
                journalYear:{
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


        var validator = j("#departmentForm").bootstrapValidator({
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
                    url: "../lib/newDepartmentSQLProcess.php",
                    data: $('#departmentForm').serialize(),
                    success: function(msg){
                        j("#departmentForm").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                deptName: {
                    message: "Department's Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Department's Name"
                        }
                    }
                },
                deptPhone:{
                    validators:{
                        notEmpty:{
                            message: "Please enter a phone number."
                        },
                        phone: {
                            country: 'US',
                            message: "Please enter a valid phone number (ex: 514-123-4567)"
                        }
                    }
                }
            }
        });


        j("#academicFormYear")
            .datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("changeDate show", function(e) {
            // Revalidate the date field
            j("#servicesInfoForm").bootstrapValidator("revalidateField", "academicYear");
        });
        var validator = j("#servicesInfoForm").bootstrapValidator({
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
                    data: $('#servicesInfoForm').serialize(),
                    success: function(msg){
                        j("#servicesInfoForm").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                committeeName: {
                    message: "Committee's Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Committee's Name"
                        }
                    }
                },
                professorName:{
                    message : "The Professor's name is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Professor's name."
                        }
                    }
                }
                ,
                academicYear:{
                    message : "The Academic year is required",
                    validators : {
                        notEmpty : {
                            message : "Please provide the Academic year for the Committee."
                        },
                        integer: {
                            message: 'The Academic year must be numbers (ex. 2015)'
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


        // Research Form validation
        j("#startDatePicker")
            .datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on("changeDate show", function() {
            // Revalidate the date field
            j("#researchForm").bootstrapValidator("revalidateField", "researchStartDate");
        });

        j("#endDatePicker")
            .datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on("changeDate show", function() {
            // Revalidate the date field
            j("#researchForm").bootstrapValidator("revalidateField", "researchEndDate");
        });

        var validator = j("#researchForm").bootstrapValidator({
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
                    url: "../lib/newResearchSQLProcess.php",
                    data: $('#coursesTeaching').serialize(),
                    success: function(msg){
                        j("#coursesTeaching").addClass("hidden");
                        j("#submission").addClass("hidden");
                        j("#confirmation").removeClass("hidden");
                    },
                    error: function(){
                        alert("error");
                    }
                });//close ajax
            },
            fields : {
                researchName: {
                    message: "Research Title is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Research Title"
                        }
                    }
                },
                studentName: {
                    message: "Student Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Student's Name"
                        }
                    }
                },
                professorName: {
                    message: "Professor Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Professor's Name"
                        }
                    }
                },
                grantName: {
                    message: "Grant Name is required",
                    validators: {
                        notEmpty: {
                            message: "Please provide a Grant Name"
                        }
                    }
                },
                researchStartDate: {
                    validators: {
                        notEmpty: {
                            message: 'The start date is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The start date is not a valid'
                        }
                    }
                },
                researchEndDate: {
                    validators: {
                        notEmpty: {
                            message: 'The end date is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The end date is not a valid'
                        }
                    }
                }
            }
        });

    });
