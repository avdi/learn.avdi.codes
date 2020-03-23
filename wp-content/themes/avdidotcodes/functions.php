<?php
function avdidotcodes_theme_enqueue_styles() {

    $parent_style = 'checkout-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'avdidotcodes-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'avdidotcodes_theme_enqueue_styles' );
?>

<?php
function avdidotcode_add_front_live_chat_widget() {
    ?>
    <script src="https://chat-assets.frontapp.com/v1/chat.bundle.js"></script>
    <script>
      window.FrontChat('init', {chatId: 'fbbf8fc3f48a19c15ef3db9acaee0e83', useDefaultLauncher: true});
    </script>
    <?php
}
add_action('wp_footer', 'avdidotcode_add_front_live_chat_widget');
?>