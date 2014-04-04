<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class ItemNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'title',
            'link',
            'description',
            'author',
            'category',
            'comments',
            'enclosure',
            'guid',
            'pubDate',
            'source',
        );
    }

    public function validate()
    {
        $errors = parent::validate();

        if (!$this->hasChild('title') && !$this->hasChild('description')) {
            $errors[] = "Element 'item' must contain at least one of 'title' or 'description' elements.";
        }

        return $errors;
    }
}
