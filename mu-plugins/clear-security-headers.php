<?php

/**
 * Plugin Name: Clear Digital Custom Security Headers
 * Description: Custom security headers for Clear Digital sites.
 * Version: 1.1
 * Author: Clear Digital
 * Author URI: https://basecamp.com/2298168/projects/18806209/todos/478208965#comment_892854055
 */

namespace ClearDigital;

class CustomSecurityHeaders
{
	public static function additional_securityheaders($headers)
	{
		if (!is_admin()) {
			$headers['Referrer-Policy']             = 'no-referrer-when-downgrade';
			$headers['X-Content-Type-Options']      = 'nosniff';
			$headers['X-XSS-Protection']            = '1; mode=block';
			$headers['Permissions-Policy']          = 'fullscreen=(self "' . trailingslashit(get_site_url()) . '"), geolocation=*, camera=()';
			$headers['X-Frame-Options']             = 'SAMEORIGIN';
			$headers['server']                      = '';
		}

		return $headers;
	}
}

add_filter('wp_headers', ['ClearDigital\CustomSecurityHeaders', 'additional_securityheaders']);
