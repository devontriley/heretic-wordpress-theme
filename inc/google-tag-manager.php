<?php

// Google Tag Manager
if ( !function_exists( 'load_google_tag_manager' ) ) {
    function load_google_tag_manager() {
        $gtmID = get_field('google_tag_manager_id', 'option' );
        if ( $gtmID !== null && $gtmID !== '' ) : ?>
            <script>
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push(
                    {
                        'gtm.start':
                        new Date().getTime(),event:'gtm.js'
                    });
                    var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                    j.async=true;
                    j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
                    f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','<?php echo $gtmID; ?>');
            </script>
        <?php endif; }
}
if ( wp_get_environment_type() === 'production' ) {
    add_action( 'wp_head', 'load_google_tag_manager', -100 );
}

if ( !function_exists( 'load_google_tag_manager_noscript') ) :
    function load_google_tag_manager_noscript() {
        $gtmID = get_field( 'google_tag_manager_id', 'option' );
        if ( $gtmID !== null && $gtmID !== '' ) : ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtmID ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php endif;
    }
endif;
if ( wp_get_environment_type() === 'production' ) :
    add_action( 'wp_body_open', 'load_google_tag_manager_noscript' );
endif;