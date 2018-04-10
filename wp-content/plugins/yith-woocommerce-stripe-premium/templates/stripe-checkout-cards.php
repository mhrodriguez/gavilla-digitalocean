<?php
/**
 * The Template for list saved cards on checkout
 *
 * Override this template by copying it to yourtheme/woocommerce/checkout/stripe-checkout-cards.php
 *
 * @var $cards array
 * @var $customer array
 *
 * @author 		YIThemes
 * @package 	YITH WooCommerce Stripe/Templates
 * @version     1.0.0
 */

?>

<div class="cards"><h6><?php _e( 'Your credit cards', 'yith-stripe' ) ?></h6><?php

	foreach ( $cards as $card ) {
		?>
		<div class="card<?php echo $customer['default_source'] === $card->id ? ' selected' : '' ?>">
			<input type="radio" value="<?php echo $card->id ?>" id="<?php echo $card->id ?>"
			       name="yith-stripe-pay-card"<?php checked( $customer['default_source'], $card->id ) ?> />
			<label for="<?php echo $card->id ?>">
				<img src="<?php echo $card->icon ?>" alt="<?php echo $card->brand ?>'" style="width:40px;"/>
				<?php echo sprintf(
					'<span class="card-type">%s</span> <span class="card-number"><em>&bull;&bull;&bull;&bull;</em>%s</span> <span class="card-expire">(%s/%s)</span>',
					$card->brand,
					$card->last4,
					$card->exp_month,
					$card->exp_year
				); ?>
			</label>
		</div>
	<?php
	}
	?>

	<div class="card">
		<input type="radio" value="new" name="yith-stripe-pay-card" id="yith-stripe-pay-card-new"/>
		<label for="yith-stripe-pay-card-new"><?php _e( 'New card', 'yith-stripe' ) ?></label>
	</div>

</div>