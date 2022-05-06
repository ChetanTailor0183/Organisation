$("#inputform").validate({
    rules:{
        fname:{
            minlength:2,
            maxlength:15,
            lettersonly: true,
        },
        lname:{
            lettersonly: true,
        },
        dname:{
            required: true,
        }
    },
    messages: {
        dname : {
            required: "This is a required field",
        },
        fname:{
            required: "Please Enter Your First Name",
            minlength: "Name must be between 2 to 15 chars",
            maxlength: "Name must be between 2 to 15 chars",
        }
      },


    submitHandler: function(form) {
      form.submit();
    }

    
});

