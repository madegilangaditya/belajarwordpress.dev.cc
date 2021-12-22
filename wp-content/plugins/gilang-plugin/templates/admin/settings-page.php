<div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(  ) ); ?></h1>

        <h2><?php esc_html_e( 'All Options', 'gilang' ); ?></h2>
        <?php $options = get_option( 'gilang_plugin_option' ); ?>
        <?php echo $options; ?>
        <!-- <ul>
            <?php foreach($options as $option): ?>
                <li><?php echo $option; ?></li>
            <?php endforeach; ?>
        </ul>

        <?php if(array_key_exists('name', $options)): ?>
            <h2><?php esc_html_e( 'Specific Option', 'gilang' ); ?></h2>
            <p><?php esc_html_e( $options['name'] ); ?></p>
        <?php endif; ?> -->
    </div>