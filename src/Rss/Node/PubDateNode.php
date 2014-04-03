<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\Rss\AbstractDateNode;

class PubDateNode extends AbstractDateNode
{
    public function isValid()
    {
        return true;
    }
}