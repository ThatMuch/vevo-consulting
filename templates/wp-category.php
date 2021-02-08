<?

/**
 * The template displaying the archive
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>

<?php get_header(); ?>
<main id="archives" class="blog">
<section class="container blog__featured">
          <div class="row mb-5 load-more-target">
              <?php
              if ( have_posts() ) {
                  while ( have_posts() ) {
                    the_post();
                        get_template_part('templates/wp', 'post');
                  }
                }
              ?>
          </div>
                <?php
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
