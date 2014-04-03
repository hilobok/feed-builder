<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class DescriptionNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}