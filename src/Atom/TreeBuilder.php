<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractTreeBuilder;
use Anh\FeedBuilder\Atom\Transformer;

class TreeBuilder extends AbstractTreeBuilder
{
    public function __construct($transformer = null)
    {
        $this->transformer = $transformer ?: new Transformer();
    }

    public function getNodeClassName($nodeName)
    {
        return sprintf('Anh\FeedBuilder\Atom\Node\%sNode', ucfirst($nodeName));
    }
}