// JavaScript Document
	
    /*******************************************************
    *			VALIDAR FORMULARIO LOGIN-USUARIO				   *
    ********************************************************/
$().ready(function(){	   
    $("#mensaje").hide();
    $("#loginForm").validate({
            event: "blur",
            rules: {
            'data[User][name]': "required",
            'data[User][pass]':"required"
            },
            messages: {
            'data[User][name]': "Por favor ingrese un nombre válido",
            'data[User][pass]': "Por favor ingrese un password válido"            
            },

            debug: true,
            errorElement: "label",
            errorContainer: $("#errores"),
            submitHandler: function(form){
                form.submit();
//                jQuery(form).ajaxSubmit({
//                    beforeSubmit: function(a,f,o) {
//                        o.dataType = "html";//very very important piece of code :)
//                        $('#mensaje').html('Enviando datos...');
//                    },
//                    success: function(data) {
//                        var $out = $('#mensaje');
//                        $out.append('<div><pre>'+ data +'</pre></div>');
//                    }
//                });
            }
    });
});
