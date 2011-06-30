// JavaScript Document
	
    /*******************************************************
    *			VALIDAR FORMULARIO ALTA-MODIFICACION CATEGORIA				   *
    ********************************************************/
$().ready(function(){
    $('#mensaje').hide();
    $("#uploadFormZona").validate({
            event: "blur",
            rules: {
            'data[Zona][name]': "required",
            'data[Zona][price]': "required"
            },
            messages: {
            'data[Zona][name]': "Por favor ingrese un nombre válido",
            'data[Zona][price]': "Por favor ingrese un precio válido"
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

