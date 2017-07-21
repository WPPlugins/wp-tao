
<div class="wptao-report-summary wptao-row">
	<div class="wptao-report-summary-item wptao-success-color wptao-report-summary-col6">
		<h4><?php _e( 'Registrations', WTBP_WPTAO_DOMAIN ); ?></h4>
		<span class="wptao-report-summary-value"><?php echo absint( $this->total_registrations ); ?></span>
	</div>
</div>


<div class="wptao-report-content wptao-row">

	<table class="wp-list-table widefat fixed striped pages">
		<thead>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column wptao-column-date" scope="col"><?php _e( 'Date', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'New registrations', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</thead>

		<tbody id="the-list">
			<?php if ( !empty( $this->days ) ): ?>

				<?php
				$i = 1;
				foreach ( $this->days as $day ):
					?>
					<tr>
						<td class="wptao-report-column-primary"><?php echo $i; ?></td>
						<td data-colname="<?php _e( 'Date', WTBP_WPTAO_DOMAIN ) ?>"><b><?php echo date_i18n( get_option( 'date_format' ), strtotime( $day ) ); ?></b></td>
						<td data-colname="<?php _e( 'New registrations', WTBP_WPTAO_DOMAIN ) ?>" class="wptao-cell-number"><?php echo array_key_exists( $day, $this->data ) && isset( $this->data[ $day ][ 'registrations' ] ) ? absint( $this->data[ $day ][ 'registrations' ] ) : 0; ?></td>
					</tr>
					<?php
					$i++;
				endforeach;
				?>

			<?php else: ?>
				<tr class="" id="">
					<td colspan="3"><?php _e( 'No results!', WTBP_WPTAO_DOMAIN ); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column wptao-column-date" scope="col"><?php _e( 'Date', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'New registrations', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</tfoot>

	</table>


</div>