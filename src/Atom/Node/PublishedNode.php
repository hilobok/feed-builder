<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\Atom\AbstractDateNode;

/**
 * The "atom:published" element is a Date construct indicating an
 * instant in time associated with an event early in the life cycle of
 * the entry.
 *
 * atomPublished = element atom:published { atomDateConstruct }
 *
 * Typically, atom:published will be associated with the initial
 * creation or first availability of the resource.
 */
class PublishedNode extends AbstractDateNode
{
    public function isValid()
    {
        return true;
    }
}