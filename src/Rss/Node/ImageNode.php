<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class ImageNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'url',
            'title',
            'link',
            'width',
            'height',
            'description',
        );
    }

    public function getRequiredChildren()
    {
        return array(
            'url',
            'title',
            'link',
        );
    }

    public function validate()
    {
        $errors = parent::validate();

        if ($this->hasChild('width')) {
            // check if width is numeric
        }

        if ($this->hasChild('height')) {
            // check if width is numeric
        }

        return $errors;
    }
}
