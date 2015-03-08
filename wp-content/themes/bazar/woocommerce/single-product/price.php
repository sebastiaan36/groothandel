<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//if( ! is_shop_enabled() ) return;

global $product;

$shop_view_show_price_range_option = yit_get_option( 'shop-view-show-price-range' );
if ( !($shop_view_show_price_range_option == "1" || $shop_view_show_price_range_option == "true") && ($product->product_type == 'variable' || $product->product_type == 'variable-subscription') ) return ;

/* woocommerce subscription price fix */
$class_subscription ="";
if($product->product_type == 'subscription' || $product->product_type == 'variable-subscription') $class_subscription ="subscription";
/*--------------------------*/

?>
<div id="offers" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <?php if ( $product->get_price_html() != "" ) :
        $html = $product->get_price_html();
        if ( strpos( $html, '<ins><span class="amount">' ) ) {
            $html = str_replace( '<ins><span class="amount">', '<ins><span class="amount">', $html );
        }
        else {
            $html = str_replace( '<span class="amount">', '<span class="amount">', $html );
        }

        ?>
        <p class="price <?php echo $class_subscription ?>">
            <meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
            <meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
            <?php echo $html; ?>
        </p>
    <?php endif ?>
    <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
</div>