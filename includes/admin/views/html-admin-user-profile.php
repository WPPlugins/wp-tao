
<div class="wrap">

	<div class="wptao-dashboard-head">
		<h2><span class="dashicons dashicons-id"></span><?php _e( 'Profile', WTBP_WPTAO_DOMAIN ); ?></h2>
	</div>

    <div id="wptao-user-profile" class="wptao-user-profile wptao-row">

		<div class="wptao-back">
			<a href="<?php echo admin_url( 'admin.php?page=wtbp-wptao-users' ); ?>" >
				<span class="dashicons dashicons-arrow-left-alt"></span>
				<?php _e( 'Back to Identified', WTBP_WPTAO_DOMAIN ); ?>
			</a>
		</div>

        <div class="wptao-pcol-1">

			<?php do_action( 'wptao_user_profile_before_module_header' ); ?>

            <div class="wptao-module wptao-user-name wptao-module-header wptao-row">
				<div class="wptao-user-name-av">
					<?php
					echo TAO()->users->get_avatar( $user, 70 );
					?>
				</div>
                <h1><?php echo esc_attr( $user->display_name ); ?></h1>
				<a href="<?php printf( admin_url( 'admin.php?page=wtbp-wptao-users&action=edit&user=%d' ), $user_id ); ?>" class="button wptao-profile-edit-link"><?php _e( 'Edit profile', WTBP_WPTAO_DOMAIN ); ?></a>
				<a href="<?php printf( admin_url( 'admin.php?page=wtbp-wptao-users&action=actions&user=%d' ), $user_id ); ?>" class="button wptao-profile-delete-link"><?php _e( 'Actions', WTBP_WPTAO_DOMAIN ); ?></a>
            </div>

			<?php do_action( 'wptao_user_profile_before_module_user_info' ); ?>

            <div class="wptao-module wptao-mod-user-info">

                <ul>
					<?php if ( !empty( $user->email ) ): ?>
						<li><span class="dashicons dashicons-email-alt"></span><b><?php _e( 'E-mail', WTBP_WPTAO_DOMAIN ); ?></b>: <a href="mailto:<?php echo esc_attr( $user->email ); ?>"><?php echo esc_attr( $user->email ); ?></a></li>
					<?php endif; ?>

					<?php if ( !empty( $user->phone ) ): ?>
						<li><span class="dashicons dashicons-phone"></span><b><?php _e( 'Phone', WTBP_WPTAO_DOMAIN ); ?></b>: <?php echo esc_attr( $user->phone ); ?></li>
					<?php endif; ?>

					<?php
					$url = !empty( $user->meta[ 'first_url' ] ) ? $user->meta[ 'first_url' ] : '';
					$ref = !empty( $user->meta[ 'referer' ] ) ? $user->meta[ 'referer' ] : '';

					$src = TAO()->traffic->get_source_analyzed( $url, $ref );

					if ( false != $src ) {
						$src = esc_html( $src );
						if ( substr( $src, 0, 4 ) == 'http' ) {
							$source = '<span class="wptao-user-traffic-source-label wptao-meta-referer" title="' . esc_attr( $src ) . '">' . esc_attr( $src ) . '</span><br />';
						} else {
							$source = '<span class="wptao-user-traffic-source-label wptao-meta-direct">' . esc_attr( $src ) . '</span><br />';
						}
						?>
						<li><span class="dashicons dashicons-admin-site"></span><b><?php _e( 'Source', WTBP_WPTAO_DOMAIN ); ?></b>: <?php echo $source; ?></li>
						<?php
					}

					$tags_id_imploded = $user->tags;

					if ( !empty( $tags_id_imploded ) ) {
						$tags		 = TAO()->users->parse_tags( $tags_id_imploded );
						$tags_str	 = '';
						foreach ( $tags as $tag ) {
							$tags_str .= '<span class="wptao-label wptao-user-tag">' . $tag[ 'tag' ] . ' (' . $tag[ 'count' ] . ')</span> ';
						}
						?>
						<li><span class="dashicons dashicons-tag"></span><b><?php _e( 'Tags', WTBP_WPTAO_DOMAIN ); ?></b>: <?php echo $tags_str; ?></li>
						<?php
					}
					?>
                    <li><span class="dashicons dashicons-backup"></span><b><?php _e( 'Last active', WTBP_WPTAO_DOMAIN ); ?></b>: <?php echo empty( $user->last_active_ts ) ? __( 'No data', WTBP_WPTAO_DOMAIN ) : esc_attr( sprintf( _x( '%s ago', '%s = human-readable time difference', WTBP_WPTAO_DOMAIN ), human_time_diff( $user->last_active_ts ) ) ); ?></li>
                </ul>
			</div>

			<?php if ( !empty( $user->notes ) ): ?>
				<div class="wptao-module wptao-mod-user-notes">
					<p><?php echo esc_attr( $user->notes ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( !empty( $user->fingerprints ) ): ?>

				<?php do_action( 'wptao_user_profile_before_module_fingerprints' ); ?>

				<div class="wptao-module wptao-mod-user-fingerprints">
					<h2><?php _e( 'Fingerprints', WTBP_WPTAO_DOMAIN ) ?></h2>
					<?php
					$i = 0;
					foreach ( $user->fingerprints as $fp ) {
						if ( $i === 0 ) {
							echo '<p class="wptao-mod-user-fingerprint">';
						} else {
							echo '<p class="wptao-mod-user-fingerprint wptao-mod-user-fingerprint-older">';
						}
						echo '<b>' . __( 'ID:', WTBP_WPTAO_DOMAIN ) . '</b> ' . $fp->id . '<br />';
						echo '<b>' . __( 'Created:', WTBP_WPTAO_DOMAIN ) . '</b> ' . WTBP_WPTAO_Helpers::get_date( "H:i:s d.m.Y", $fp->created_ts ) . '<br />';
						echo '<b>' . __( 'IP:', WTBP_WPTAO_DOMAIN ) . '</b> ' . $fp->ip . '<br />';
						echo '<b>' . __( 'User agent:', WTBP_WPTAO_DOMAIN ) . '</b> ' . $fp->user_agent;
						echo '</p>';

						if ( $i === 0 && count( $user->fingerprints ) > 1 ) {
							echo '<div class="wptao-more-user-fp">';
							echo __( 'Show more', WTBP_WPTAO_DOMAIN ) . ' (' . (count( $user->fingerprints ) - 1) . ')';
							echo '</div>';
						}

						if ( $i === (count( $user->fingerprints ) - 1) && count( $user->fingerprints ) > 1 ) {
							echo '<div class="wptao-less-user-fp">' . __( 'Show less', WTBP_WPTAO_DOMAIN ) . '</div>';
						}

						$i++;
					}
					?>
				</div>
			<?php endif; ?>

			<?php do_action( 'wptao_user_profile_before_module_filter' ); ?>

			<div class="wptao-module">

				<button class="wptao-toggle-module dashicons"></button>

				<?php $timeline->the_timeline_filter(); ?>
			</div>

        </div>

        <div class="wptao-pcol-2">

			<div class="wptao-events-desk">

				<div id="wptao-activity" class="wptao-events-content" data-token="<?php echo wp_create_nonce( 'wptao-events-ajax' ); ?>">
					<div class="wptao-events-content-inner">

						<?php $timeline->the_timeline(); ?>

					</div>

				</div>

				<div class = "wptao-event-preloader hidden"><img src = "<?php echo esc_url( admin_url( 'images/spinner-2x.gif' ) ); ?>" width = "40" height = "40" /></div>
				<div class = "wptao-older-events-wrapp">
					<button id = "wptao-older-events" class = "button-secondary center"><?php _e( 'Load older events', WTBP_WPTAO_DOMAIN ); ?></button>
				</div>
			</div>

        </div>

    </div>
</div>