
<div class="metabox metabox-247p-email-confirmation">

	<h3><?php _e( 'E-mail confirmation', WTBP_WPTAO_DOMAIN ); ?></h3>

	<?php do_action( 'wtbp_247p_metabox_before_email-confirmation' ); ?>

	<div class="wtbp-247p-form-group">
			<label>
				<?php _e( 'E-mail confirmation', WTBP_WPTAO_DOMAIN ); ?>
			</label>

			<select name="email_conf_status">
					<option <?php selected( 'off', $opt[ 'email_conf_status' ] ); ?> value="off"><?php _e( 'Disable', WTBP_WPTAO_DOMAIN ); ?></option>
					<option <?php selected( 'on', $opt[ 'email_conf_status' ] ); ?> value="on"><?php _e( 'Enable', WTBP_WPTAO_DOMAIN ); ?></option>
			</select>
		</div>
	
	<?php do_action( 'wtbp_247p_metabox_after_email-confirmation' ); ?>

</div>

