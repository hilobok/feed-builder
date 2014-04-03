<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:title" element is a Text construct that conveys a human-
 * readable title for an entry or feed.
 *
 * atomTitle = element atom:title { atomTextConstruct }
 */
class TitleNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}