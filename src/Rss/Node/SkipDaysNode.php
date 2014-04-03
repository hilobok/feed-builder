<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class SkipDaysNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}