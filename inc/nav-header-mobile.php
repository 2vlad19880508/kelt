<?php
$container = new ProductCatsContainer();
$parents = $container->getParents();
?>
<div class="touch-panel__catalog">
    <?php foreach ($parents as $category): ?>
        <?php
        $children = $container->getChildren($category->term_id);
        ?>
        <div class="touch-panel__category slide-box">
            <div class="slide-box__header">
                <a class="touch-panel__category-caption caption" href="<?= get_term_link($category) ?>"><?= $category->name ?></a>
                <?php if (count($children) > 0): ?>
                    <div class="slide-box__toggle toggle">
                        <div class="toggle__line"></div>
                        <div class="toggle__line"></div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (count($children) > 0): ?>
                <div class="slide-box__content">
                    <?php foreach ($children as $secondLvlChild): ?>
                        <?php $subChilds = $container->getChildren($secondLvlChild->term_id); ?>
                        <div class="sub-category touch-panel__sub-category">
                            <div class="slide-box slide-box_full-width touch-panel__slide-box">
                                <div class="slide-box__header">
                                    <a class="sub-category__link caption caption_small bold" href="<?= get_term_link($secondLvlChild) ?>">
                                        <?= $secondLvlChild->name ?>
                                    </a>
                                    <?php if (count($subChilds) > 0): ?>
                                        <div class="slide-box__toggle toggle">
                                            <div class="toggle__line"></div>
                                            <div class="toggle__line"></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if (count($subChilds) > 0): ?>
                                    <div class="slide-box__content">
                                        <ul class="menu sub-category__menu">
                                            <?php foreach ($subChilds as $subChild): ?>
                                                <li class="menu__item">
                                                    <a href="<?= get_term_link($subChild) ?>"><?= $subChild->name ?></a>
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
</div>