<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {

	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ($template) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');
// date_default_timezone_set('Asia/Kathmandu');
define('CRUPEESOFT_THEME_DIR', dirname(__FILE__));
define('CRUPEESOFT_THEME_URL', get_template_directory_uri());

require_once CRUPEESOFT_THEME_DIR . '/inc/post_types.php'; /*including registered custom post types*/
require_once CRUPEESOFT_THEME_DIR . '/inc/taxonomy_register.php'; /*including registered custom taxonomy types*/

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		// add_action('init', array($this, 'register_post_types'));
		// add_action('init', array($this, 'register_taxonomies'));
		add_action('after_setup_theme', array($this, 'register_my_menu'));
		add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action('wp_ajax_send_email', array($this, 'callback_send_email'));
		add_action('wp_ajax_nopriv_send_email', array($this, 'callback_send_email'));
		parent::__construct();
	}
	// /** This is where you can register custom post types. */
	// public function register_post_types() {

	// }
	// /** This is where you can register custom taxonomies. */
	// public function register_taxonomies() {

	// }

	public function callback_send_email() {
		if ($_POST) {
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$emailFrom = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			$emailTo = 'srijanup@gmail.com';
			// $emailTo = 'info@crupeesoftwaredevelopment.com.np';

			$headers = array('Content-Type: text/html; charset=UTF-8');
			$headers = array();
			$headers[] = "Reply-To: {$emailFrom}";
			$headers[] = "From: {$name} <{$emailFrom}>";
			$subject = '$subject';

			$mail_sent = wp_mail($emailTo, $subject, $message, $headers);
			if ($mail_sent) {
				header('Content-Type: application/json');
				echo json_encode(array(
					'status' => 'success',
					'message' => __('Thank you.'),
				));
				$reply_subject = 'Thankyou for your message';
				$reply_email = wp_mail($emailFrom, $reply_subject, $reply_content, $headers);

			}
		} else {
			header('Content-Type: application/json');
			echo json_encode(array(
				'status' => 'success',
				'message' => __('Nice try'),
			));
		}
		die();

	}

	public function register_my_menu() {
		register_nav_menu('primary', __('Primary Menu', 'crupee'));
		register_nav_menu('secondary', __('Secondary Menu', 'crupee'));
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context($context) {
		// $context['menu'] = new Timber\Menu();
		$context['menu'] = new TimberMenu('primary');
		$context['second_menu'] = new TimberMenu('secondary');
		$context['logo'] = get_field('logo');
		$context['conntact_number'] = get_field('conntact_number');
		$context['address'] = get_field('address');
		$context['email'] = get_field('email');
		$context['facebook_url'] = get_field('facebook_url');
		$context['instagram_url'] = get_field('instagram_url');
		$context['twitter_url'] = get_field('twitter_url');
		$context['pinterest_url'] = get_field('pinterest_url');

		$context['site'] = $this;
		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
		*/
		add_theme_support('title-tag');

		/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support('post-thumbnails');

		/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support('menus');
	}

	public function load_scripts() {

		wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css');
		wp_enqueue_style('font-awesome-css', get_stylesheet_directory_uri() . '/assets/css/fontawesome-all.css');
		wp_enqueue_style('flaticons-css', get_stylesheet_directory_uri() . '/assets/css/flaticon.css');
		wp_enqueue_style('owl-css', get_stylesheet_directory_uri() . '/assets/css/owl.css');
		wp_enqueue_style('animate-css', get_stylesheet_directory_uri() . '/assets/css/animate.css');
		wp_enqueue_style('jquery-ui-css', get_stylesheet_directory_uri() . '/assets/css/jquery-ui.css');
		wp_enqueue_style('jquery-fancybox-css', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css');
		wp_enqueue_style('hover-css', get_stylesheet_directory_uri() . '/assets/css/hover.css');
		wp_enqueue_style('custom-animate-css', get_stylesheet_directory_uri() . '/assets/css/custom-animate.css');
		wp_enqueue_style('jarallax-css', get_stylesheet_directory_uri() . '/assets/css/jarallax.css');
		wp_enqueue_style('custom-style-css', get_stylesheet_directory_uri() . '/assets/css/style.css');
		wp_enqueue_style('rtl-css', get_stylesheet_directory_uri() . '/assets/css/rtl.css');
		wp_enqueue_style('responsive-css', get_stylesheet_directory_uri() . '/assets/css/responsive.css');
		wp_enqueue_style('color-default-css', get_stylesheet_directory_uri() . '/assets/css/colors/color-default.css');
		wp_enqueue_style('main-style-css', get_stylesheet_directory_uri() . '/style.css');

		wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.js');
		wp_enqueue_script('pooper-min-js', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '0.1', true);
		wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '0.1', true);
		wp_enqueue_script('TweenMax-js', get_stylesheet_directory_uri() . '/assets/js/TweenMax.js', array('jquery'), '0.1', true);
		wp_enqueue_script('jquery-ui-js', get_stylesheet_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), '0.1', true);
		wp_enqueue_script('jquery-fancybox-js', get_stylesheet_directory_uri() . '/assets/js/jquery.fancybox.js', array('jquery'), '0.1', true);
		wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/assets/js/owl.js', array('jquery'), '0.1', true);
		wp_enqueue_script('mixitup-js', get_stylesheet_directory_uri() . '/assets/js/mixitup.js', array('jquery'), '0.1', true);
		wp_enqueue_script('knob-js', get_stylesheet_directory_uri() . '/assets/js/knob.js', array('jquery'), '0.1', true);
		wp_enqueue_script('validate-js', get_stylesheet_directory_uri() . '/assets/js/validate.js', array('jquery'), '0.1', true);
		wp_enqueue_script('appear-js', get_stylesheet_directory_uri() . '/assets/js/appear.js', array('jquery'), '0.1', true);
		wp_enqueue_script('wow-js', get_stylesheet_directory_uri() . '/assets/js/wow.js', array('jquery'), '0.1', true);
		wp_enqueue_script('jquery-style-switcher-js', get_stylesheet_directory_uri() . '/assets/js/jQuery.style.switcher.min.js', array('jquery'), '0.1', true);
		wp_enqueue_script('jarallax-js', get_stylesheet_directory_uri() . '/assets/js/jarallax.min.js', array('jquery'), '0.1', true);
		wp_enqueue_script('jquery-easing-js', get_stylesheet_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '0.1', true);
		wp_enqueue_script('custom-script-js', get_stylesheet_directory_uri() . '/assets/js/custom-script.js', array('jquery'), '0.1', true);
		wp_enqueue_script('custom_js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'));

		// wp_enqueue_script('main');

	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo($text) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig($twig) {
		$twig->addExtension(new Twig\Extension\StringLoaderExtension());
		$twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new StarterSite();

if (!function_exists('pprint_r')) {
	function pprint_r($debug) {
		echo "<pre>", print_r($debug, true), "</pre>";

	}
}
