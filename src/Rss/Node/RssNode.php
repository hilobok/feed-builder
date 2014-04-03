<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class RssNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'channel'
        );
    }

    public function isValid()
    {
        return true;
    }
}