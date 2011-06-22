// JavaScript Document
	
    /*******************************************************
    *			VALIDAR FORMULARIO ALTA-MODIFICACION CATEGORIA				   *
    ********************************************************/
$().ready(function(){
    $('#mensaje').hide();
    $("#uploadFormCateg").validate({
            event: "blur",
            rules: {
            'data[Categ][name]': "required"
            },
            messages: {
            'data[Categ][name]': "Por favor ingrese un nombre válido"
            },

            debug: true,
            errorElement: "label",
            errorContainer: $("#errores"),
            submitHandler: function(form){
                jQuery(form).ajaxSubmit({
                    
                    beforeSubmit: function(a,f,o) {
                        o.dataType = "html";//very very important piece of code :)
                        $('#mensaje').html('Enviando datos...')
                        .fadeIn("slow");
                    },
                    success: function(data) {
                        var $out = $('#mensaje');
                        $out.html('<div><pre>'+ data +'</pre></div>')
                        .fadeIn("slow");
                    }
                });
            }
    });
});
