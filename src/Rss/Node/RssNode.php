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

    public function getRequiredChildren()
    {
        return array(
            'channel'
        );
    }

    public function getDefaultAttributes()
    {
        return array(
            'version' => '2.0'
        );
    }
}