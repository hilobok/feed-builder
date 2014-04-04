<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:id" element conveys a permanent, universally unique
 * identifier for an entry or feed.
 *
 * atomId = element atom:id {
 *   atomCommonAttributes,
 *   (atomUri)
 * }
 *
 * Its content MUST be an IRI, as defined by [RFC3987].  Note that the
 * definition of "IRI" excludes relative references.  Though the IRI
 * might use a dereferencable scheme, Atom Processors MUST NOT assume it
 * can be dereferenced.
 */
class IdNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',
        );
    }
}