<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class ItemNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}