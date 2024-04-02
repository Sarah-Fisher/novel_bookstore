<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 */

 get_header();
?>

<main>
    <section class="masthead wave-container">
        <div>
            <h1><?php echo wp_kses_post(get_field('main_heading')); ?></h1>
            <h2><?php echo wp_kses_post(get_field('subhead')); ?></h2>
        </div>
    </section>
    <section class="featured-row row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2><?php echo wp_kses_post(get_field('row_one_title')); ?></h2>
            <?php echo wp_kses_post(get_field('featured_content')); ?>
        </div>
    </section>
    <section class="store-row wave-container2 row">
        <h2><?php echo wp_kses_post(get_field('row_two_title')); ?></h2>
        <section class="store-row-info">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('row_two_section_one_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('row_two_section_one_text')); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('row_two_section_two_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('row_two_section_two_text')); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('row_two_section_three_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('row_two_section_three_text')); ?></p>
            </div>
        </section>
    </section>
    <section class="events-row row">
        <h2><?php echo wp_kses_post(get_field('events_title')); ?></h2>
        <section class="events-row-info">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('event_one_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('event_one_description')); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('event_two_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('event_two_description')); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h3><?php echo wp_kses_post(get_field('event_three_title')); ?></h3>
                <p><?php echo wp_kses_post(get_field('event_three_description')); ?></p>
            </div>
        </section>
    </section>
</main>

<?php
get_footer();
?>