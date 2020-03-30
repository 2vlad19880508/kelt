<?php
get_header(); ?>
    <main class="main" id="main">
        <section class="section-meta">
            <div class="container section-meta__container">
                 <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">
              
              <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>">Главная</a>
            </li>
			<li class="breadcrumbs__item">
            <a class="breadcrumbs__link" href="/news/">Новости</li></a>
			</li>
            <li class="breadcrumbs__item breadcrumbs__item_last"><?php the_title() ?></li>
          </ul>
          <!-- breadcrumbs end-->


                <h1 class="section-meta__title caption"><?php the_title() ?></h1>
            </div>
        </section>
        <section class="section-art-previews">
            <div class="container section-art-previews__container">
                <div class="section-art-previews__content">
                    <?php
                    $categories = get_the_category();
                    $category_id = $categories[0]->cat_ID;

                    $CurrentPage = get_query_var('paged');
                    $Posts = new WP_Query(array(
//                    'post_type' => 'post', // Default or custom post type
                        'posts_per_page' => 10, // Max number of posts per page
                        'cat' => $category_id,
                        'paged' => $CurrentPage,
                    ));



                    if ($Posts->have_posts()) :
//                    query_posts('cat=19&posts_per_page=2');
                        while ($Posts->have_posts()) : $Posts->the_post();
                            ?>

                            <div class="art-preview clearfix section-art-previews__art-preview">

                                <img src="<?php the_post_thumbnail_url(); ?>" alt="article image"/>
                                <h3 class="art-preview__name"><?php the_title(); ?></h3>
                                <p class="art-preview__text"><?php the_excerpt(); ?></p>

                                <a class="button art-preview__more"
                                   href="<?php the_permalink(); ?>"><span>Читать далее</span></a>
                            </div>

                        <?php endwhile; endif;
                    wp_reset_query(); ?>


                </div>
                <div class="section-art-previews__aside">
                    <div class="section-art-previews__menu">
                        <h2 class="section-art-previews__header">категории</h2>
                        <ul class="aside-menu aside-menu_decorated section-art-previews__aside-menu">
                            <?php
                            $i = 1;
                            $cat = '19';
                            $categories = get_categories('parent=' . $cat . '');
                            foreach ($categories as $category) {
                                $i++;
                            }
                            if ($i > 1) {

                                foreach ($categories as $category) { ?>
                                    <li class="aside-menu__item"><a
                                            href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                                    </li>
                                <?php }
                                echo "</ul>";
                            } else {
                                $pcat = get_category(get_query_var('cat'), false);
                                $pcatid = $pcat->category_parent;
                                $categories = get_categories('parent=' . $pcatid . '');
                                echo "<ul>";
                                foreach ($categories as $category) { ?>
                                    <li<?php if ($category->term_id == $cat) { ?> class="aside-menu__item"<?php } ?>><a
                                            href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                                    </li>
                                <?php }

                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php pagination($Posts->max_num_pages); ?>
    </main>
    <!-- main content ends-->
<?php get_footer(); ?>