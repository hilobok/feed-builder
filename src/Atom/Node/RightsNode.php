<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:rights" element is a Text construct that conveys
 * information about rights held in and over an entry or feed.
 *
 * atomRights = element atom:rights { atomTextConstruct }
 *
 * The atom:rights element SHOULD NOT be used to convey machine-readable
 * licensing information.
 *
 * If an atom:entry element does not contain an atom:rights element,
 * then the atom:rights element of the containing atom:feed element, if
 * present, is considered to apply to the entry.
 */
class RightsNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}