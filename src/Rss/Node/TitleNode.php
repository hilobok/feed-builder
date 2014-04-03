<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class TitleNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}