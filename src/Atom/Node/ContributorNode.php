<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\Atom\AbstractPersonNode;

/**
 * The "atom:contributor" element is a Person construct that indicates a
 * person or other entity who contributed to the entry or feed.
 *
 * atomContributor = element atom:contributor { atomPersonConstruct }
 */
class ContributorNode extends AbstractPersonNode
{
    public function isValid()
    {
        return true;
    }
}