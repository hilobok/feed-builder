<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class TextInputNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}