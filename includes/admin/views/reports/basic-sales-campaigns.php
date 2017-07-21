<?php
global $wptao_settings;
?>

<div class="wptao-report-content wptao-row">

	<table class="wp-list-table widefat fixed striped pages">
		<thead>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column wptao-table-column-big" scope="col"><?php _e( 'Campaign', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Orders', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Amount', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</thead>

		<tbody id="the-list">
			<?php if ( !empty( $this->data ) ): ?>

				<?php
				$i = 1;
				foreach ( $this->data as $k => $v ) :
					?>
					<tr class="" id="">
						<td class="wptao-report-column-primary"><?php echo $i; ?></td>
						<td data-colname="<?php _e( 'Campaign', WTBP_WPTAO_DOMAIN ) ?>"><?php echo apply_filters( 'wptao_traffic_campaign_name', $k, null ); ?></td>
						<td data-colname="<?php _e( 'Orders', WTBP_WPTAO_DOMAIN ) ?>" class="wptao-cell-number"><?php echo absint( $v[ 'orders' ] ); ?></td>
						<td data-colname="<?php _e( 'Amount', WTBP_WPTAO_DOMAIN ) ?>" class="wptao-cell-number"><?php echo WTBP_WPTAO_Helpers::amount_format( $v[ 'amount' ], $wptao_settings[ 'currency' ] ); ?></td>
					</tr>
					<?php
					$i++;
				endforeach;
				?>

			<?php else: ?>
				<tr class="" id="">
					<td colspan="4"><?php _e( 'No results!', WTBP_WPTAO_DOMAIN ); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column wptao-table-column-big" scope="col"><?php _e( 'Campaign', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Orders', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Amount', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</tfoot>

	</table>


</div>