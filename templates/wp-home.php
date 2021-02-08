<?
/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */

?>

<?php get_header(); ?>
<main id="blog" class="blog">
<section class="container blog__featured">
  <div class="row card-blog-featured">
        <?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1
          );
                    $query = new WP_Query( $args );
                      if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                $query->the_post();?>
                  <?php if(get_post_thumbnail_id( $post->ID )) : ?>
                <div class="col-sm-6">
                  <div class="card-blog-featured_wrapper">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <img data-src="<?php echo $image[0]; ?>" class="card-blog-featured_img" alt="<?php the_title(); ?>"/>
                  </div>
                </div>
                <?php endif; ?>
                <div class="col-sm-6">
                  <div class="p-3">
                    <h3 ><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
                    <div class="card-blog-featured_excerpt">
                      <?php  excerpt(55); ?>
                      </div>
                  </div>
                </div>
                <?php }} wp_reset_postdata(); ?>
      </div>
          <div class="row mb-5 load-more-target">
              <?php
              $args = array(
                'post_type' => 'post',

              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                        get_template_part('templates/wp', 'post');
                  }
                }
              ?>
          </div>
                <?php global $wp_query;
      if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="d-flex justify-content-center w-100">
    <button id="load-more" class="btn btn-primary mb-3 ">Afficher plus</button>
  </div>
      <?php endif; ?>

</section>
<section class="blog__categories">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-sm-3 d-flex align-items-center">
        <p class="blog__categories__title">Retrouvez nos articles par catégories</p>
      </div>
      <div class="col-sm-9 d-flex justify-content-center">
        <div class="blog__categories__list">
          <?php $categories = get_categories(array('parent' => $parent_category, 'hide_empty' => 0));?>
          <?php foreach ($categories as $category) :
            if ($category->term_id === 1) {continue;}
            $category_link = get_category_link( $category->term_id );
            ?>

            <a href="<?= esc_url( $category_link );?>" class="blog__categories__list__name">
              <?php
                $image = get_field('image', $category);?>
                <div class="card-blog mb-3">
                   <div class="card-blog_wrapper ">
                  <img class="card-blog_img img-shadow" src="<?= $image['url'];?>" alt="<?= $category->cat_name;?>">
                </div>
                </div>
              <p class="blog__categories__list__name">
                <?= $category->cat_name;?>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>


</main>
<?php get_footer(); ?>
