<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class SkipHoursNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}