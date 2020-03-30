<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme = wp_get_theme('storefront');
$storefront_version = $theme['Version'];

//require_once __DIR__ . '/inc/woocommerce_functions.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 980; /* pixels */
}

$storefront = (object)array(
    'version'    => $storefront_version,

    /**
     * Initialize all the things.
     */
    'main'       => require 'inc/class-storefront.php',
    'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if (class_exists('Jetpack')) {
    $storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if (storefront_is_woocommerce_activated()) {
    $storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

    //require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
    //require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if (is_admin()) {
    $storefront->admin = require 'inc/admin/class-storefront-admin.php';

    require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if (version_compare(get_bloginfo('version'), '4.7.3', '>=') && (is_admin() || is_customize_preview())) {
    require 'inc/nux/class-storefront-nux-admin.php';
    require 'inc/nux/class-storefront-nux-guided-tour.php';

    if (defined('WC_VERSION') && version_compare(WC_VERSION, '3.0.0', '>=')) {
        require 'inc/nux/class-storefront-nux-starter-content.php';
    }
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


// numbered pagination
function pagination($pages = '', $range = 3)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="section-pagination">';
        echo '<div class="container section-pagination__container">';
        echo '<ul class="pagination section-pagination__pagination">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo "<li class=\"pagination__item\"><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        }
        if ($paged > 1 && $showitems < $pages) {
            echo "<li class=\"pagination__item\"><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                if ($paged == $i) {
                    echo "<li class=\"pagination__item pagination__item_active\">" . $i . "</li>";
                } else {
                    echo "<li class=\"pagination__item\"><a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a></li>";
                };
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo "<li class=\"pagination__item\"><a href=\"" . get_pagenum_link($paged + 1) . "\">&rsaquo;</a></li>";
        };
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo "<li class=\"pagination__item\"><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        }
        echo "</ul>\n";
        echo "</div>\n";
        echo "</div>\n";
    }
}


require_once __DIR__ . '/inc/ProductCatsContainer.php';

function isNewsListPage()
{
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
    if ($categories[0]->parent == 19) {
        return true;
    }

    return false;
}

/** ВЫВОДИМ ТЕКСТОВЫЙ РЕДАКТОР в редактировать категории **/
function my_category_description($container = '')
{
    $content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
    $editor_id = 'tag_description';
    $settings = 'description';
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="description">Описание...</label></th>
        <td><?php wp_editor($content, $editor_id, array(
                'textarea_name' => $settings,
                'editor_css'    => '<style>.html-active .wp-editor-area{border:0;}</style>',
            )); ?><br/>
            <span class="description">Описание по умолчанию обычно не отображается! <br/> однако - некоторые темы могут его показывать</span>
        </td>
    </tr>
    <?php
}

remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('term_description', 'wp_kses_data');
/** фин: редактор в полях - убираем старое поле редактирования **/
function my_remove_category_description()
{
    global $mk_description;
    if ($mk_description->id == 'edit-category' or 'edit-tag') {
        ?>
        <script type="text/javascript">
            jQuery(function ($) {
                $('textarea#description').closest('tr.form-field').remove();
            });
        </script>
        <?php
    }
}

add_action('admin_head', 'my_remove_category_description');           // фильтр старого поля - скрываем
/** убираем старое поле редактирования **/
add_filter('edit_category_form_fields', 'my_category_description');   // для категорий-рубрик
add_filter('edit_tag_form_fields', 'my_category_description');        // для меток-тегов
/** ФИН - выводим текстовый редактор в редактировать категории **/


/*-------------MAIN------------*/
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(['page_title' => __('My Options')]);

}


/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2018.10.05
 * лицензия: MIT
*/
function dimox_breadcrumbs()
{

    /* === ОПЦИИ === */
    $text['home'] = 'Интернет магазин туристического снаряжения'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статьи автора %s'; // текст для страницы автора
    $text['404'] = 'Ошибка 404'; // текст для страницы 404
    $text['page'] = 'Страница %s'; // текст 'Страница N'
    $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
    $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
    //$sep = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
    $before = '<span class="breadcrumbs__current breadcrumbs__item_last">'; // тег перед текущей "крошкой"
    $after = '</span>'; // тег после текущей "крошки"

    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_url = home_url('/');
    $link = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link .= '<a class="breadcrumbs__item" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link .= '<meta itemprop="position" content="%3$s" />';
    $link .= '</span>';
    $parent_id = ($post) ? $post->post_parent : '';
    $home_link = sprintf($link, $home_url, $text['home'], 1);

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ($show_home_link) {
            $position += 1;
            echo $home_link;
        }

        if (!isset($sep)) {
            $sep = '';
        }

        if (is_category()) {
            $parents = get_ancestors(get_query_var('cat'), 'category');
            foreach (array_reverse($parents) as $cat) {
                $position += 1;
                if ($position > 1) echo $sep;
                echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
            }
            if (get_query_var('paged')) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) {
                    if ($position >= 1) echo $sep;
                    echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
                } elseif ($show_last_sep) echo $sep;
            }

        } elseif (is_search()) {
            if ($show_home_link && $show_current || !$show_current && $show_last_sep) echo $sep;
            if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif (is_year()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;
            elseif ($show_home_link && $show_last_sep) echo $sep;

        } elseif (is_month()) {
            if ($show_home_link) echo $sep;
            $position += 1;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position);
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;
            elseif ($show_last_sep) echo $sep;

        } elseif (is_day()) {
            if ($show_home_link) echo $sep;
            $position += 1;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position) . $sep;
            $position += 1;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'), $position);
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;
            elseif ($show_last_sep) echo $sep;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $position += 1;
                $post_type = get_post_type_object(get_post_type());
                if ($position > 1) echo $sep;
                echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
                elseif ($show_last_sep) echo $sep;
            } else {
                $cat = get_the_category();
                $catID = $cat[0]->cat_ID;
                $parents = get_ancestors($catID, 'category');
                $parents = array_reverse($parents);
                $parents[] = $catID;
                foreach ($parents as $cat) {
                    $position += 1;
                    if ($position > 1) echo $sep;
                    echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
                }
                if (get_query_var('cpage')) {
                    $position += 1;
                    echo $sep . sprintf($link, get_permalink(), get_the_title(), $position);
                    echo $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $sep . $before . get_the_title() . $after;
                    elseif ($show_last_sep) echo $sep;
                }
            }

        } elseif (is_post_type_archive()) {
            $post_type = get_post_type_object(get_post_type());
            if (get_query_var('paged')) {
                $position += 1;
                if ($position > 1) echo $sep;
                echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label, $position);
                echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . $post_type->label . $after;
                elseif ($show_home_link && $show_last_sep) echo $sep;
            }

        } elseif (is_attachment()) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $catID = $cat[0]->cat_ID;
            $parents = get_ancestors($catID, 'category');
            $parents = array_reverse($parents);
            $parents[] = $catID;
            foreach ($parents as $cat) {
                $position += 1;
                if ($position > 1) echo $sep;
                echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
            }
            $position += 1;
            echo $sep . sprintf($link, get_permalink($parent), $parent->post_title, $position);
            if ($show_current) echo $sep . $before . get_the_title() . $after;
            elseif ($show_last_sep) echo $sep;


        } elseif (is_tag()) {
            if (get_query_var('paged')) {
                $position += 1;
                $tagID = get_query_var('tag_id');
                echo $sep . sprintf($link, get_tag_link($tagID), single_tag_title('', false), $position);
                echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                elseif ($show_home_link && $show_last_sep) echo $sep;
            }

        } elseif (is_author()) {
            $author = get_userdata(get_query_var('author'));
            if (get_query_var('paged')) {
                $position += 1;
                echo $sep . sprintf($link, get_author_posts_url($author->ID), sprintf($text['author'], $author->display_name), $position);
                echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
                elseif ($show_home_link && $show_last_sep) echo $sep;
            }

        } elseif (is_404()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;
            elseif ($show_last_sep) echo $sep;

        } elseif (has_post_format() && !is_singular()) {
            if ($show_home_link && $show_current) echo $sep;
            echo get_post_format_string(get_post_format());
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()


add_filter('loop_shop_per_page', function ($cols) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 9;
}, 20);

register_sidebar(array(
    'name'          => 'Фильтры',
    'id'            => "sidebar_filter",
    'description'   => 'Фильтры',
    'before_widget' => '<div id="%1$s" class="slide-box section-category__filter widget %2$s">',
    'after_widget'  => "</div>\n",
    'before_title'  => '<div class="slide-box__header"><p class="caption">',
    'after_title'   => "</p><div class='slide-box__toggle toggle'><div class='toggle__line'></div><div class='toggle__line'></div></div></div>\n",
));


/*
add_filter('woocommerce_product_add_to_cart_text', 'my_woocommerce_variable_text_button', 10, 2);
function my_woocommerce_variable_text_button($text, $product)
{

    if ($product->product_type == 'variable') {
		$text = lang('Купить', 'Купити');       
    }

    return $text;
}
*/

// убираем классы со стр. поиска, так как они ламали верстку
add_filter('body_class', 'alter_search_classes');
function alter_search_classes($classes)
{
    if (is_search()) {
        return array();
    } else {
        return $classes;
    }

}

//добавление alt и title для миниатюр записей start
function wph_alt_title_for_thumbnail($html)
{
    $post_title = esc_attr(get_the_title());
    //добавляем alt
    $html = preg_replace('/(alt=")(.*?)(")/i', '$1' . $post_title . '$3', $html);
    //добавляем title
    $html = str_replace('/>', 'title="Фотография ' . $post_title . '" />', $html);
    return $html;
}

add_filter('post_thumbnail_html', 'wph_alt_title_for_thumbnail', 10, 1);
//добавление alt и title для миниатюр записей end

//add_filter('woocommerce_get_catalog_ordering_args', 'my_woocommerce_order');
//function my_woocommerce_order($args){
// $args['meta_key']='_stock_status';
// $args['orderby']='meta_value';
// $args['order']='asc';
// return $args;
//}


//Exclude pages from WordPress Search
if (!is_admin()) {
    /**
     * @param WP_Query $query
     * @return mixed
     */
    function wpb_search_filter($query)
    {
        if ($query->is_search) {
            $query->set('post_type', 'product');
//            if (isset($_GET['search_desc']) && $_GET['search_desc'] == 'on') {
//                add_filter( 'posts_where', 'search_posts_where' );
//            }

        }
        return $query;
    }

    add_filter('pre_get_posts', 'wpb_search_filter');

    /**
     * Add Custom Join Code for wp_mostmeta table
     * @param  string $join
     * @return string
     */
//    function search_posts_where($where)
//    {
//        global $wpdb;
//
////        return $where . ' AND content LIKE %' . $_GET['s'] . '% ';
////        $where .= ' AND ' . $wpdb->prefix . 'posts.post_content LIKE "%' . $_GET['s'] . '%" ';
////        $where .= " AND LENGTH({$wpdb->prefix}posts.post_content) > 1";
////        var_dump($where);die;
//        return $where;
//    }


    function __search_by_title_only($search, &$wp_query)
    {
        global $wpdb;
        if (empty($search))
            return $search; // skip processing - no search term in query
        $q = $wp_query->query_vars;
        $n = !empty($q['exact']) ? '' : '%';
        $search =
        $searchand = '';
        foreach ((array)$q['search_terms'] as $term) {
            $term = esc_sql(like_escape($term));
            if (isset($_GET['search_desc']) && $_GET['search_desc'] == 'on') {
                $search .= "{$searchand}($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
            } else {
                $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            }
            $searchand = ' AND ';
        }
        if (!empty($search)) {
            $search = " AND ({$search}) ";
            if (!is_user_logged_in())
                $search .= " AND ($wpdb->posts.post_password = '') ";
        }
        return $search;
    }

    if (isset($_GET['search_desc']) && $_GET['search_desc'] == 'on') {
        add_filter('posts_search', '__search_by_title_only', 500, 2);
    } else {

    }

}

//От А до Я
add_filter('woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args');

function custom_woocommerce_get_catalog_ordering_args($args)
{
//    var_dump($args);die;
    $orderby_value = isset($_GET['orderby'])
        ? woocommerce_clean($_GET['orderby'])
        : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));

    if ($orderby_value == 'name_list') {
        $args['orderby'] = array(
            '_stock_status' => 'ASC',
            'title'         => 'ASC',
        );
        $args['meta_key'] = '_stock_status';

        //От Я до А
    } else if ($orderby_value == 'name_list_2') {
        $args['orderby'] = array(
            '_stock_status' => 'ASC',
            'title'         => 'DESC',
        );
        $args['meta_key'] = '_stock_status';
    } else if ($orderby_value == 'price') {
//        $args['order'] = 'asc';
//        $args['orderby'] = 'meta_value_num';
//        $args['meta_key'] = '_price';
//        return $args;

        //$args['orderby'] = " _stock_status ASC price_query.price DESC";

        $args['orderby'] = [
            '_stock_status'     => 'ASC',
            'price_query.price' => 'ASC',
        ];
        $args['meta_key'] = '_stock_status';
        return $args;
    } else if ($orderby_value == 'price-desc') {
        //$args['orderby'] = " _stock_status ASC price_query.price DESC";

        $args['orderby'] = [
            '_stock_status'     => 'ASC',
            'price_query.price' => 'DESC',
        ];
        $args['meta_key'] = '_stock_status';
        return $args;
    } else {
        //Товары по алфавиту по умолчанию
        $args['orderby'] = array(
            '_stock_status' => 'ASC',
            'title'         => 'ASC',
        );
        $args['meta_key'] = '_stock_status';
        return $args;
    }

    return $args;
}

add_filter('woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby');
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby');

function custom_woocommerce_catalog_orderby($sortby)
{
    $sortby['name_list'] = 'Сортировать от А до Я';
    $sortby_z['name_list_2'] = 'Сортировать от Я до А';
    return $sortby;
}


function wpsf_orderby($query)
{
    if (is_category()) {
        remove_action('pre_get_posts', __FUNCTION__);
        add_filter('posts_orderby', function () {
            return ' post_title ASC';
        });
    }
}

add_action('pre_get_posts', 'wpsf_orderby');


add_filter('woocommerce_checkout_redirect_empty_cart', 'filter_function_name_8050');
function filter_function_name_8050($true)
{
    return false;
}


wp_enqueue_script('select2-js', '/wp-content/themes/storefront/js/select2.min.js', [], false, true);
require_once __DIR__ . '/NovaposhtaAPI.php';
// Change "city" checkout billing and shipping fields to a dropdown
add_filter('woocommerce_checkout_fields', 'override_checkout_city_fields');
function override_checkout_city_fields($fields)
{
    ($fields['billing']['billing_first_name']['required'] = true);
    $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods', []);

    if (
        // if Доставка на склад Новой почты
        in_array('free_shipping:1', $chosen_shipping_methods) ||
        // if Доставка курьерской службы НОВОЙ ПОЧТЫ
        in_array('free_shipping:2', $chosen_shipping_methods)
    ) {
        $option_cities = [
                '' => __('Выберите населенный пункт'),
            ] + NovaposhtaAPI::getInstance()->getCities();

        $fields['billing']['billing_city']['type'] = 'select';
        $fields['billing']['billing_city']['options'] = $option_cities;
        $fields['shipping']['shipping_city']['type'] = 'select';
        $fields['shipping']['shipping_city']['options'] = $option_cities;

        $curCity = false;
        if (isset($_POST['city']) && !empty($_POST['city'])) {
            $curCity = $_POST['city'];
        } else if ((WC()->session->get('customer')) && isset(WC()->session->get('customer')['city'])) {
            $curCity = WC()->session->get('customer')['city'];
        }

        if ($curCity) {
            $option_2 = NovaposhtaAPI::getInstance()->getWarehouses($curCity);
            $fields['billing']['billing_postcode']['type'] = 'select';
            $fields['billing']['billing_postcode']['options'] = $option_2;

//            var_dump(WC()->customer);die;
            if (isset($_POST['post_data'])) {
                parse_str($_POST['post_data'], $output);
                $fields['billing']['billing_postcode']['default'] = $output['billing_postcode'];
            }
        }
    } else if (
    in_array('free_shipping:3', $chosen_shipping_methods)
    ) {
        $fields['billing']['billing_city']['label'] = 'Адрес';// меняем Город на Адрес
        unset($fields['billing']['billing_address_1']);
    }


    return $fields;
}


function trim_title_chars($count, $after)
{
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title, 0, $count);
    else $after = '';
    echo $title . $after;
}


add_filter('woocommerce_currency_symbol', 'misha_symbol_to_bukvi', 9999, 2);

function misha_symbol_to_bukvi($valyuta_symbol, $valyuta_code)
{
    if ($valyuta_code === 'UAH') {
        return 'грн';
    }

    return $valyuta_symbol;
}

add_filter('woocommerce_get_order_item_totals', 'adjust_woocommerce_get_order_item_totals');

function adjust_woocommerce_get_order_item_totals($totals)
{
    unset($totals['cart_subtotal']);
    return $totals;
}

add_action('admin_menu', 'remove_menus');
function remove_menus()
{

    remove_menu_page('edit.php');                                 // Записи
    remove_menu_page('upload.php');                             // Медиафайлы
    remove_menu_page('themes.php');                                 // Внешний вид
    remove_menu_page('plugins.php');                             // Плагины
    remove_menu_page('users.php');                                 // Пользователи
    remove_menu_page('tools.php');                                 // Инструменты
    remove_menu_page('edit.php?post_type=acf-field-group');         // Группа полей
    remove_menu_page('wpcf7');                                     //Контактная форма
}

add_filter('woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text');
function jk_change_breadcrumb_home_text($defaults)
{
// изменится с ‘Home’ на ‘Интернет магазин туристического снаряжения Kelt’
    $defaults['home'] = 'Интернет магазин туристического снаряжения Kelt';
    return $defaults;
}

// Добавление микроразметки в категорию товаров
add_action('woocommerce_after_shop_loop', 'action_function_micro_marking');
function action_function_micro_marking()
{
    if (is_product_category()) {
        echo '
            <script type="application/ld+json">
                {
                 "@context":"http://schema.org",
                 "@type":"ItemList",
                 "itemListElement":[';
        $cnt = 1;
        global $wp_query;
        $totalPosts = $wp_query->post_count;

        if (have_posts()) {
            while (have_posts()) : the_post();
                $url = get_permalink();
                echo '{
                            "@type":"ListItem",
                            "position":' . $cnt . ',
                            "url":"' . $url . '"';
                if ($cnt != $totalPosts) {
                    echo '},';
                } else {
                    echo '}';
                }

                $cnt++;
            endwhile;
        }
        echo ']
            }
    </script>';
    }
}

add_filter('wpseo_title', 'my_wpseo_title');
function my_wpseo_title($title)
{
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $paged = $url;
    $page = explode("/", $paged);
    $page = $page[count($page) - 2];
    if (strpos($url, '/news/page/') !== false) {
        $title = $title . ' - Cтраница ' . $page;
        return $title;
    } else {
        $title = str_replace(' - Страница 1', '', $title);
        return $title;
    }
}

// define the wpseo_metadesc callback
function filter_wpseo_metadesc($wpseo_replace_vars)
{
    // make filter magic happen here... 
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $paged = $url;
    $page = explode("/", $paged);
    $page = $page[count($page) - 2];
    if (strpos($url, '/news/page/') !== false) {
        $wpseo_replace_vars = $wpseo_replace_vars . ' - Cтраница ' . $page;
        return $wpseo_replace_vars;
    } else {
        $wpseo_replace_vars = str_replace(' - Страница 1', '', $wpseo_replace_vars);
        return $wpseo_replace_vars;
    }


}

// add the filter 
add_filter('wpseo_metadesc', 'filter_wpseo_metadesc', 10, 1);


// функция добавления номера стр (использую на стр. всех товаров бренда
function pages()
{
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $paged = $url;
    $page = explode("/", $paged);
    $page = $page[count($page) - 2];
    echo $page;
}


function urls()
{
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $paged = $url;
    $page = explode("/?", $paged);
    $newurl = $page[0];
    echo $newurl;
}

add_action('woocommerce_product_data_panels', 'gowp_global_variation_price');
function gowp_global_variation_price()
{
    global $woocommerce;
    ?>
    <script type="text/javascript">
        function addVariationLinks() {
            a = jQuery('<a href="#">Apply to all Variations</a>');
            b = jQuery('input[name^="variable_regular_price"].wc_input_price');
            a.click(function (c) {
                d = jQuery(this).parent('label').next('input[name^="variable_regular_price"].wc_input_price').val();
                e = confirm("Change the price of all variations to " + d + "?");
                if (e) b.val(d).trigger('change');
                c.preventDefault();
            });
            b.prev('label').append(" ").append(a);
            aa = jQuery('<a href="#">Apply to all Variations</a>');
            bb = jQuery('input[name^="variable_sale_price"].wc_input_price');
            aa.click(function (cc) {
                dd = jQuery(this).parent('label').next('input[name^="variable_sale_price"].wc_input_price').val();
                ee = confirm("Change the price of all variations to " + dd + "?");
                if (ee) bb.val(dd).trigger('change');
                cc.preventDefault();
            });
            bb.prev('label').append(" ").append(aa);
        }
        <?php if ( version_compare($woocommerce->version, '2.4', '>=') ) : ?>
        jQuery(document).ready(function () {
            jQuery(document).ajaxComplete(function (event, request, settings) {
                if (settings.data.lastIndexOf("action=woocommerce_load_variations", 0) === 0) {
                    addVariationLinks();
                }
            });
        });
        <?php else: ?>
        addVariationLinks();
        <?php endif; ?>
    </script>
    <?php
}



function true_add_post_columns($my_columns)
{
    $slider = array('price' => 'Цена');
    $my_columns = array_slice($my_columns, 0, 5, true) + $slider + array_slice($my_columns, 5, NULL, true);
    return $my_columns;
}

function true_fill_post_columns($column)
{
    global $post;
    switch ($column) {
        case 'price':
            echo 'New price: <input type="text" class="this_price" data-id="' . $post->ID . '" value="' . get_post_meta($post->ID, '_price', true) . '" style="width: 100%;"/><p></p>';
            break;
    }
}

add_filter('manage_edit-product_columns', 'true_add_post_columns', 10, 1); // manage_edit-{тип поста}_columns
add_action('manage_posts_custom_column', 'true_fill_post_columns', 10, 1);

wp_enqueue_script('jquery');
wp_enqueue_script('ajaxpostmeta', get_stylesheet_directory_uri() . '/js/ajax-post-meta.js', array('jquery'));

function action_function_changePrice()
{
    if (isset($_POST['product_id']) && isset($_POST['price_val']) && is_numeric($_POST['price_val']) && !$_POST['price_val'] >= 0) {

        $product = wc_get_product($_POST['product_id']); // An instance of the WC_Product object

        // Only for variable products
        if ($product->is_type('variable')) {
            foreach ($product->get_available_variations() as $variation_values) {
                $variation_id = $variation_values['variation_id']; // variation id
                // Updating active price and regular price
                update_post_meta($variation_id, '_regular_price', $_POST['price_val']);
                update_post_meta($variation_id, '_price', $_POST['price_val']);
                wc_delete_product_transients($variation_id); // Clear/refresh the variation cache
            }
            // Clear/refresh the variable product cache
            wc_delete_product_transients($_POST['product_id']);
        }
        else {
            update_post_meta($_POST['product_id'], '_regular_price', $_POST['price_val']);
        }

        update_post_meta($_POST['product_id'], '_price', esc_attr($_POST['price_val']));

        die();
    }
}

if (is_admin()) {
    add_action('wp_ajax_changePrice', 'action_function_changePrice');
    // wp_ajax_nopriv_ не нужен, так как мы работаем в админке (а в админку не попадают незареганные пользователи)
}


function lang($rus, $ukr) 
{
	$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	if (strpos($url, 'kelt.com.ua/uk/') !== false) {
		echo $ukr;
	} else {
		echo $rus;
	}
}


 



// тайтл и дескрипшен для укр версии

add_filter('wpseo_metadesc', function($metadesc){
     
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];     
    if(strpos($url, '/uk/product/'))
    {
        $metadesc = get_the_title() .  ' ✓ Краща ціна✓ 100% гарантія якості✓ ✈ Швидка доставка по Україні✓ Великий вибір товарів ✓Акції! Знижки!';
    }
     
    return $metadesc;
}, 10, 1);

add_filter('wpseo_title', function($title){
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];     
    if(strpos($url, '/uk/product/'))
    {
        $title = get_the_title() . ' купити в Києві, Дніпропетровську, Харкові, Львові, Запоріжжі: Україна - Ціна, опис | Інтернет-магазин Kelt Active';
    }
	

     
    return $title;
}, 10, 1);


// подключаем функцию активации мета блока (my_extra_fields)

add_action( 'admin_init', 'my_extra_fields', 1 );

function my_extra_fields() {
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'post', 'normal', 'high' );
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_brendy_func', 'brendy', 'normal', 'high' );
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_page_func', 'page', 'normal', 'high' );
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_page_func2', 'razmer_set', 'normal', 'high' );
}

// Код блока.
function extra_fields_box_func( $post ) {
    ?>
    <p>Заголовок укр<br><label><input type="text" name="extra[title_uk]"
                                      value="<?php echo get_post_meta( $post->ID, 'title_uk', 1 ); ?>"
                                      style="width:100%"/> </label></p>

    <p>Текст укр:
        <textarea type="text" name="extra[content_uk]"
                  style="width:100%;height:250px;"><?php echo get_post_meta( $post->ID, 'content_uk', 1 ); ?></textarea>
    </p>
	
	<p>Превью новости укр:
        <textarea type="text" name="extra[prev_uk]"
                  style="width:100%;height:250px;"><?php echo get_post_meta( $post->ID, 'prev_uk', 1 ); ?></textarea>
    </p>



    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce( __FILE__ ); ?>"/>
    <?php
}


function extra_fields_box_brendy_func( $post ) {
    ?>
    <p>Заголовок укр<br><label><input type="text" name="extra[title_uk]"
                                      value="<?php echo get_post_meta( $post->ID, 'title_uk', 1 ); ?>"
                                      style="width:100%"/> </label></p>
<script>
jQuery(document).ready(function() {
    if ( typeof( tinyMCE ) == "object") {
		
        tinyMCE.init({
          
	
			  selector: '#tag-description',
			   
  plugins : 'link',
  relative_urls : false,
document_base_url : "https://kelt.com.ua/"
        });
    }
});
</script>
    <p>Текст укр:
        <textarea type="text" id="tag-description" name="extra[content_uk]"
                  style="width:100%;height:250px;"><?php echo get_post_meta( $post->ID, 'content_uk', 1 ); ?></textarea>
    </p>


    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce( __FILE__ ); ?>"/>
	
	
	<?php
}


function extra_fields_box_page_func2( $post ) {
    ?>
    <p>Заголовок укр<br><label><input type="text" name="extra[title_uk]"
                                      value="<?php echo get_post_meta( $post->ID, 'title_uk', 1 ); ?>"
                                      style="width:100%"/> </label></p>

    <p>Текст укр:
        <textarea type="text" id="tag-description" name="extra[content_uk]"
                  style="width:100%;height:250px;"><?php echo get_post_meta( $post->ID, 'content_uk', 1 ); ?></textarea>
    </p>


    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce( __FILE__ ); ?>"/>
	
    <?php
}




function extra_fields_box_page_func( $post ) {
    ?>
    <p>Заголовок укр<br><label><input type="text" name="extra[title_uk]"
                                      value="<?php echo get_post_meta( $post->ID, 'title_uk', 1 ); ?>"
                                      style="width:100%"/> </label></p>

    <p>Текст укр:
        <textarea type="text" name="extra[content_uk]"
                  style="width:100%;height:250px;"><?php echo get_post_meta( $post->ID, 'content_uk', 1 ); ?></textarea>
    </p>


    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce( __FILE__ ); ?>"/>
    <?php
}

// Включаем обновление полей при сохранении.
add_action( 'save_post', 'my_extra_fields_update', 0 );

/**
 * Сохраняем данные при сохранении поста
 *
 * @param int $post_id Post id.
 *
 * @return bool
 */
function my_extra_fields_update( $post_id ) {
    // Базовая проверка.
    $nonce = filter_input( INPUT_POST, 'extra_fields_nonce', FILTER_SANITIZE_STRING );
    $extra = filter_input( INPUT_POST, 'extra', FILTER_UNSAFE_RAW, FILTER_REQUIRE_ARRAY );
    if (
        empty( $extra )
        || ! wp_verify_nonce( $nonce, __FILE__ )
        || wp_is_post_autosave( $post_id )
        || wp_is_post_revision( $post_id )
    ) {
        return false;
    }

    // Все ОК! Теперь нужно сохранить/удалить данные.
    $extra['title_uk']   = isset( $extra['title_uk'] ) ? sanitize_text_field( $extra['title_uk'] ) : '';
    $extra['content_uk'] = isset( $extra['content_uk'] ) ? wp_kses_post( $extra['content_uk'] ) : '';
    $extra['prev_uk'] = isset( $extra['prev_uk'] ) ? wp_kses_post( $extra['prev_uk'] ) : '';
    foreach ( $extra as $key => $value ) {
        if ( empty( $value ) ) {
            delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое.
            continue;
        }

        update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически.
    }

    return $post_id;
}
	
// метатеги новостей укр

function wpseo_metadesc_new ( $str ) {
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, '/uk/') !== false) {
		

		
		if ( in_category( 'news2' )) {
			$post_id = get_the_ID();
            $post = get_post($post_id);
            $value = get_post_meta( $post_id, 'description', true );
			$str = $value . ' - Інтернет-магазин Kelt Active✓ Найкращі товари для активного відпочинку✓ 100% Гарантія якості✓ ✈ Оперативна доставка✓ Акції! Знижки!';
			return $str;
		} else {
			return $str;
		}
		
	} else {
		return $str;
	}


}
add_filter( 'wpseo_metadesc', 'wpseo_metadesc_new', 10, 1 );

function wpseo_title_new ( $str ) {
    $url = $_SERVER['REQUEST_URI'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, '/uk/') !== false) {
		
		if ( in_category( 'news2' )) {
			$post_id = get_the_ID();
            $post = get_post($post_id);
            $value = get_post_meta( $post_id, 'title', true );
			$str = $value . ' - цікава інформація на сторінках Інтернет-магазину Kelt Active';
			return $str;
		} else {
			return $str;
		}
		
	} else {
		return $str;
	}

}
add_filter( 'wpseo_title', 'wpseo_title_new', 10, 1 );


function true_custom_fields() {
	add_post_type_support( 'page', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}
 
add_action('init', 'true_custom_fields');
