<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class TtlNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}