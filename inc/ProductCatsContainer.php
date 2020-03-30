<?php
/**
 * Created by PhpStorm.
 * User: local
 * Date: 01.01.2019
 * Time: 21:25
 */

class ProductCatsContainer
{
    /**
     * @var WP_Term[]
     */
    private $cats = [];

    private $blackListIDs = [15];

    public function __construct()
    {
        $this->cats = get_terms(
            'product_cat',
            ['hide_empty' => false]
        );
    }

    public function getParents()
    {
        $parents = [];

        foreach ($this->cats as $cat) {
            if ($cat->parent == null && !in_array($cat->term_id, $this->blackListIDs)) {
                $parents[] = $cat;
            }
        }

        return $parents;
    }

    public function getChildren($parentID)
    {
        $children = [];
        foreach ($this->cats as $cat) {
            if ($cat->parent != null) {
                if ($cat->parent == $parentID && !in_array($cat->term_id, $this->blackListIDs)) {
                    $children[] = $cat;
                }
            }
        }

        return $children;
    }
}