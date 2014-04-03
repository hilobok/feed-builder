<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class ImageNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}