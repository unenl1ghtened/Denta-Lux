<?php

/**
 * DentaLux functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DentaLux
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dentalux_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on DentaLux, use a find and replace
		* to change 'dentalux' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('dentalux', get_template_directory() . '/languages');

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'dentalux'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dentalux_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'dentalux_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dentalux_content_width()
{
	$GLOBALS['content_width'] = apply_filters('dentalux_content_width', 640);
}
add_action('after_setup_theme', 'dentalux_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dentalux_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'dentalux'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'dentalux'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'dentalux_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dentalux_scripts()
{
	// Подключаем стили
	wp_enqueue_style('dentalux-style', get_stylesheet_uri(), array(), _S_VERSION);

	// Подключаем сторонние стили (Bootstrap, AOS и другие)
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
	wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome-free/css/all.min.css');
	wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css');
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');

	// Подключаем основной стиль сайта
	wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');

	// Подключаем шрифты (используем Google Fonts)
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&family=Poppins:wght@100;200;300;400;500;600;700&family=Raleway:wght@100;200;300;400;500;600;700&display=swap', false, null);

	// Подключаем скрипты
	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), null, true);
	wp_enqueue_script('validate', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), null, true);
	wp_enqueue_script('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), null, true);
	wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), null, true);
	wp_enqueue_script('purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), null, true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), null, true);

	// Основной JS файл
	wp_enqueue_script('translate', get_template_directory_uri() . '/assets/js/translate.js', array(), null, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);

	// Подключаем скрипт для комментариев, если это одиночная запись
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'dentalux_scripts');

// Регистрация меню
function register_my_menus()
{
	register_nav_menus(
		array(
			'main_menu' => 'Главное меню',
			'footer_menu_1' => 'Колонка 1',
			'footer_menu_2' => 'Колонка 2',
		)
	);
}
add_action('after_setup_theme', 'register_my_menus');

// Тип записи для Услуг
function create_service_post_type()
{
	register_post_type(
		'service',
		array(
			'labels' => array(
				'name' => 'Услуги',
				'singular_name' => 'Услуга',
				'add_new' => 'Добавить Услугу',
				'add_new_item' => 'Добавить новую услугу',
				'edit_item' => 'Редактировать услугу',
				'new_item' => 'Новая услуга',
				'view_item' => 'Посмотреть услугу',
				'search_items' => 'Поиск услуг',
				'not_found' => 'Услуги не найдены',
				'not_found_in_trash' => 'Услуги в корзине не найдены',
				'all_items' => 'Все услуги',
				'archives' => 'Архив услуг',
				'insert_into_item' => 'Вставить в услугу',
				'uploaded_to_this_item' => 'Загружено для этой услуги',
				'menu_name' => 'Услуги',
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array('category', 'post_tag'),
			'menu_icon' => 'dashicons-admin-tools',
		)
	);
}
add_action('init', 'create_service_post_type');

// Подключение шорткодов из папки 'shortcodes'
function load_custom_shortcodes()
{
	$shortcodes_dir = get_template_directory() . '/shortcodes/';

	foreach (glob($shortcodes_dir . "*.php") as $shortcode_file) {
		require_once($shortcode_file);
	}
}
add_action('init', 'load_custom_shortcodes');

// Регистрация шорткода
function register_custom_shortcodes()
{
	add_shortcode('custom_contact_section', 'custom_contact_section');
}
add_action('init', 'register_custom_shortcodes');

// хлебные крошки
function kama_breadcrumbs($sep = ' / ', $l10n = [], $args = [])
{
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs($sep, $l10n, $args);
}

class Kama_Breadcrumbs
{

	public $arg;

	// Localisation
	static $l10n = [
		'home'       => 'Главная',
		'paged'      => 'Страница %d',
		'_404'       => 'Ошибка 404',
		'search'     => 'Результаты поиска по запросу - <b>%s</b>',
		'author'     => 'Архив автора: <b>%s</b>',
		'year'       => 'Архив за <b>%d</b> год',
		'month'      => 'Архив за: <b>%s</b>',
		'day'        => '',
		'attachment' => 'Медиа: %s',
		'tag'        => 'Записи по метке: <b>%s</b>',
		'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
		// tax_tag will output: 'post_type from "taxonomy_name" by tag: term_name'.
		// If separate placeholders are needed, for example, only the term name, write like this: 'posts by tag: %3$s'
	];

	// Default parameters
	static $args = [
		// Display breadcrumbs on the front page
		'on_front_page'   => true,
		// Show the post title at the end (last element). For posts, pages, attachments
		'show_post_title' => true,
		// Show the taxonomy item title at the end (last element). For tags, categories, and other taxonomies
		'show_term_title' => true,
		// Template for the last title. If enabled: show_post_title or show_term_title
		'title_patt'      => '<span class="kb_title">%s</span>',
		// Show the last separator when the title at the end is not displayed
		'last_sep'        => true,
		// 'markup' - microdata. Can be: 'rdf.data-vocabulary.org', 'schema.org', '' - without microdata
		// Or you can specify your own markup array:
		// array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
		'markup'          => 'schema.org',
		// Priority taxonomies, needed when a post is in multiple taxonomies
		'priority_tax'    => ['category'],
		// 'priority_terms' - priority items of taxonomies when a post is in multiple items of the same taxonomy at the same time.
		// For example: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
		// 'category' - taxonomy for which priority items are specified: 45 - term ID and 'term_name' - label.
		// The order of 45 and 'term_name' matters: the earlier, the more important. All specified terms are more important than unspecified ones...
		'priority_terms'  => [],
		// Add rel=nofollow to links?
		'nofollow'        => false,

		// Service
		'sep'             => '',
		'linkpatt'        => '',
		'pg_end'          => '',
	];

	function get_crumbs($sep, $l10n, $args)
	{
		global $post, $wp_post_types;

		self::$args['sep'] = $sep;

		// Filters the defaults and merges
		$loc = (object) array_merge(apply_filters('kama_breadcrumbs_default_loc', self::$l10n), $l10n);
		$arg = (object) array_merge(apply_filters('kama_breadcrumbs_default_args', self::$args), $args);

		$arg->sep = '<span class="kb_sep">' . $arg->sep . '</span>'; // supplement

		// simplify
		$sep = &$arg->sep;
		$this->arg = &$arg;

		// micro-markup ---
		if (1) {
			$mark = &$arg->markup;

			// Default markup
			if (! $mark) {
				$mark = [
					'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
					'linkpatt'  => '<a href="%s">%s</a>',
					'sep_after' => '',
				];
			}
			// rdf
			elseif ($mark === 'rdf.data-vocabulary.org') {
				$mark = [
					'wrappatt'  => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
					'linkpatt'  => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
					'sep_after' => '</span>', // close span after the separator!
				];
			}
			// schema.org
			elseif ($mark === 'schema.org') {
				$mark = [
					'wrappatt'  => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
					'linkpatt'  => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
					'sep_after' => '',
				];
			} elseif (! is_array($mark)) {
				die(__CLASS__ . ': "markup" parameter must be array...');
			}

			$wrappatt = $mark['wrappatt'];
			$arg->linkpatt = $arg->nofollow ? str_replace('<a ', '<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
			$arg->sep .= $mark['sep_after'] . "\n";
		}

		$linkpatt = $arg->linkpatt; // simplify

		$q_obj = get_queried_object();

		// maybe it's an empty archive of the tax
		$ptype = null;
		if (! $post) {
			if (isset($q_obj->taxonomy)) {
				$ptype = $wp_post_types[get_taxonomy($q_obj->taxonomy)->object_type[0]];
			}
		} else {
			$ptype = $wp_post_types[$post->post_type];
		}

		// paged
		$arg->pg_end = '';
		$paged_num = get_query_var('paged') ?: get_query_var('page');
		if ($paged_num) {
			$arg->pg_end = $sep . sprintf($loc->paged, (int) $paged_num);
		}

		$pg_end = $arg->pg_end; // simplify

		$out = '';

		if (is_front_page()) {
			return $arg->on_front_page ? sprintf($wrappatt, ($paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home)) : '';
		}
		// post page when a separate page is set for the main page.
		elseif (is_home()) {
			$out = $paged_num ? (sprintf($linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title)) . $pg_end) : esc_html($q_obj->post_title);
		} elseif (is_404()) {
			$out = $loc->_404;
		} elseif (is_search()) {
			$out = sprintf($loc->search, esc_html($GLOBALS['s']));
		} elseif (is_author()) {
			$tit = sprintf($loc->author, esc_html($q_obj->display_name));
			$out = ($paged_num ? sprintf($linkpatt, get_author_posts_url($q_obj->ID, $q_obj->user_nicename) . $pg_end, $tit) : $tit);
		} elseif (is_year() || is_month() || is_day()) {
			$y_url = get_year_link($year = get_the_time('Y'));

			if (is_year()) {
				$tit = sprintf($loc->year, $year);
				$out = ($paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit);
			}
			// month day
			else {
				$y_link = sprintf($linkpatt, $y_url, $year);
				$m_url = get_month_link($year, get_the_time('m'));

				if (is_month()) {
					$tit = sprintf($loc->month, get_the_time('F'));
					$out = $y_link . $sep . ($paged_num ? sprintf($linkpatt, $m_url, $tit) . $pg_end : $tit);
				} elseif (is_day()) {
					$m_link = sprintf($linkpatt, $m_url, get_the_time('F'));
					$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
				}
			}
		}
		// Hierarchical posts
		elseif (is_singular() && $ptype->hierarchical) {
			$out = $this->_add_title($this->_page_crumbs($post), $post);
		}
		// Taxonomies, flat posts, and attachments
		else {
			$term = $q_obj; // taxonomies

			// define a term for posts (including attachments)
			if (is_singular()) {
				// modify $post to define the term for the parent of the attachment
				if (is_attachment() && $post->post_parent) {
					$save_post = $post; // сохраним
					$post = get_post($post->post_parent);
				}

				// takes into account if attachments are attached to hierarchical taxonomies - it happens :)
				$taxonomies = get_object_taxonomies($post->post_type);
				// let's leave only hierarchical and public, just in case....
				$taxonomies = array_intersect($taxonomies, get_taxonomies([
					'hierarchical' => true,
					'public'       => true,
				]));

				if ($taxonomies) {
					// sort by priority
					if (! empty($arg->priority_tax)) {

						usort($taxonomies, static function ($a, $b) use ($arg) {
							$a_index = array_search($a, $arg->priority_tax);
							if ($a_index === false) {
								$a_index = 9999999;
							}

							$b_index = array_search($b, $arg->priority_tax);
							if ($b_index === false) {
								$b_index = 9999999;
							}

							return ($b_index === $a_index) ? 0 : ($b_index < $a_index ? 1 : -1); // меньше индекс - выше
						});
					}

					// try to get the terms, in order of tax priority
					foreach ($taxonomies as $taxname) {

						if ($terms = get_the_terms($post->ID, $taxname)) {
							// проверим приоритетные термины для таксы
							$prior_terms = &$arg->priority_terms[$taxname];

							if ($prior_terms && count($terms) > 2) {

								foreach ((array) $prior_terms as $term_id) {
									$filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
									$_terms = wp_list_filter($terms, [$filter_field => $term_id]);

									if ($_terms) {
										$term = array_shift($_terms);
										break;
									}
								}
							} else {
								$term = array_shift($terms);
							}

							break;
						}
					}
				}

				// revert back (for attachments)
				if (isset($save_post)) {
					$post = $save_post;
				}
			}

			// output

			// terms or post of any type with terms
			if ($term && isset($term->term_id)) {
				$term = apply_filters('kama_breadcrumbs_term', $term);

				// attachment
				if (is_attachment()) {
					if (! $post->post_parent) {
						$out = sprintf($loc->attachment, esc_html($post->post_title));
					} else {
						if (! $out = apply_filters('attachment_tax_crumbs', '', $term, $this)) {
							$_crumbs = $this->_tax_crumbs($term, 'self');
							$parent_tit = sprintf($linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent));
							$_out = implode($sep, [$_crumbs, $parent_tit]);
							$out = $this->_add_title($_out, $post);
						}
					}
				}
				// single
				elseif (is_single()) {
					if (! $out = apply_filters('post_tax_crumbs', '', $term, $this)) {
						$_crumbs = $this->_tax_crumbs($term, 'self');
						$out = $this->_add_title($_crumbs, $post);
					}
				}
				// non-hierarchical taxonomy (tags)
				elseif (! is_taxonomy_hierarchical($term->taxonomy)) {
					// метка
					if (is_tag()) {
						$out = $this->_add_title('', $term, sprintf($loc->tag, esc_html($term->name)));
					}
					// taxonomy
					elseif (is_tax()) {
						$post_label = $ptype->labels->name;
						$tax_label = $GLOBALS['wp_taxonomies'][$term->taxonomy]->labels->name;
						$out = $this->_add_title('', $term, sprintf($loc->tax_tag, $post_label, $tax_label, esc_html($term->name)));
					}
				}
				// hierarchical taxonomy (category)
				elseif (! $out = apply_filters('term_tax_crumbs', '', $term, $this)) {
					$_crumbs = $this->_tax_crumbs($term, 'parent');
					$out = $this->_add_title($_crumbs, $term, esc_html($term->name));
				}
			}
			// attachments (of post) without terms
			elseif (is_attachment()) {
				$parent = get_post($post->post_parent);
				$parent_link = sprintf($linkpatt, get_permalink($parent), esc_html($parent->post_title));
				$_out = $parent_link;

				// attachment of post with hierarchical type
				if (is_post_type_hierarchical($parent->post_type)) {
					$parent_crumbs = $this->_page_crumbs($parent);
					$_out = implode($sep, [$parent_crumbs, $parent_link]);
				}

				$out = $this->_add_title($_out, $post);
			}
			// posts without terms
			elseif (is_singular()) {
				$out = $this->_add_title('', $post);
			}
		}

		// replacement of link to post type archive page
		$home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype);

		if ('' === $home_after) {
			// A link to the archive page of a post type for:
			// individual pages of that type; archives of that type; taxonomies associated with that type.
			if (
				$ptype && $ptype->has_archive && ! in_array($ptype->name, ['post', 'page', 'attachment'])
				&& (is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)))
			) {
				$pt_title = $ptype->labels->name;

				// first page of the post type archive
				if (is_post_type_archive() && ! $paged_num) {
					$home_after = sprintf($this->arg->title_patt, $pt_title);
				}
				// singular, paged post_type_archive, tax
				else {
					$home_after = sprintf($linkpatt, get_post_type_archive_link($ptype->name), $pt_title);

					$home_after .= (($paged_num && ! is_tax()) ? $pg_end : $sep); // pagination
				}
			}
		}

		$before_out = sprintf($linkpatt, home_url(), $loc->home) . ($home_after ? $sep . $home_after : ($out ? $sep : ''));

		$out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg);

		$out = sprintf($wrappatt, $before_out . $out);

		return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg);
	}

	function _page_crumbs($post)
	{
		$parent = $post->post_parent;

		$crumbs = [];
		while ($parent) {
			$page = get_post($parent);
			$crumbs[] = sprintf($this->arg->linkpatt, get_permalink($page), esc_html($page->post_title));
			$parent = $page->post_parent;
		}

		return implode($this->arg->sep, array_reverse($crumbs));
	}

	function _tax_crumbs($term, $start_from = 'self')
	{
		$termlinks = [];
		$term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
		while ($term_id) {
			$term = get_term($term_id, $term->taxonomy);
			$termlinks[] = sprintf($this->arg->linkpatt, get_term_link($term), esc_html($term->name));
			$term_id = $term->parent;
		}

		if ($termlinks) {
			return implode($this->arg->sep, array_reverse($termlinks));
		}

		return '';
	}

	/**
	 * Adds a title to the passed text, taking into account all options.
	 * Adds a delimiter at the beginning, if necessary.
	 *
	 * @param string $add_to
	 * @param object $obj
	 * @param string $term_title
	 *
	 * @return string
	 */
	function _add_title($add_to, $obj, $term_title = '')
	{

		// simplify.
		$arg = &$this->arg;

		// $term_title is cleaned separately, HTML tags can be inside.
		$title = $term_title ?: esc_html($obj->post_title);
		$show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

		// pagination
		if ($arg->pg_end) {
			$link = $term_title ? get_term_link($obj) : get_permalink($obj);
			$add_to .= ($add_to ? $arg->sep : '') . sprintf($arg->linkpatt, $link, $title) . $arg->pg_end;
		}
		// add sep
		elseif ($add_to) {
			if ($show_title) {
				$add_to .= $arg->sep . sprintf($arg->title_patt, $title);
			} elseif ($arg->last_sep) {
				$add_to .= $arg->sep;
			}
		}
		// sep will be later...
		elseif ($show_title) {
			$add_to = sprintf($arg->title_patt, $title);
		}

		return $add_to;
	}
}
