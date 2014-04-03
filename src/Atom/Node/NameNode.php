<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:name" element's content conveys a human-readable name for
 * the person. The content of atom:name is Language-Sensitive. Person
 * constructs MUST contain exactly one "atom:name" element.
 */
class NameNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}