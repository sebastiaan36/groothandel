<?php
/**
 * Checkout Form
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

global $sitepress;

if ( isset( $sitepress ) && ! empty( $sitepress ) ) {

    $default_lang = $sitepress->get_default_language();
    $lang         = ICL_LANGUAGE_CODE;

    if ( $sitepress->get_default_language() == ICL_LANGUAGE_CODE ) {
        $sitepress->switch_lang( $default_lang, true );
    }
    else {
        $sitepress->switch_lang( $lang, true );
    }

    $must_log_in = yit_icl_translate( 'theme', 'yit', 'form-checkout-classic-login-advise', 'You must be logged in to checkout.' );
    $your_order  = yit_icl_translate( 'theme', 'yit', 'form-checkout-classic-your-order-label', 'Your order' );


}
else {

    $must_log_in = __( 'You must be logged in to checkout.', 'yit' );
    $your_order  = __( 'Your order', 'yit' );

}


global $woocommerce;
$woocommerce_checkout = $woocommerce->checkout();


?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_checkout_form' );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( get_option( 'woocommerce_enable_signup_and_login_from_checkout' ) == "no" && get_option( 'woocommerce_enable_guest_checkout' ) == "no" && ! is_user_logged_in() ) :
    echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', $must_log_in );
    return;
endif;

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', $woocommerce->cart->get_checkout_url() ); ?>

    <form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

        <?php if ( sizeof( $woocommerce_checkout->checkout_fields ) > 0 ) : ?>

            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="row-fluid" id="customer_details">

                <div class="span6">

                    <div class="col-1">

                        <div class="billing-fields"><?php do_action( 'woocommerce_checkout_billing' ); ?></div>

                        <div class="shipping-fields"><?php do_action( 'woocommerce_checkout_shipping' ); ?></div>

                    </div>

                </div>

                <div class="span6">

                    <div class="col-2">

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                        <h3 id="order_review_heading"><?php echo $your_order; ?></h3>

                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>

                    </div>

                </div>

            </div>


        <?php endif; ?>


    </form>

<?php do_action( 'woocommerce_after_checkout_form' ); ?>