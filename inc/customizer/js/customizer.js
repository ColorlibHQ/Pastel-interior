(function( $ , api){

    // Customizer about page redirect
    api.section( 'pastelinterior_fof_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( api.settings.url.home+'/maybe404page' );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            
        } )

    } );

    // Customizer about page redirect
    api.section( 'pastelinterior_about_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( api.settings.url.home+customizerdata.about_page );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            


        } )

    } );

    // Customizer blog page redirect
    api.section( 'pastelinterior_blog_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( customizerdata.blog_page );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            


        } )

    } );

    // Customizer contact page redirect
    api.section( 'pastelinterior_contact_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            // Customizer contact form seclector 
            var customshortcodefield = $('#customize-control-pastelinterior_contact_custom_formshortcode'),
                selector = $('#_customize-input-pastelinterior_contact_formshortcode');

                if( selector.val() != 'cs' ){
                    customshortcodefield.hide();
                }


            // redirect url
            if( isExpanded ){

                api.previewer.previewUrl.set( api.settings.url.home+customizerdata.contact_page );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            

            // Contact form select change event
            selector.on( 'change', function(){

                if( $(this).val() !== 'cs' ){
                    
                    customshortcodefield.hide();
                }else{
                    customshortcodefield.show();
                     
                }
                
            } );


        } );


    } );

    // General section
    api.section( 'pastelinterior_general_section' , function( section ){

        section.expanded.bind( function( isExpanded ){


            // Preloader option show/hide

            var $preloader      = $('#pastelinterior_preloader_toggle'),
                $preloaderbg    = $( '#customize-control-pastelinterior_preloader_bg_color' ),
                $preloadercolor = $( '#customize-control-pastelinterior_preloader_color' );


            // Default

            if( $preloader.is( ':checked' ) ){
                $preloaderbg.show('slow');
                $preloadercolor.show('slow');
            }else{
                $preloaderbg.hide('slow');
                $preloadercolor.hide('slow');
            }


            // on click
            $preloader.on( 'click',  function(){

                var $this =  $( this );

                if( $this.is(':checked') ){
                    $preloaderbg.show('slow');
                    $preloadercolor.show('slow');
                }else{
                    $preloaderbg.hide('slow');
                    $preloadercolor.hide('slow');
                }


            } ); 

            // Back to top option show/hide

            var $backtotop          = $( '#pastelinterior_backtotop_btn' ),
                $backtotopbg        = $( '#customize-control-pastelinterior_backtotop_btn_bg_color' ),
                $backtotophoverbg   = $( '#customize-control-pastelinterior_backtotop_btn_hover_bg_color' );

            // Default 
            if( $backtotop.is(':checked') ){
                $backtotopbg.show('slow');
                $backtotophoverbg.show('slow');
            }else{
                $backtotopbg.hide('slow');
                $backtotophoverbg.hide('slow');
            }
            // On click event
            $backtotop.on( 'click',  function(){

                var $this =  $( this );

                if( $this.is(':checked') ){
                    $backtotopbg.show('slow');
                    $backtotophoverbg.show('slow');
                }else{
                    $backtotopbg.hide('slow');
                    $backtotophoverbg.hide('slow');
                }


            } );     



        } );


    } );

    // Footer section
    api.section( 'pastelinterior_footer_section' , function( section ){

        section.expanded.bind( function( isExpanded ){


            // Preloader option show/hide

            var $widget_toggle      = $('#pastelinterior_footer_widget_toggle');


            // Default

            if( $widget_toggle.is( ':checked' ) ){
                $widget_toggle.show('slow');
            }else{
                $widget_toggle.hide('slow');
            }

            // on click
            $widget_toggle.on( 'click',  function(){

                var $this =  $( this );

                if( $this.is(':checked') ){
                    $widget_toggle.show('slow');
                }else{
                    $widget_toggle.hide('slow');
                }


            } ); 


        } );


    } );

    

})( jQuery, wp.customize );