<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class SkipDaysNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'day'
        );
    }

    public function getRequiredChildren()
    {
        return array(
            'day'
        );
    }
}
