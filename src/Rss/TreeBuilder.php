<?php

namespace Anh\FeedBuilder\Rss;

use Anh\FeedBuilder\AbstractTreeBuilder;

class TreeBuilder extends AbstractTreeBuilder
{
    public function __construct($transformer = null)
    {
        $this->transformer = $transformer ?: new Transformer();
    }

    public function getNodeClassName($nodeName)
    {
        return sprintf('Anh\FeedBuilder\Rss\Node\%sNode', ucfirst($nodeName));
    }
}
