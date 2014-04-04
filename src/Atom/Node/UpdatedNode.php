<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\Atom\AbstractDateNode;

/**
 * The "atom:updated" element is a Date construct indicating the most
 * recent instant in time when an entry or feed was modified in a way
 * the publisher considers significant.  Therefore, not all
 * modifications necessarily result in a changed atom:updated value.
 *
 * atomUpdated = element atom:updated { atomDateConstruct }
 *
 * Publishers MAY change the value of this element over time.
 */
class UpdatedNode extends AbstractDateNode
{
}