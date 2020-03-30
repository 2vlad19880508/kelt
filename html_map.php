<?php
/*
Template Name: Карта сайта
*/
get_header(); ?>



		 <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">

             <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT', 'Інтернет магазин туристичного спорядження KELT') ?></a>
            </li>
			<li class="breadcrumbs__item breadcrumbs__item_last"><?php the_title() ?></li>
          </ul>
          <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php the_title() ?></h1>
        </div>
      </section>
      <section class="section-contacts">
              <div class="container section-size-grids__container">
          <div class="size-grid section-size-grids__size-grid">
            <!--seo_text_start-->
			<ul>
			
			
			
			
		<?php
$container = new ProductCatsContainer();
$parents = $container->getParents();
?>

    


<a class="touch-panel__category-caption caption" href="<?php echo get_home_url(); ?>"><?php lang('Главная', 'Головна') ?></a></br>
 <?php foreach ($parents as $category): ?>
        <?php
        $children = $container->getChildren($category->term_id);
        ?>
        <div>
            <div>
                <a class="touch-panel__category-caption caption" href="<?= get_term_link($category) ?>"><?= $category->name ?></a>
                <?php if (count($children) > 0): ?>
                   
                <?php endif; ?>
            </div>
            <?php if (count($children) > 0): ?>
                <div>
                    <?php foreach ($children as $secondLvlChild): ?>
                        <?php $subChilds = $container->getChildren($secondLvlChild->term_id); ?>
                        <div>
                            <div>
                                <div><br>
                                    <a style="margin-left:20px;" class="touch-panel__category-caption caption"  href="<?= get_term_link($secondLvlChild) ?>">
                                        <?= $secondLvlChild->name ?>
                                    </a>
                                    <?php if (count($subChilds) > 0): ?>
                                        
                                    <?php endif; ?>
                                </div>
                                <?php if (count($subChilds) > 0): ?>
                                    <div>
                                        <ul class="menu sub-category__menu">
                                            <?php foreach ($subChilds as $subChild): ?>
                                                <li style="margin-left:35px;">
                                                    <a class="touch-panel__category-caption caption"  href="<?= get_term_link($subChild) ?>"><?= $subChild->name ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>
        </div>
    <?php endforeach; ?>



	 
</ul></h3>
       </div></div>
      </section>
    </main>
    <!-- main content ends-->

<?php get_footer(); ?>
