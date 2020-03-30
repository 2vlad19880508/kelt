<?php
$container = new ProductCatsContainer();
$parents = $container->getParents();
?>
<div class="nav header__nav">
    <ul class="nav__list">
        <?php foreach ($parents as $category): ?>
            <li class="nav__item">
                <a href="<?= get_term_link($category) ?>"><span><?= $category->name ?></span></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="nav__categories">
        <?php
        foreach ($parents as $parent) {
            /** @var WP_Term $parent */
            $children = $container->getChildren($parent->term_id); ?>
            <li class="nav__category" style="padding-top: 111px!important;">
                <div class="nav__category-container">
                <?php if (count($children) > 0): ?>
                    
                        <?php foreach ($children as $secondLvlChild): ?>
					<div class="sub-category nav__sub-category">
                            <a class="sub-category__link caption caption_small bold" href="<?= get_term_link($secondLvlChild) ?>">
                                <?= $secondLvlChild->name ?>
                            </a>
                            <?php
                            $subChilds = $container->getChildren($secondLvlChild->term_id);
                            if (count($subChilds) > 0): ?>
                                <ul class="menu sub-category__menu">
                                    <?php foreach ($subChilds as $subChild): ?>
                                        <li class="menu__item">
                                            <a href="<?= get_term_link($subChild) ?>"><?= $subChild->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
						</div>
                        <?php endforeach; ?>
                <? endif;?>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>