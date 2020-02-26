(function () {
    
    "use strict";
    jQuery(document).ready( function( $ ){
    
        $('#opallostpasswordform').hide();
        $('#modalLoginForm form .btn-cancel').on('click', function(){  
            $('#modalLoginForm').modal( 'hide' ); 
            $('#modalLoginForm .alert').remove();
        } );

        // sign in proccess
        $('form.login-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: medicareAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxlogin"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-warning">'+data.message+'</div>' );
                    }
                });
                return false; 
         } );


        $('form#opalrgtRegisterForm').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: medicareAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxregister"
                }).done(function(data) {
                    if ( data.status == 1 ) {
                        $this.prepend( '<div class="alert alert-info">'+data.msg+'</div>' );
                        location.reload();
                    } else {
                        $this.prepend( '<div class="alert alert-warning">'+data.msg+'</div>' );
                    }
                });
                return false;
        } );


        $('form .toggle-links').on('click', function(){
            $('.form-wrapper').hide();
            $($(this).attr('href')).show(); 
            return false;
        } );

         // sign in proccess
        $('form.lostpassword-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: medicareAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxlostpass"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-warning">'+data.message+'</div>' );
                    }
                });
                return false; 
        } );

        //fix map
        if( $('.wpb_map_wraper').length > 0 ){
            $('.wpb_map_wraper').on('click', function () {
                $('.wpb_map_wraper iframe').css("pointer-events", "auto");
            });

            $( ".wpb_map_wraper" ).mouseleave(function() {
              $('.wpb_map_wraper iframe').css("pointer-events", "none"); 
            });
        }
        
        /**
         * Scroll To Top
         */
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        }); 

        jQuery('.scrollup').on('click', function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

         //Offcanvas Menu

        $('[data-toggle="offcanvas"], .btn-offcanvas').on('click', function () { 
            $('.row-offcanvas').toggleClass('active')           
        });

        //mobile click
        $('#main-menu-offcanvas .caret').on('click', function () {
            var $a = jQuery(this);
            $a.parent().find('> .dropdown-menu').slideToggle();
            if ($a.parent().hasClass('level-0')) {
                if($a.parent().hasClass('show')){
                    $a.parent().removeClass('show');
                }else{
                    $a.parents('li').siblings('li').find('ul:visible').slideUp().parent().removeClass('show');
                    $a.parent().addClass('show');
                }
            }
        });

        $('.showright').on('click', function(){
             $('.offcanvas-showright').toggleClass('active');   
        } );

        //Gallery photo
        $("a[rel^='prettyPhoto[pp_gal]']").prettyPhoto({
            animation_speed:'normal',
            theme:'light_square',
            social_tools: false,
        }); 
            
        /*---------------------------------------------- 
         *    Apply Filter        
         *----------------------------------------------*/
        jQuery('.isotope-filter li a').click(function(){
           
            var parentul = jQuery(this).parents('ul.isotope-filter').data('related-grid');
            jQuery(this).parents('ul.isotope-filter').find('li a').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-option-value');  
            jQuery('#'+parentul).isotope({ filter: selector }, function(){ });
            
            return(false);
        });

        /**
         *
         */
        $(".dropdown-toggle-overlay").on('click', function(){ 
               $($(this).data( 'target' )).addClass("active"); 
        } ); 

         $(".dropdown-toggle-button").on('click', function(){ 
               $($(this).data( 'target' )).removeClass("active"); 
               return false;
        } ); 
 
	    /** 
         * 
         * Automatic apply  OWL carousel
         */
        $(".owl-carousel-play .owl-carousel").each( function(){
            var config = {
                navigation : false, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                pagination : $(this).data( 'pagination' ),
                autoHeight: true,
             }; 
        
            var owl = $(this);
            if( $(this).data('slide') == 1 ){
                config.singleItem = true;
            }else {
                config.items = $(this).data( 'slide' );
            }
            if ($(this).data('desktop')) {
                config.itemsDesktop = $(this).data('desktop');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsDesktopSmall = $(this).data('desktopsmall');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsTablet = $(this).data('tablet');
            }
            if ($(this).data('tabletsmall')) {
                config.itemsTabletSmall = $(this).data('tabletsmall');
            }
            if ($(this).data('mobile')) {
                config.itemsMobile = $(this).data('mobile');
            }
            $(this).owlCarousel( config );
            $('.left',$(this).parent()).on('click', function(){
                  owl.trigger('owl.prev');
                  return false; 
            });
            $('.right',$(this).parent()).on('click', function(){
                owl.trigger('owl.next');
                return false; 
            });
         } ); 

        /**
         *
         */
        if( $('.page-static-left') ){
            $('.page-static-left .button-action').on('click', function(){
                $('.page-static-left').toggleClass('active');
            } );
        }

        // menu home 3
        $('.menu-button').on( 'click', function(){
            $(this).toggleClass('menu-close');
            $('.wrapper').toggleClass('active');
        });
        
    } );    
} )( jQuery );

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
