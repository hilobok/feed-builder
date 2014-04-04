<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class SkipHoursNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'hour'
        );
    }

    public function getRequiredChildren()
    {
        return array(
            'hour'
        );
    }
}