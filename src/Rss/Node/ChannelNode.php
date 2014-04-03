<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class ChannelNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'title',
            'link',
            'description',
            'language',
            'copyright',
            'managingEditor',
            'webMaster',
            'pubDate',
            'lastBuildDate',
            'category',
            'generator',
            'docs',
            'ttl',
            'image',
            'skipHours',
            'skipDays',
            'cloud',
            'textInput',
            'item',
        );
    }

    public function isValid()
    {
        return true;
    }
}
