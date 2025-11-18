<?php
/**
 * Captivate Podcast Shortcode Examples for WordPress
 *
 * This file demonstrates different ways to use the Captivate shortcode
 * in WordPress templates using PHP
 */

// ============================================
// METHOD 1: Basic do_shortcode() usage
// ============================================
// Use this in template files or custom page templates

echo do_shortcode('[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]');


// ============================================
// METHOD 2: Using a variable for flexibility
// ============================================

$podcast_shortcode = '[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]';

echo do_shortcode($podcast_shortcode);


// ============================================
// METHOD 3: Building shortcode with attributes
// ============================================

$atts = array(
    'show_id' => 'dffe337f-0541-41f3-972d-a64f2c3949cd',
    'episode_id' => '7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976',
    'layout' => 'list',
    'title' => 'show',
    'se_num' => 'default',
    'title_tag' => 'h2',
    'image' => 'above_title',
    'image_size' => 'large',
    'content' => 'excerpt',
    'content_length' => '55',
    'player' => 'above_content',
    'link' => 'show',
    'link_text' => 'Listen to this episode',
    'order' => 'desc',
    'exclude' => 'no',
    'items' => '10',
    'pagination' => 'numbers'
);

// Build shortcode string from attributes
$shortcode = '[cfm_captivate_episodes';
foreach ($atts as $key => $value) {
    $shortcode .= ' ' . $key . '="' . $value . '"';
}
$shortcode .= ']';

echo do_shortcode($shortcode);


// ============================================
// METHOD 4: Conditional display with wrapper
// ============================================

if (shortcode_exists('cfm_captivate_episodes')) {
    echo '<div class="captivate-podcast-wrapper">';
    echo do_shortcode('[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]');
    echo '</div>';
} else {
    echo '<p>Captivate plugin is not active.</p>';
}


// ============================================
// METHOD 5: In a WordPress custom page template
// ============================================
/*
<?php
// Template Name: Podcast Page
get_header();
?>

<div class="podcast-page-content">
    <div class="captivate-podcast-wrapper">
        <?php
        echo do_shortcode('[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]');
        ?>
    </div>
</div>

<?php
get_footer();
?>
*/


// ============================================
// METHOD 6: Using apply_filters for content
// ============================================

$content = '[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]';

// This processes shortcodes like WordPress does with post content
echo apply_filters('the_content', $content);


// ============================================
// METHOD 7: In a widget or custom function
// ============================================

function monumental_podcast_display() {
    $output = '<div class="monumental-podcast-section">';
    $output .= '<div class="captivate-podcast-wrapper">';
    $output .= do_shortcode('[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]');
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

// Usage in template:
// echo monumental_podcast_display();


// ============================================
// METHOD 8: Dynamic episode IDs from database
// ============================================

function get_latest_podcast_episodes($limit = 10) {
    // Example: Get episode IDs from custom post type or options
    $episode_ids = get_option('monumental_podcast_episodes', '7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976');

    $shortcode = sprintf(
        '[cfm_captivate_episodes show_id="%s" episode_id="%s" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="%d" pagination="numbers"]',
        'dffe337f-0541-41f3-972d-a64f2c3949cd',
        $episode_ids,
        $limit
    );

    return do_shortcode($shortcode);
}


// ============================================
// METHOD 9: For Elementor Custom HTML Widget
// ============================================
/*
Simply paste this in an Elementor HTML widget:

<?php
echo do_shortcode('[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]');
?>
*/


// ============================================
// METHOD 10: Shortcode with error handling
// ============================================

function safe_captivate_shortcode() {
    try {
        if (!function_exists('do_shortcode')) {
            throw new Exception('Shortcode function not available');
        }

        $shortcode = '[cfm_captivate_episodes show_id="dffe337f-0541-41f3-972d-a64f2c3949cd" episode_id="7965,7966,7967,7969,7970,7971,7972,7973,7974,7975,7976" layout="list" title="show" se_num="default" title_tag="h2" image="above_title" image_size="large" content="excerpt" content_length="55" player="above_content" link="show" link_text="Listen to this episode" order="desc" exclude="no" items="10" pagination="numbers"]';

        $output = do_shortcode($shortcode);

        if (empty($output) || strpos($output, '[cfm_captivate_episodes') !== false) {
            return '<p class="podcast-error">Unable to load podcast episodes. Please check if the Captivate plugin is active.</p>';
        }

        return $output;

    } catch (Exception $e) {
        return '<p class="podcast-error">Error: ' . esc_html($e->getMessage()) . '</p>';
    }
}

// Usage:
// echo safe_captivate_shortcode();

?>
