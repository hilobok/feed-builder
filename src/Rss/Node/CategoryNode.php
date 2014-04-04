<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class CategoryNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            'domain'
        );
    }
}