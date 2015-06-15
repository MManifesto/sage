<?php /* Handles basic ui wrapper for all taxonomy meta sections */
global $MMM_Roots; ?>

<div class="mmm_postmeta_wrapper post_meta clearfix">
	<div class="container">
		<div class="row form-horizontal">
			<?php wp_nonce_field( 'mm_nonce', 'mm_nonce' ); ?>

			<?php
				echo \MmmToolsNamespace\OutputThemeData($options, $values, $MMM_Roots);
			?>
		</div>
	</div>
</div>