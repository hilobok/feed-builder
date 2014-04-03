<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\Rss\AbstractDateNode;

class LastBuildDateNode extends AbstractDateNode
{
    public function isValid()
    {
        return true;
    }
}