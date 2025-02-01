<?php
/**
 * Widget API: AhnCommerce_Widget_Newsletter class
 *
 * @package AhnCommerce
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * Core class used to implement a Newsletter widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class AhnCommerce_Widget_Newsletter extends WP_Widget {

    /**
     * Sets up a new Newsletter widget instance.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => 'ahncommerce_widget_newsletter',
            'description'                 => __( 'A newsletter for your site.', 'ahncommerce' ),
            'customize_selective_refresh' => true,
            'show_instance_in_rest'       => true,
        );
        parent::__construct(
            'ahncommerce-newsletter',
            _x( 'AhnCommerce Newsletter', 'Widget title', 'ahncommerce' ),
            $widget_ops
        );
    }

    /**
     * Outputs the content for the current Newsletter widget instance.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title', 'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Newsletter widget instance.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Display widget title if set.
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . $args['after_title'];
        }

        $description = ! empty( $instance['description'] ) ? esc_html( $instance['description'] ) : '';
        ?>

        <p><?php echo $description; ?></p>
        <form action="#" method="POST" aria-label="<?php esc_attr_e( 'Newsletter Subscription', 'ahncommerce' ); ?>">
            <input
                type="email"
                id="email"
                name="email"
                placeholder="<?php esc_attr_e( 'Enter your email', 'ahncommerce' ); ?>"
                required
            >
            <button type="submit" class="site-btn">
                <?php esc_html_e( 'Subscribe', 'ahncommerce' ); ?>
            </button>
        </form>

        <?php if ( ! empty( $instance['show_social'] ) && 'show' === $instance['show_social'] ) : ?>
            <div class="footer__widget__social">
                <?php
                $profiles = Redux::get_option( 'ahncommerce', 'social_profiles' );

                if ( ! empty( $profiles ) && is_array( $profiles ) ) {
                    foreach ( $profiles as $profile ) {
                        $profile_url = ! empty( $profile['url'] ) ? $profile['url'] : '#';
                        printf(
                            '<a href="%1$s" target="_blank" rel="noopener noreferrer"><i class="fa fa-%2$s"></i></a>',
                            esc_url( $profile_url ),
                            esc_attr( $profile['id'] )
                        );
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Outputs the settings form for the Newsletter widget.
     *
     * @since 1.0.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title       = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Join Our Newsletter Now', 'ahncommerce' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Get E-mail updates about our latest shop and special offers.', 'ahncommerce' );
        $show_social = ! empty( $instance['show_social'] ) ? $instance['show_social'] : 'show';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'ahncommerce' ); ?>
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>"
            >
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
                <?php esc_html_e( 'Description:', 'ahncommerce' ); ?>
            </label>
            <textarea
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"
                rows="3"
            ><?php echo esc_textarea( $description ); ?></textarea>
        </p>
        <p>
            <label><?php esc_html_e( 'Show Social Links:', 'ahncommerce' ); ?></label><br>
            <input
                type="radio"
                id="<?php echo esc_attr( $this->get_field_id( 'show_social_show' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'show_social' ) ); ?>"
                value="show"
                <?php checked( $show_social, 'show' ); ?>
            >
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_social_show' ) ); ?>">
                <?php esc_html_e( 'Show ', 'ahncommerce' ); ?>
            </label>
            <input
                type="radio"
                id="<?php echo esc_attr( $this->get_field_id( 'show_social_hide' ) ); ?>"
                name="<?php echo esc_attr( $this->get_field_name( 'show_social' ) ); ?>"
                value="hide"
                <?php checked( $show_social, 'hide' ); ?>
            >
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_social_hide' ) ); ?>">
                <?php esc_html_e( ' Hide', 'ahncommerce' ); ?>
            </label>
        </p>
        <?php
    }

    /**
     * Handles updating settings for the current Newsletter widget instance.
     *
     * @since 1.0.0
     *
     * @param array $new_instance New settings for this instance.
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                 = array();
        $instance['title']        = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['description']  = ! empty( $new_instance['description'] ) ? sanitize_textarea_field( $new_instance['description'] ) : '';
        $instance['show_social']  = ! empty( $new_instance['show_social'] ) ? sanitize_text_field( $new_instance['show_social'] ) : 'show';

        return $instance;
    }
}
