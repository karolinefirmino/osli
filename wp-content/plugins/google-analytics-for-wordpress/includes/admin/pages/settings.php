<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Callback to output the MonsterInsights settings page.
 *
 * @return void
 * @since 7.4.0
 * @access public
 *
 */
function monsterinsights_settings_page() {
	echo monsterinsights_ublock_notice(); // phpcs:ignore
	monsterinsights_settings_error_page( 'monsterinsights-vue-site-settings' );
	monsterinsights_settings_inline_js();
}

function monsterinsights_network_page() {
	echo monsterinsights_ublock_notice(); // phpcs:ignore
	monsterinsights_settings_error_page( 'monsterinsights-vue-network-settings' );
	monsterinsights_settings_inline_js();
}

/**
 * Attempt to catch the js error preventing the Vue app from loading and displaying that message for better support.
 */
function monsterinsights_settings_inline_js() {
	?>
	<script type="text/javascript">
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf('MSIE ');
		if (msie > 0) {
			var browser_error = document.getElementById('monsterinsights-error-browser');
			var js_error = document.getElementById('monsterinsights-error-js');
			js_error.style.display = 'none';
			browser_error.style.display = 'block';
		} else {
			window.onerror = function myErrorHandler(errorMsg, url, lineNumber) {
				/* Don't try to put error in container that no longer exists post-vue loading */
				var message_container = document.getElementById('monsterinsights-nojs-error-message');
				if (!message_container) {
					return false;
				}
				var message = document.getElementById('monsterinsights-alert-message');
				message.innerHTML = errorMsg;
				message_container.style.display = 'block';
				return false;
			}
		}
	</script>
	<?php
}


/**
 * Error page HTML
 **/
function monsterinsights_settings_error_page( $id = 'monsterinsights-vue-site-settings', $footer = '', $margin = '82px 0' ) {
	$inline_logo_image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAd4AAABaCAYAAAAWyDe5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ1IDc5LjE2MzQ5OSwgMjAxOC8wOC8xMy0xNjo0MDoyMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTkgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MDJFRDBENkZFQ0Y2MTFFOEE5OUNCODFENzIyODU1MzEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MDJFRDBENzBFQ0Y2MTFFOEE5OUNCODFENzIyODU1MzEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowMkVEMEQ2REVDRjYxMUU4QTk5Q0I4MUQ3MjI4NTUzMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowMkVEMEQ2RUVDRjYxMUU4QTk5Q0I4MUQ3MjI4NTUzMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv4HgdQAAD64SURBVHja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';
	?>
	<style type="text/css">
		#monsterinsights-settings-area {
			visibility: hidden;
			animation: loadMonsterInsightsSettingsNoJSView 0s 2s forwards;
		}

		@keyframes loadMonsterInsightsSettingsNoJSView {
			to {
				visibility: visible;
			}
		}
	</style>
	<!--[if IE]>
	<style>
		#monsterinsights-settings-area {
			visibility: visible !important;
		}
	</style>
	<![endif]-->
	<div id="<?php echo esc_attr($id); ?>">
		<div id="monsterinsights-settings-area" class="monsterinsights-settings-area mi-container"
			 style="font-family:'Helvetica Neue', 'HelveticaNeue-Light', 'Helvetica Neue Light', Helvetica, Arial, 'Lucida Grande', sans-serif;margin: auto;width: 750px;max-width: 100%;">
			<div id="monsterinsights-settings-error-loading-area">
				<div class=""
					 style="text-align: center; background-color: #fff;border: 1px solid #D6E2EC; padding: 15px 50px 30px; color: #777777; margin: <?php echo esc_attr( $margin ); ?>">
					<div class="" style="border-bottom: 0;padding: 5px 20px 0;">
						<img class="" src="<?php echo esc_url( $inline_logo_image ); ?>" alt=""
							 style="max-width: 100%;width: 240px;padding: 30px 0 15px;">
					</div>
					<div id="monsterinsights-error-js">
						<h3 class=""
							style="font-size: 20px;color: #434343;font-weight: 500;line-height:1.4;"><?php esc_html_e( 'Ooops! It Appears JavaScript Didn’t Load', 'google-analytics-for-wordpress' ); ?></h3>
						<p class="info"
						   style="line-height: 1.5;margin: 1em 0;font-size: 16px;color: #434343;padding: 5px 20px 20px;"><?php esc_html_e( 'There seems to be an issue running JavaScript on your website, which MonsterInsights is crafted in to give you the best experience possible.', 'google-analytics-for-wordpress' ); ?></p>
						<p class="info"
						   style="line-height: 1.5;margin: 1em 0;font-size: 16px;color: #434343;padding: 5px 20px 20px;">
							<?php
							// Translators: Placeholders make the text bold.
							printf( esc_html__( 'If you are using an %1$sad blocker%2$s, please disable or whitelist the current page to load MonsterInsights correctly.', 'google-analytics-for-wordpress' ), '<strong>', '</strong>' );
							?>
						</p>
						<div style="display: none" id="monsterinsights-nojs-error-message">
							<div class="" style="  border: 1px solid #E75066;
                                                                border-left: 3px solid #E75066;
                                                                background-color: #FEF8F9;
                                                                color: #E75066;
                                                                font-size: 14px;
                                                                padding: 18px 18px 18px 21px;
                                                                font-weight: 300;
                                                                text-align: left;">
								<strong style="font-weight: 500;" id="monsterinsights-alert-message"></strong>
							</div>
							<p class=""
							   style="font-size: 14px;color: #777777;padding-bottom: 15px;"><?php esc_html_e( 'Copy the error message above and paste it in a message to the MonsterInsights support team.', 'google-analytics-for-wordpress' ); ?></p>
						</div>
						<a href="https://www.monsterinsights.com/docs/fix-javascript-error" target="_blank"
						   style="margin-left: auto;background-color: #54A0E0;border-color: #3380BC;border-bottom-width: 2px;color: #fff;border-radius: 3px;font-weight: 500;transition: all 0.1s ease-in-out;transition-duration: 0.2s;padding: 14px 35px;font-size: 16px;margin-top: 10px;margin-bottom: 20px; text-decoration: none; display: inline-block;">
							<?php esc_html_e( 'Resolve This Issue', 'google-analytics-for-wordpress' ); ?>
						</a>
					</div>
					<div id="monsterinsights-error-browser" style="display: none">
						<h3 class=""
							style="font-size: 20px;color: #434343;font-weight: 500;"><?php esc_html_e( 'Your browser version is not supported', 'google-analytics-for-wordpress' ); ?></h3>
						<p class="info"
						   style="line-height: 1.5;margin: 1em 0;font-size: 16px;color: #434343;padding: 5px 20px 20px;"><?php esc_html_e( 'You are using a browser which is no longer supported by MonsterInsights. Please update or use another browser in order to access the plugin settings.', 'google-analytics-for-wordpress' ); ?></p>
						<a href="https://www.monsterinsights.com/docs/browser-support-policy/" target="_blank"
						   style="margin-left: auto;background-color: #54A0E0;border-color: #3380BC;border-bottom-width: 2px;color: #fff;border-radius: 3px;font-weight: 500;transition: all 0.1s ease-in-out;transition-duration: 0.2s;padding: 14px 35px;font-size: 16px;margin-top: 10px;margin-bottom: 20px; text-decoration: none; display: inline-block;">
							<?php esc_html_e( 'View supported browsers', 'google-analytics-for-wordpress' ); ?>
						</a>
					</div>
				</div>
			</div>
			<div style="text-align: center;">
				<?php echo wp_kses_post( $footer ); ?>
			</div>
		</div>
	</div>
	<?php
}
