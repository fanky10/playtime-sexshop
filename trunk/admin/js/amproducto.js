// JavaScript Document
	
    /*******************************************************
    *			VALIDAR FORMULARIO ALTA-MODIFICACION PRODUCTO				   *
    ********************************************************/
$().ready(function(){
    $("#uploadForm").validate({
            event: "blur",
            rules: {
            'data[Product][name]': "required",
            'data[Product][category]':"required",
            'data[Product][codigo]':"required",
//            'file':"required",
            'data[Product][price]': "required",
            'data[Product][descrip]': "required"
            },
            messages: {
            'data[Product][name]': "Por favor ingrese un nombre válido",
            'data[Product][category]':"Por favor ingrese una categoria válida",
            'data[Product][codigo]':"Por favor ingrese un codigo válido",
            'file':"Por favor ingrese una imagen valida",
            'data[Product][price]': "Por favor ingrese un precio válido",
            'data[Product][descrip]': "Por favor ingrese una descripcion válida"
            },

            debug: true,
            errorElement: "label",
            errorContainer: $("#errores"),
            submitHandler: function(form){
                jQuery(form).ajaxSubmit({
                    beforeSubmit: function(a,f,o) {
                        o.dataType = "html";//very very important piece of code :)
                        $('#mensaje').html('Enviando datos...');
                    },
                    success: function(data) {
                        var $out = $('#mensaje');
                        $out.append('<div><pre>'+ data +'</pre></div>');
                    }
                });
            }
    });
});
