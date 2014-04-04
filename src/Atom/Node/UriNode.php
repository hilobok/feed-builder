<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:uri" element's content conveys an IRI associated with the
 * person.  Person constructs MAY contain an atom:uri element, but MUST
 * NOT contain more than one.  The content of atom:uri in a Person
 * construct MUST be an IRI reference [RFC3987 - http://tools.ietf.org/html/rfc3987].
 */
class UriNode extends AbstractNode
{
}