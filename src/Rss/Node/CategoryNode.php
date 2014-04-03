<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class CategoryNode extends AbstractNode
{
    public function getAvailableAttributes()
    {
        return array(
            'domain'
        );
    }

    public function isValid()
    {
        return true;
    }
}