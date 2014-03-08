$(document).ready(function() {
    $('.form-horizontal').bootstrapValidator({
        // The default error message for all fields
        // You can specify the error message for any fields
        message: "Coś poszło nie tak",

        // The submit buttons selector
        // These buttons will be disabled when the form input are invalid
        submitButtons: $('button.btn.btn-success'),

        // Custom submit handler
        // The handler has two arguments
        // - validator is the instance of BootstrapValidator
        // - form is jQuery object representing the current form
        // By default, submitHandler is null
        submitHandler: function(validator, form) {
        	form.submit();
        },
        live: 'enabled',
        fields: {
            nazwa: {
                message: "Kiepska nazwa",
                validators: {
                    stringLength: {
                    	message:"Za krótka ta nazwa, min to 10 znaków",
                    	min:10
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            adres: {
                message: "Kiepska adres",
                validators: {
                    stringLength: {
                    	message:"Za krótki ten adres, min to 10 znaków",
                    	min:10
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            telefon: {
                message: "Kiepska numer telefonu",
                validators: {
                    regexp:{
                        regexp: /(\(\d{2}\) *\d{3}-\d{2}-\d{2})|(\d{3}-\d{3}-\d{3})/,
                        message: "Ten numer nie pasuje. Powinien wyglądać tak 000-000-000 albo (00)000-00-00"
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            mail: {
                message: "Kiepska mail",
                validators: {
                    emailAddress: {
                    	message: "Nieprawidłowy adres e-mail, jeśli jesteś pewien, że jest prawidłowy skontaktuj się z administratorem"
                    },
                    notEmpty:{
                    	message: "Puste pole"
                    }
                }
            }, 
            strona: {
            	message: "Kiepska stronkia", 
            	validators: {
            		uri: {
            			message: "Nieprawidłowy adres URL, powinien on tak wyglądać: http://www.loremipsum.com"
            		},
                    notEmpty:{
                    	message: "Puste pole"
                    }
            	}
            }
        }
    });
});