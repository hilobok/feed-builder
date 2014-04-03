<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class LinkNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}