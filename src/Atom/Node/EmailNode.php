<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:email" element's content conveys an e-mail address
 * associated with the person.  Person constructs MAY contain an
 * atom:email element, but MUST NOT contain more than one.  Its content
 * MUST conform to the "addr-spec" production in [RFC2822].
 */
class EmailNode extends AbstractNode
{
    public function isValid()
    {
        return true;
    }
}