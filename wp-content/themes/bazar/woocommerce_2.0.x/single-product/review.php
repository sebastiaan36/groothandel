<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post;
$rating = esc_attr( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) );
?>
<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php echo get_avatar( $GLOBALS['comment'], $size='60' ); ?>

		<div class="comment-text">

			<?php if ( get_option('woocommerce_enable_review_rating') == 'yes' ) : ?>
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'yit' ), $rating) ?>">
                    <meta itemprop="worstRating" content = "1">
                    <meta itemprop="bestRating" content = "5">
					<span style="width:<?php echo ( intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%">
                        <strong itemprop="ratingValue"><?php echo intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?></strong>
                        <?php _e( 'out of 5', 'yit' ); ?>
                    </span>
				</div>
            <?php endif; ?>

			<?php if ($GLOBALS['comment']->comment_approved == '0') : ?>
				<p class="meta"><em><?php _e('Your comment is awaiting approval', 'yit'); ?></em></p>
			<?php else : ?>
				<p class="meta">
                    <span itemprop="name">Review</span>
					<strong itemprop="author"><?php comment_author(); ?></strong> <?php

						if ( get_option('woocommerce_review_rating_verification_label') == 'yes' )
							if ( woocommerce_customer_bought_product( $GLOBALS['comment']->comment_author_email, $GLOBALS['comment']->user_id, $post->ID ) )
								echo '<em class="verified">(' . __( 'verified owner', 'yit' ) . ')</em> ';

					?>&ndash;
                    <time class='timestamp-link' expr:href='data:post.url' title='permanent link' itemprop="datePublished" content="<?php echo get_comment_date('Y-m-d'); ?>">
                        <abbr class='updated published' expr:title='data:post.timestampISO8601'>
                            <data:post.timestamp/>
                            <?php echo get_comment_date(__( get_option('date_format'), 'woocommerce' )); ?>
                        </abbr>
                    </time>:
                </p>
			<?php endif; ?>

				<div itemprop="description" class="description"><?php comment_text(); ?></div>
				<div class="clear"></div>
			</div>
		<div class="clear"></div>
	</div>


</li>

