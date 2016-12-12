<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function volunteer_additional_user_meta($args) {
	?>
	<label for="shirt-size">Shirt Size (Adult Sizes)</label>
	<select name="shirt-size">
		<option value="">Choose One</option>
		<option value="XS">X-Small</option>
		<option value="S">Small</option>
		<option value="M">Medium</option>
		<option value="L">Large</option>
		<option value="XL">X-Large</option>
		<option value="XXL">XX-Large</option>
	</select>

	<label for="age">Age</label>
	<input type="number" name="age" size="3" maxlength="3"></input>

	<label for="zip-code">Zip Code</label>
	<input type="number" name="zip-code" size="5" maxlength="5"></input>

	<label for="terms">Terms and Conditions</label>
	<textarea readonly name="terms" rows="5" cols="80">I, the volunteer, and, if less than 18 years of age, my parent or guardian, intending to be legally bound, do hereby of myself, and heirs, executors, administrators and assigns, forever waive, release and discharge any and all rights, claims and actions for damages against and all persons, organizations and entities associated with the event, including but not limited to the City of Ferguson, Live Well Events, Emerson Family YMCA, Big River Race Management, any and all sponsors of the event, volunteers, and individual race organizers, arising out of or in connection with my entry in, travel to, participating in, and returning from the Ferguson Twilight 5K and 10K Run/Walk and one?mile fun run. I also give permission for the free use of my name and/or pictures in broadcasts, telecasts, newspapers, posters, advertising, etc for any future event given by one of the organizations and entities associated with the event. I understand that the entry fees are non-refundable. Sorry, no pets allowed in the 5K and 10K.</textarea>
	<p>
	<?php
}

add_action( 'wivm_end_sign_up_form_fields', 'volunteer_additional_user_meta');

function save_custom_columns($userId, $formFields) {
	update_user_meta( $userId, 'shirt-size', $formFields['shirt-size']);
	update_user_meta( $userId, 'age', $formFields['age']);
	update_user_meta( $userId, 'zip-code', $formFields['zip-code']);
}
add_action( 'wivm_create_update_user', 'save_custom_columns', 10, 2);

function custom_column_headers($cols) {
	$cols['shirt-size'] = 'Shirt Size';
	$cols['age'] = 'Age';
	$cols['zip-code'] = 'Zip Code';
	return $cols;
}
add_filter( 'wivm_volunteer_columns', 'custom_column_headers');

function custom_sortable_columns($cols) {
	$cols['shirt-size'] = array('shirt-size', false);
	$cols['age'] = array('age', false);
	$cols['zip-code'] = array('zip-code', false);
	return $cols;
}
add_filter( 'wivm_volunteer_sortable_columns', 'custom_sortable_columns');

function custom_column($output, $colName, $userId) {
	$output = get_user_meta( $userId, $colName, true );
	return $output;
}
add_filter( 'manage_volunteers_custom_column', 'custom_column', 10, 3);

function email_replacements($replacements, $user) {
	$replacements['{shirt-size}'] = get_user_meta( $user->ID, 'shirt-size', true );
	$replacements['{age}'] = get_user_meta( $user->ID, 'age', true );
	$replacements['{zip-code}'] = get_user_meta( $user->ID, 'zip-code', true );
	return $replacements;
}
add_filter ('wivm_search_and_replace_text', 'email_replacements', 10, 2);

?>
