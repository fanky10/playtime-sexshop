/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//modificacion del fancybox para que ande con las imagenes con url customizado
//simplemente se toma el grupo de productos y se customiza todo
//la unica linea importante es la que dice: 'type': 'image'
//lo demas se puede customizar como mas le plazca a los diseñadores
$(document).ready(function() {

    $("a.grupo_productos").fancybox({
            'transitionIn'	:	'elastic',
            'transitionOut'	:	'elastic',
            'speedIn'		:	600,
            'speedOut'		:	200,
            'overlayShow'	:	false,
            'type' : 'image'
    });
});


