<?php
if ( ! function_exists( 'pota_add_image_size' ) ) :
	function pota_add_image_size() {
		add_image_size('pota_800x450', 800, 450, true); // Product reveiw & all Product
		add_image_size('pota_750x450', 750, 450, true); // block - blog card
		add_image_size('pota_945x550', 945, 550, true); // single post
		add_image_size('pota_360x235', 360, 235, true); // block - games
		add_image_size('pota_320x180', 320, 180, true); // block - blog medium
	}
endif;
add_action( 'after_setup_theme', 'pota_add_image_size' );

function pota_image($field, $size, $type = 'wp', $echo = true ) {
	if ($type == 'acf') {
		$image = is_array($field) ? $field['sizes']['pota_'.$size] : $field;		
	} elseif ($type == 'wp') {
		$image = get_the_post_thumbnail_url( $field, 'pota_'.$size );
	}

	if (!$image) {
		$image = pota_placeholder('pota_'.$size);
	}

	if ($echo) echo $image;
	else return $image;
}

function pota_placeholder($name) {
	return get_template_directory_uri() . '/src/img/'.$name.'.jpg';
}

function pota_post_thumbnail($id, $size, $alt = '', $link = '') {
	$open_link = $close_link = '';
	if ($link) {
		$open_link = '<a href="'.$link.'">';
		$close_link = '</a>';
	}

	echo '<div class="post-thumbnail">' .
		$open_link .
			'<img src="' . pota_image($id, $size, 'wp', false) . '" alt="' . $alt . '">' .
		$close_link .
	'</div>';
}

function pota_btn_googleplay() {
	echo '<svg stroke-width="0" viewBox="0 0 135 40" width="135" height="40" fill="none" stroke="currentColor" stroke-linecap="round"><g><path fill="#010101" d="M130.2,40H4.7C2.1,40,0,37.9,0,35.3V4.7C0,2.1,2.1,0,4.7,0h125.5c2.6,0,4.8,2.1,4.8,4.7v30.5 C135,37.9,132.8,40,130.2,40L130.2,40z"></path><path fill="#010101" d="M134,35.3c0,2.1-1.7,3.8-3.8,3.8H4.7c-2.1,0-3.8-1.7-3.8-3.8V4.7c0-2.1,1.7-3.8,3.8-3.8h125.5 c2.1,0,3.8,1.7,3.8,3.8V35.3L134,35.3z"></path></g><g><g><path fill="#FFFFFF" d="M88.9,28.5l-0.9,0.8c-0.2,0.1-0.4,0.2-0.6,0.3c-0.6,0.3-1.2,0.3-1.8,0.3c-0.6,0-1.5,0-2.4-0.7 c-1.3-0.9-1.9-2.5-1.9-3.9c0-2.8,2.3-4.2,4.2-4.2c0.7,0,1.3,0.2,1.9,0.5c0.9,0.6,1.2,1.4,1.3,1.8l-4.3,1.7L83,25.4 c0.5,2.3,2,3.7,3.8,3.7C87.7,29.1,88.3,28.8,88.9,28.5C88.9,28.5,89,28.5,88.9,28.5z M86.3,23.9c0.4-0.1,0.5-0.2,0.5-0.5 c0-0.7-0.8-1.6-1.8-1.6c-0.7,0-2.1,0.6-2.1,2.6c0,0.3,0,0.6,0.1,1L86.3,23.9z"></path><path fill="#FFFFFF" d="M79.9,28.4c0,0.7,0.1,0.8,0.7,0.9c0.3,0,0.6,0.1,0.9,0.1l-0.7,0.4h-3.2c0.4-0.5,0.5-0.6,0.5-1v-0.4l0-10.9 h-1.4l1.4-0.7h2.6c-0.6,0.3-0.7,0.5-0.8,1.2L79.9,28.4z"></path><path fill="#FFFFFF" d="M74.9,22.1c0.4,0.3,1.3,1.1,1.3,2.5c0,1.4-0.8,2-1.5,2.6c-0.2,0.2-0.5,0.5-0.5,0.9c0,0.4,0.3,0.6,0.5,0.8 l0.7,0.5c0.8,0.7,1.5,1.3,1.5,2.6c0,1.7-1.7,3.5-4.8,3.5c-2.7,0-3.9-1.3-3.9-2.6c0-0.7,0.3-1.6,1.4-2.2c1.1-0.7,2.7-0.8,3.5-0.8 c-0.3-0.3-0.6-0.7-0.6-1.2c0-0.3,0.1-0.5,0.2-0.7c-0.2,0-0.4,0-0.6,0c-1.9,0-3-1.5-3-2.9c0-0.8,0.4-1.8,1.2-2.5c1-0.9,2.3-1,3.3-1 h3.8L76,22.1H74.9z M73.6,30.3c-0.2,0-0.2,0-0.4,0c-0.2,0-1.2,0-1.9,0.3c-0.4,0.1-1.6,0.6-1.6,1.9c0,1.3,1.3,2.2,3.2,2.2 c1.8,0,2.7-0.8,2.7-2C75.6,31.8,75,31.3,73.6,30.3z M74.1,26.8c0.4-0.4,0.5-1,0.5-1.3c0-1.3-0.8-3.4-2.3-3.4c-0.5,0-1,0.2-1.3,0.6 c-0.3,0.4-0.4,0.9-0.4,1.4c0,1.2,0.7,3.3,2.3,3.3C73.3,27.3,73.8,27.1,74.1,26.8z"></path><path fill="#FFFFFF" d="M63.5,30c-2.9,0-4.5-2.3-4.5-4.3c0-2.4,2-4.5,4.7-4.5c2.7,0,4.4,2.1,4.4,4.3C68.2,27.7,66.5,30,63.5,30z M65.8,28.5c0.4-0.6,0.6-1.3,0.6-2c0-1.6-0.8-4.7-3-4.7c-0.6,0-1.2,0.2-1.7,0.6c-0.7,0.6-0.8,1.4-0.8,2.2c0,1.8,0.9,4.8,3.1,4.8 C64.7,29.5,65.4,29.1,65.8,28.5z"></path><path fill="#FFFFFF" d="M53.8,30c-2.9,0-4.5-2.3-4.5-4.3c0-2.4,2-4.5,4.7-4.5c2.7,0,4.4,2.1,4.4,4.3C58.4,27.7,56.8,30,53.8,30z M56.1,28.5c0.4-0.6,0.5-1.3,0.5-2c0-1.6-0.8-4.7-3-4.7c-0.6,0-1.2,0.2-1.6,0.6c-0.7,0.6-0.8,1.4-0.8,2.2c0,1.8,0.9,4.8,3.1,4.8 C54.9,29.5,55.6,29.1,56.1,28.5z"></path><path fill="#FFFFFF" d="M48.1,29.4l-2.5,0.6c-1,0.2-1.9,0.3-2.8,0.3c-4.7,0-6.5-3.5-6.5-6.2c0-3.3,2.6-6.4,6.9-6.4 c0.9,0,1.8,0.1,2.6,0.4c1.3,0.4,1.9,0.8,2.3,1.1l-1.4,1.4l-0.6,0.1l0.4-0.7c-0.6-0.6-1.7-1.6-3.7-1.6c-2.7,0-4.8,2.1-4.8,5.1 c0,3.2,2.3,6.3,6.1,6.3c1.1,0,1.7-0.2,2.2-0.4v-2.8l-2.6,0.1l1.4-0.7h3.6l-0.4,0.4c-0.1,0.1-0.1,0.1-0.2,0.3c0,0.2,0,0.7,0,0.8 V29.4z"></path></g><g><path fill="#FFFFFF" d="M94.2,28.6v4.7h-0.9V21.4h0.9v1.4c0.6-0.9,1.7-1.6,3-1.6c2.3,0,3.8,1.7,3.8,4.5c0,2.7-1.5,4.5-3.8,4.5 C96,30.2,94.9,29.6,94.2,28.6z M100.1,25.7c0-2.1-1.1-3.7-3-3.7c-1.2,0-2.3,0.9-2.8,1.8v3.8c0.5,0.8,1.6,1.8,2.8,1.8 C99,29.4,100.1,27.8,100.1,25.7z"></path><path fill="#FFFFFF" d="M102.3,30V18.1h0.9V30H102.3z"></path><path fill="#FFFFFF" d="M113.7,32.5c0.2,0.1,0.5,0.1,0.8,0.1c0.6,0,1-0.2,1.3-1.1l0.7-1.5l-3.7-8.7h1l3.1,7.5l3.1-7.5h1l-4.5,10.5 c-0.5,1.1-1.2,1.6-2.2,1.6c-0.3,0-0.7-0.1-0.9-0.1L113.7,32.5z"></path><path fill="#FFFFFF" d="M111,30c-0.1-0.3-0.1-0.6-0.1-0.8c0-0.2,0-0.4,0-0.7c-0.3,0.5-0.8,0.9-1.3,1.2c-0.6,0.3-1.1,0.5-1.9,0.5 c-0.9,0-1.6-0.2-2.1-0.7c-0.5-0.5-0.7-1.1-0.7-1.8c0-0.8,0.4-1.4,1.1-1.9c0.7-0.5,1.7-0.7,2.8-0.7h2.2V24c0-0.6-0.2-1.1-0.6-1.5 c-0.4-0.4-1-0.5-1.8-0.5c-0.7,0-1.3,0.2-1.7,0.5c-0.4,0.3-0.6,0.7-0.6,1.2h-0.9l0,0c0-0.6,0.3-1.2,0.9-1.7 c0.6-0.5,1.5-0.7,2.5-0.7c1,0,1.8,0.2,2.4,0.7c0.6,0.5,0.9,1.2,0.9,2.1v4.2c0,0.3,0,0.6,0.1,0.9c0,0.3,0.1,0.6,0.2,0.9H111z M107.7,29.3c0.8,0,1.4-0.2,1.9-0.5c0.6-0.3,1-0.8,1.2-1.3v-1.7h-2.2c-0.8,0-1.5,0.2-2.1,0.6c-0.5,0.4-0.8,0.8-0.8,1.3 c0,0.5,0.2,0.9,0.5,1.2C106.6,29.2,107.1,29.3,107.7,29.3z"></path></g></g><g><polygon fill="none" points="24.2,25.2 27.2,22.2 27.2,22.2 24.2,25.2 14.7,15.7 14.7,15.7 24.2,25.2 14.7,34.7 14.7,34.7 24.2,25.2 27.2,28.2 27.2,28.2"></polygon><linearGradient id="google_play_svg_1" gradientUnits="userSpaceOnUse" x1="500.1123" y1="-486.5779" x2="487.572" y2="-494.4261" gradientTransform="matrix(0.7071 0.7071 -0.7071 0.7071 -675.5106 14.8849)"><stop offset="0" style="stop-color:#D7E69D"></stop><stop offset="0.4456" style="stop-color:#94C4AA"></stop><stop offset="1" style="stop-color:#01A4B6"></stop></linearGradient><path fill="url(#google_play_svg_1)" d="M27.2,22.2l-11.6-6.4c-0.3-0.2-0.6-0.2-0.9-0.1l9.5,9.5L27.2,22.2z"></path><linearGradient id="google_play_svg_2" gradientUnits="userSpaceOnUse" x1="492.8211" y1="-493.2821" x2="509.0801" y2="-489.0318" gradientTransform="matrix(0.7071 0.7071 -0.7071 0.7071 -675.5106 14.8849)"><stop offset="0" style="stop-color:#ED277B"></stop><stop offset="1.915717e-02" style="stop-color:#EE2F7C"></stop><stop offset="0.7039" style="stop-color:#F7BD81"></stop><stop offset="1" style="stop-color:#FEEB74"></stop></linearGradient><path fill="url(#google_play_svg_2)" d="M27.2,28.2l4-2.2c0.8-0.4,0.8-1.2,0-1.6l-4-2.2l-3,3L27.2,28.2z"></path><linearGradient id="google_play_svg_3" gradientUnits="userSpaceOnUse" x1="501.8978" y1="-480.6248" x2="484.2669" y2="-490.9977" gradientTransform="matrix(0.7071 0.7071 -0.7071 0.7071 -675.5106 14.8849)"><stop offset="0" style="stop-color:#89CFBD"></stop><stop offset="9.067577e-02" style="stop-color:#7DBEBB"></stop><stop offset="0.5396" style="stop-color:#457CAC"></stop><stop offset="0.8523" style="stop-color:#1C5AA2"></stop><stop offset="1" style="stop-color:#084D9F"></stop></linearGradient><path fill="url(#google_play_svg_3)" d="M14.7,15.7c-0.4,0.1-0.6,0.5-0.6,1l0,17c0,0.5,0.2,0.9,0.6,1l9.5-9.5L14.7,15.7z"></path><linearGradient id="google_play_svg_4" gradientUnits="userSpaceOnUse" x1="508.2989" y1="-488.8607" x2="497.4431" y2="-474.5588" gradientTransform="matrix(0.7071 0.7071 -0.7071 0.7071 -675.5106 14.8849)"><stop offset="0" style="stop-color:#F04A2B"></stop><stop offset="0.4704" style="stop-color:#B54F6B"></stop><stop offset="0.8353" style="stop-color:#8B5191"></stop><stop offset="1" style="stop-color:#7851A1"></stop></linearGradient><path fill="url(#google_play_svg_4)" d="M14.7,34.7c0.2,0.1,0.6,0,0.9-0.1l11.6-6.4l-3-3L14.7,34.7z"></path></g><g><g><path fill="#FFFFFF" d="M36.3,8.4c0-1.8,1.4-3,3-3c1.1,0,1.9,0.5,2.3,1.2l-0.8,0.5c-0.3-0.4-0.9-0.8-1.5-0.8c-1.1,0-2,0.9-2,2.1 c0,1.2,0.9,2.1,2,2.1c0.6,0,1.1-0.3,1.4-0.5V9.1h-1.7V8.2h2.7v2.2c-0.6,0.6-1.4,1.1-2.4,1.1C37.6,11.4,36.3,10.2,36.3,8.4z"></path><path fill="#FFFFFF" d="M43,11.3V5.5h4v0.9h-3v1.5h2.9v0.9H44v1.6h3v0.9H43z"></path><path fill="#FFFFFF" d="M49.7,11.3V6.4H48V5.5h4.5v0.9h-1.8v4.9H49.7z"></path><path fill="#FFFFFF" d="M56.1,11.3V5.5h1v5.8H56.1z"></path><path fill="#FFFFFF" d="M59.9,11.3V6.4h-1.8V5.5h4.5v0.9h-1.8v4.9H59.9z"></path><path fill="#FFFFFF" d="M66,8.4c0-1.7,1.2-3,3-3c1.7,0,3,1.3,3,3c0,1.7-1.2,3-3,3C67.2,11.4,66,10.1,66,8.4z M70.9,8.4 c0-1.2-0.8-2.1-1.9-2.1c-1.2,0-1.9,0.9-1.9,2.1c0,1.2,0.7,2.1,1.9,2.1C70.1,10.5,70.9,9.6,70.9,8.4z"></path><path fill="#FFFFFF" d="M77.1,11.3l-3-4.1v4.1h-1V5.5h1l3,4v-4h1v5.8H77.1z"></path></g></g></svg>';
}

function pota_btn_appstore() {
	echo '<svg stroke-width="0" viewBox="0 0 135 40" width="135" height="40" fill="none" stroke="currentColor" stroke-linecap="round"><g><path fill="#010101" d="M130.2,40H4.7C2.1,40,0,37.9,0,35.3V4.7C0,2.1,2.1,0,4.7,0h125.5c2.6,0,4.8,2.1,4.8,4.7v30.5 C135,37.9,132.8,40,130.2,40L130.2,40z"></path><path fill="#010101" d="M134,35.3c0,2.1-1.7,3.8-3.8,3.8H4.7c-2.1,0-3.8-1.7-3.8-3.8V4.7c0-2.1,1.7-3.8,3.8-3.8h125.5 c2.1,0,3.8,1.7,3.8,3.8V35.3L134,35.3z"></path><g><g><path fill="#FFFFFF" d="M30.1,19.8c0-3.2,2.6-4.8,2.8-4.9c-1.5-2.2-3.9-2.5-4.7-2.5c-2-0.2-3.9,1.2-4.9,1.2s-2.6-1.2-4.2-1.1 c-2.1,0-4.1,1.3-5.2,3.2c-2.3,3.9-0.6,9.7,1.6,12.9c1.1,1.6,2.4,3.3,4,3.2s2.2-1,4.2-1c1.9,0,2.5,1,4.2,1s2.8-1.6,3.9-3.1 c1.3-1.8,1.8-3.5,1.8-3.6C33.5,24.9,30.2,23.6,30.1,19.8z"></path><path fill="#FFFFFF" d="M26.9,10.3c0.9-1.1,1.5-2.6,1.3-4.1c-1.3,0.1-2.8,0.9-3.8,1.9c-0.8,0.9-1.5,2.5-1.3,3.9 C24.6,12.2,26,11.4,26.9,10.3z"></path></g></g><g><path fill="#FFFFFF" d="M53.6,31.5h-2.3l-1.2-3.9h-4.3l-1.2,3.9h-2.2l4.3-13.3h2.6L53.6,31.5z M49.8,26l-1.1-3.5 c-0.1-0.4-0.3-1.2-0.7-2.5l0,0c-0.1,0.6-0.3,1.4-0.6,2.5L46.2,26H49.8z"></path><path fill="#FFFFFF" d="M64.7,26.6c0,1.6-0.4,2.9-1.3,3.9c-0.8,0.8-1.8,1.3-2.9,1.3c-1.3,0-2.2-0.5-2.7-1.4l0,0v5.1h-2.1V25.1 c0-1,0-2.1-0.1-3.2h1.9l0.1,1.5l0,0c0.7-1.1,1.8-1.7,3.2-1.7c1.1,0,2.1,0.4,2.8,1.3C64.3,23.9,64.7,25.1,64.7,26.6z M62.5,26.7 c0-0.9-0.2-1.7-0.6-2.3c-0.5-0.6-1.1-0.9-1.9-0.9c-0.5,0-1,0.2-1.4,0.5c-0.4,0.4-0.7,0.8-0.8,1.4c-0.1,0.3-0.1,0.5-0.1,0.7v1.6 c0,0.7,0.2,1.3,0.6,1.8s1,0.7,1.7,0.7c0.8,0,1.4-0.3,1.9-0.9C62.3,28.5,62.5,27.7,62.5,26.7z"></path><path fill="#FFFFFF" d="M75.7,26.6c0,1.6-0.4,2.9-1.3,3.9c-0.8,0.8-1.8,1.3-2.9,1.3c-1.3,0-2.2-0.5-2.7-1.4l0,0v5.1h-2.1V25.1 c0-1,0-2.1-0.1-3.2h1.9l0.1,1.5l0,0c0.7-1.1,1.8-1.7,3.2-1.7c1.1,0,2.1,0.4,2.8,1.3C75.3,23.9,75.7,25.1,75.7,26.6z M73.5,26.7 c0-0.9-0.2-1.7-0.6-2.3c-0.5-0.6-1.1-0.9-1.9-0.9c-0.5,0-1,0.2-1.4,0.5c-0.4,0.4-0.7,0.8-0.8,1.4c-0.1,0.3-0.1,0.5-0.1,0.7v1.6 c0,0.7,0.2,1.3,0.6,1.8s1,0.7,1.7,0.7c0.8,0,1.4-0.3,1.9-0.9C73.3,28.5,73.5,27.7,73.5,26.7z"></path><path fill="#FFFFFF" d="M88,27.8c0,1.1-0.4,2.1-1.2,2.8c-0.9,0.8-2.1,1.2-3.6,1.2c-1.4,0-2.6-0.3-3.4-0.8l0.5-1.8 c0.9,0.6,2,0.8,3.1,0.8c0.8,0,1.4-0.2,1.9-0.5c0.4-0.4,0.7-0.8,0.7-1.5c0-0.5-0.2-1-0.6-1.4s-1-0.7-1.8-1 c-2.3-0.9-3.5-2.1-3.5-3.8c0-1.1,0.4-2,1.2-2.7c0.8-0.7,1.9-1,3.3-1c1.2,0,2.2,0.2,3,0.6l-0.5,1.7c-0.8-0.4-1.6-0.6-2.5-0.6 c-0.8,0-1.3,0.2-1.8,0.6c-0.4,0.3-0.5,0.7-0.5,1.2s0.2,1,0.6,1.3s1,0.7,1.9,1c1.1,0.5,2,1,2.5,1.6C87.8,26.1,88,26.9,88,27.8z"></path><path fill="#FFFFFF" d="M95.1,23.5h-2.3v4.7c0,1.2,0.4,1.8,1.2,1.8c0.4,0,0.7,0,0.9-0.1l0.1,1.6c-0.4,0.2-1,0.2-1.7,0.2 c-0.8,0-1.5-0.3-2-0.8s-0.7-1.4-0.7-2.6v-4.8h-1.4v-1.6h1.4v-1.8l2.1-0.6v2.4H95C95.1,21.9,95.1,23.5,95.1,23.5z"></path><path fill="#FFFFFF" d="M105.7,26.6c0,1.5-0.4,2.7-1.3,3.6c-0.9,1-2.1,1.5-3.5,1.5c-1.4,0-2.5-0.5-3.4-1.4s-1.3-2.1-1.3-3.5 c0-1.5,0.4-2.7,1.3-3.7c0.9-0.9,2-1.4,3.5-1.4c1.4,0,2.5,0.5,3.4,1.4C105.3,24,105.7,25.2,105.7,26.6z M103.5,26.7 c0-0.9-0.2-1.6-0.6-2.3c-0.4-0.8-1.1-1.1-1.9-1.1c-0.9,0-1.5,0.4-2,1.1c-0.4,0.6-0.6,1.4-0.6,2.3c0,0.9,0.2,1.6,0.6,2.3 c0.5,0.8,1.1,1.1,1.9,1.1c0.8,0,1.5-0.4,1.9-1.2C103.3,28.3,103.5,27.6,103.5,26.7z"></path><path fill="#FFFFFF" d="M112.6,23.8c-0.2,0-0.4-0.1-0.7-0.1c-0.8,0-1.3,0.3-1.7,0.9c-0.4,0.5-0.5,1.1-0.5,1.9v5h-2.1v-6.6 c0-1.1,0-2.1-0.1-3h1.9l0.1,1.8h0.1c0.2-0.6,0.6-1.1,1.1-1.5c0.5-0.3,1-0.5,1.5-0.5c0.2,0,0.4,0,0.5,0 C112.6,21.8,112.6,23.8,112.6,23.8z"></path><path fill="#FFFFFF" d="M122.2,26.3c0,0.4,0,0.7-0.1,1h-6.4c0,0.9,0.3,1.7,0.9,2.2c0.5,0.4,1.2,0.7,2.1,0.7c0.9,0,1.8-0.2,2.6-0.5 l0.3,1.5c-0.9,0.4-2,0.6-3.2,0.6c-1.5,0-2.7-0.4-3.5-1.3c-0.8-0.9-1.3-2.1-1.3-3.5s0.4-2.7,1.2-3.6c0.8-1,1.9-1.5,3.4-1.5 c1.4,0,2.4,0.5,3.1,1.5C121.9,24,122.2,25.1,122.2,26.3z M120.1,25.7c0-0.6-0.1-1.2-0.4-1.6c-0.4-0.6-0.9-0.9-1.7-0.9 c-0.7,0-1.3,0.3-1.7,0.9c-0.4,0.5-0.6,1-0.6,1.7L120.1,25.7L120.1,25.7z"></path></g><g><g><path fill="#FFFFFF" d="M49.1,10c0,1.2-0.4,2.1-1.1,2.7c-0.7,0.5-1.6,0.8-2.8,0.8c-0.6,0-1.1,0-1.5-0.1V7 c0.6-0.1,1.2-0.1,1.8-0.1c1.1,0,2,0.2,2.6,0.7C48.7,8.2,49.1,9,49.1,10z M47.9,10c0-0.8-0.2-1.3-0.6-1.8c-0.4-0.4-1-0.6-1.8-0.6 c-0.3,0-0.6,0-0.8,0.1v4.9c0.1,0,0.4,0,0.7,0c0.8,0,1.4-0.2,1.9-0.7C47.7,11.5,47.9,10.9,47.9,10z"></path><path fill="#FFFFFF" d="M54.9,11c0,0.7-0.2,1.3-0.6,1.8s-1,0.7-1.7,0.7s-1.2-0.2-1.7-0.7c-0.4-0.5-0.6-1-0.6-1.7s0.2-1.3,0.6-1.8 s1-0.7,1.7-0.7s1.2,0.2,1.7,0.7C54.7,9.8,54.9,10.3,54.9,11z M53.8,11.1c0-0.4-0.1-0.8-0.3-1.1c-0.2-0.4-0.5-0.6-0.9-0.6 s-0.7,0.2-1,0.6c-0.2,0.3-0.3,0.7-0.3,1.1c0,0.4,0.1,0.8,0.3,1.1c0.2,0.4,0.5,0.6,1,0.6c0.4,0,0.7-0.2,0.9-0.6 C53.7,11.9,53.8,11.5,53.8,11.1z"></path><path fill="#FFFFFF" d="M62.8,8.7l-1.5,4.7h-1l-0.6-2c-0.2-0.5-0.3-1-0.4-1.5l0,0c-0.1,0.5-0.2,1-0.4,1.5l-0.6,2h-1l-1.4-4.7H57 l0.5,2.2c0.1,0.5,0.2,1,0.3,1.5l0,0c0.1-0.4,0.2-0.9,0.4-1.5l0.7-2.2h0.9l0.6,2.2c0.2,0.5,0.3,1.1,0.4,1.6l0,0 c0.1-0.5,0.2-1,0.3-1.6l0.6-2.2L62.8,8.7L62.8,8.7z"></path><path fill="#FFFFFF" d="M68.2,13.4h-1v-2.7c0-0.8-0.3-1.2-0.9-1.2c-0.3,0-0.6,0.1-0.8,0.3c-0.2,0.2-0.3,0.5-0.3,0.8v2.8h-1V10 c0-0.4,0-0.9,0-1.3H65v0.7l0,0c0.1-0.2,0.3-0.4,0.5-0.6c0.3-0.2,0.6-0.3,0.9-0.3c0.4,0,0.8,0.1,1.1,0.4c0.4,0.3,0.5,0.9,0.5,1.6 v2.9H68.2z"></path><path fill="#FFFFFF" d="M71.1,13.4h-1V6.5h1V13.4z"></path><path fill="#FFFFFF" d="M77.3,11c0,0.7-0.2,1.3-0.6,1.8s-1,0.7-1.7,0.7s-1.2-0.2-1.7-0.7c-0.4-0.5-0.6-1-0.6-1.7s0.2-1.3,0.6-1.8 s1-0.7,1.7-0.7s1.2,0.2,1.7,0.7C77.1,9.8,77.3,10.3,77.3,11z M76.2,11.1c0-0.4-0.1-0.8-0.3-1.1c-0.2-0.4-0.5-0.6-0.9-0.6 s-0.7,0.2-1,0.6c-0.2,0.3-0.3,0.7-0.3,1.1c0,0.4,0.1,0.8,0.3,1.1c0.2,0.4,0.5,0.6,1,0.6c0.4,0,0.7-0.2,0.9-0.6 C76.1,11.9,76.2,11.5,76.2,11.1z"></path><path fill="#FFFFFF" d="M82.3,13.4h-0.9l-0.1-0.5l0,0c-0.3,0.4-0.8,0.7-1.4,0.7c-0.4,0-0.8-0.1-1.1-0.4c-0.2-0.3-0.4-0.6-0.4-1 c0-0.6,0.2-1,0.7-1.3s1.2-0.5,2-0.4v-0.1c0-0.6-0.3-0.9-1-0.9c-0.5,0-0.9,0.1-1.2,0.3l-0.2-0.7c0.4-0.3,1-0.4,1.6-0.4 c1.2,0,1.8,0.6,1.8,2v1.7C82.3,12.8,82.3,13.2,82.3,13.4z M81.2,11.8v-0.7c-1.2,0-1.7,0.3-1.7,1c0,0.2,0.1,0.4,0.2,0.6 c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.6-0.2c0.2-0.1,0.3-0.3,0.4-0.6C81.2,11.9,81.2,11.9,81.2,11.8z"></path><path fill="#FFFFFF" d="M88.3,13.4h-0.9v-0.8l0,0c-0.3,0.6-0.8,0.9-1.5,0.9c-0.6,0-1-0.2-1.4-0.7c-0.4-0.4-0.6-1-0.6-1.7 c0-0.8,0.2-1.4,0.6-1.9c0.4-0.4,0.9-0.7,1.5-0.7s1.1,0.2,1.3,0.6l0,0V6.4h1V12C88.2,12.6,88.3,13,88.3,13.4z M87.2,11.4v-0.8 c0-0.1,0-0.2,0-0.3C87.1,10,87,9.8,86.8,9.7c-0.2-0.2-0.4-0.3-0.7-0.3c-0.4,0-0.7,0.2-0.9,0.5c-0.2,0.3-0.3,0.7-0.3,1.2 c0,0.5,0.1,0.8,0.3,1.1c0.2,0.3,0.5,0.5,0.9,0.5c0.3,0,0.6-0.1,0.8-0.4C87.1,12.1,87.2,11.8,87.2,11.4z"></path><path fill="#FFFFFF" d="M97.2,11c0,0.7-0.2,1.3-0.6,1.8s-1,0.7-1.7,0.7s-1.2-0.2-1.7-0.7c-0.4-0.5-0.6-1-0.6-1.7s0.2-1.3,0.6-1.8 s1-0.7,1.7-0.7s1.2,0.2,1.7,0.7C97,9.8,97.2,10.3,97.2,11z M96.2,11.1c0-0.4-0.1-0.8-0.3-1.1c-0.2-0.4-0.5-0.6-0.9-0.6 s-0.7,0.2-1,0.6c-0.2,0.3-0.3,0.7-0.3,1.1c0,0.4,0.1,0.8,0.3,1.1c0.2,0.4,0.5,0.6,1,0.6c0.4,0,0.7-0.2,0.9-0.6 C96.1,11.9,96.2,11.5,96.2,11.1z"></path><path fill="#FFFFFF" d="M102.9,13.4h-1v-2.7c0-0.8-0.3-1.2-1-1.2c-0.3,0-0.6,0.1-0.8,0.3s-0.3,0.5-0.3,0.8v2.8h-1V10 c0-0.4,0-0.9,0-1.3h0.9v0.7l0,0c0.1-0.2,0.3-0.4,0.5-0.6c0.3-0.2,0.6-0.3,1-0.3s0.8,0.1,1.1,0.4c0.4,0.3,0.5,0.9,0.5,1.6v2.9 H102.9z"></path><path fill="#FFFFFF" d="M109.9,9.5h-1.2v2.3c0,0.6,0.2,0.9,0.6,0.9c0.2,0,0.3,0,0.5,0v0.8c-0.2,0.1-0.5,0.1-0.8,0.1 c-0.4,0-0.7-0.1-1-0.4c-0.2-0.3-0.4-0.7-0.4-1.3V9.5h-0.7V8.7h0.7V7.8l1-0.3v1.2h1.2L109.9,9.5L109.9,9.5z"></path><path fill="#FFFFFF" d="M115.5,13.4h-1v-2.7c0-0.8-0.3-1.3-0.9-1.3c-0.5,0-0.8,0.2-1,0.7c0,0.1,0,0.2,0,0.4v2.8h-1V6.4h1v2.8l0,0 c0.3-0.5,0.8-0.8,1.4-0.8c0.4,0,0.8,0.1,1.1,0.4c0.4,0.4,0.5,0.9,0.5,1.6C115.5,10.6,115.5,13.4,115.5,13.4z"></path><path fill="#FFFFFF" d="M121.2,10.9c0,0.2,0,0.3,0,0.5H118c0,0.5,0.2,0.8,0.5,1.1c0.3,0.2,0.6,0.3,1,0.3c0.5,0,0.9-0.1,1.3-0.2 l0.2,0.7c-0.4,0.2-1,0.3-1.6,0.3c-0.7,0-1.3-0.2-1.7-0.6c-0.4-0.4-0.6-1-0.6-1.7s0.2-1.3,0.6-1.8c0.4-0.5,1-0.8,1.6-0.8 c0.7,0,1.2,0.3,1.5,0.8C121.1,9.8,121.2,10.3,121.2,10.9z M120.2,10.6c0-0.3-0.1-0.6-0.2-0.8c-0.2-0.3-0.5-0.4-0.8-0.4 s-0.6,0.1-0.8,0.4c-0.2,0.2-0.3,0.5-0.3,0.8C118,10.6,120.2,10.6,120.2,10.6z"></path></g></g></g></svg>';
}