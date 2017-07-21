
<div class="metabox metabox-247p-optin">

	<h3><?php _e( 'Opt-in (experimental)', WTBP_WPTAO_DOMAIN ); ?></h3>

	<?php do_action( 'wtbp_247p_metabox_before_optin' ); ?>

	<div class="wtbp-247p-form-group wtbp-247p-textarea-group">
		<label for="opt_optin_form">
			<?php _e( 'Sign-up form', WTBP_WPTAO_DOMAIN ); ?>
			<p class="wtbp-247p-field-desc"><?php _e( 'Paste here the sign-up form (HTML)', WTBP_WPTAO_DOMAIN ); ?>.</p>
		</label>
		<textarea name="opt_optin_form" class="long-text"><?php echo $opt[ 'opt_optin_form' ]; ?></textarea>
	</div>

	<h4><?php _e( 'Also include fields for', WTBP_WPTAO_DOMAIN ); ?></h4>
	<div class="wtbp-247p-form-group">

		<label><?php _e( 'First name', WTBP_WPTAO_DOMAIN ); ?></label>

		<input <?php checked( '1', $opt[ 'opt_fname_visible' ] ); ?> type="checkbox" value="1" name="opt_fname_visible">

	</div>

	<?php include WTBP_247P_DIR . 'includes/admin/views/elements/privacy-policy-form.php'; ?>

	<?php do_action( 'wtbp_247p_metabox_after_optin' ); ?>

</div>

