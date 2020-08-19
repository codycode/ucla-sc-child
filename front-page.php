<?php /* Template Name: Loop Posts */

$thumb_id = get_post_thumbnail_id( $id );
if ( '' != $thumb_id ) {
  $thumb_url  = wp_get_attachment_image_src( $thumb_id, 'actual_size', true );
  $image      = $thumb_url[0];
}

?>

<?php get_header(); ?>

<main id="main" class="main">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="header" <?php if ( has_post_thumbnail() ) { ?> style="background-image: url(<?php echo $image; ?>);" <?php } ?>>
      <div class="ucla campus">
        <div class="col span_12_of_12">
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
          <p class="intro"><?php
          $key_values = get_post_custom_values( 'intro' );

          foreach ( $key_values as $key => $value ) {
              echo $value;
          }

          ?></p>
        </div>
      </div>
    </header>

    <div class="ucla campus entry-content">

      <div class="col span_8_of_12">

        <?php the_content(); ?>

      </div>


      <div class="col span_4_of_12">
        <?php get_sidebar(); ?>
      </div>


    </div>

    

    <?php endwhile; endif; ?>

  </article>


</main>

<?php get_footer(); ?>
