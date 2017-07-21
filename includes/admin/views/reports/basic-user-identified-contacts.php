
<div class="wptao-report-content wptao-row">

	<table class="wp-list-table widefat fixed striped pages">
		<thead>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column" scope="col"><?php _e( 'Identified date', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Name', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Email', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Phone', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Source', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Status', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</thead>

		<tbody id="the-list">
			<?php if ( !empty( $this->data ) ): ?>

				<?php
				$i = 1;
				foreach ( $this->data as $item ):
					?>
					<tr>
						<td class="wptao-report-column-primary"><?php echo $i; ?></td>
						<td data-colname="<?php _e( 'Identified date', WTBP_WPTAO_DOMAIN ) ?>"><?php echo $item[ 'created_date' ]; ?></td>
						<td data-colname="<?php _e( 'Name', WTBP_WPTAO_DOMAIN ) ?>"><?php echo $item[ 'profile_link' ]; ?></td>
						<td data-colname="<?php _e( 'Email', WTBP_WPTAO_DOMAIN ) ?>"><?php echo $item[ 'email' ]; ?></td>
						<td data-colname="<?php _e( 'Phone', WTBP_WPTAO_DOMAIN ) ?>"><?php echo $item[ 'phone' ]; ?></td>
						<td class="wptao-ellipsis" data-colname="<?php _e( 'Source', WTBP_WPTAO_DOMAIN ) ?>"><?php echo $item[ 'referer' ]; ?></td>
						<td data-colname="<?php _e( 'Status', WTBP_WPTAO_DOMAIN ) ?>"><?php echo TAO()->users->parse_status( $item[ 'status' ], true ); ?></td>
					</tr>
					<?php
					$i++;
				endforeach;
				?>

			<?php else: ?>
				<tr class="" id="">
					<td colspan="7"><?php _e( 'No results!', WTBP_WPTAO_DOMAIN ); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>

		<tfoot>
			<tr>
				<th class="manage-column wptao-column-no column-primary" scope="col">#</th>
				<th class="manage-column" scope="col"><?php _e( 'Identified date', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Name', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Email', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Phone', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Source', WTBP_WPTAO_DOMAIN ) ?></th>
				<th class="manage-column" scope="col"><?php _e( 'Status', WTBP_WPTAO_DOMAIN ) ?></th>
			</tr>
		</tfoot>

	</table>


</div>