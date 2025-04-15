<?php
function is_logged_in(): bool
{
	$CI = &get_instance();
	if ($CI->session->userdata('current_user') == NULL) {
		return false;
	} else {
		return true;
	}
}
