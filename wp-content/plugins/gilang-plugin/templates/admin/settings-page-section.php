<div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(  ) ); ?></h1>

        <form action="options.php" method="post">
            <!-- display necessary hidden fields -->
            <?php settings_fields( 'wpplugin_settings' ); ?>
            <!-- display the settings section for the page -->
            <?php do_settings_sections( 'gilang' ); ?>
            <!-- Default submit button -->
            <?php submit_button(  ); ?>
        </form>
    </div>