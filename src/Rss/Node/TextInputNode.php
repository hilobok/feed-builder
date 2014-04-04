<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class TextInputNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'title',
            'description',
            'name',
            'link'
        );
    }

    public function getRequiredChildren()
    {
        return array(
            'title',
            'description',
            'name',
            'link'
        );
    }
}