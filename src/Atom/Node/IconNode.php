<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:icon" element's content is an IRI reference [RFC3987] that
 * identifies an image that provides iconic visual identification for a
 * feed.
 *
 * atomIcon = element atom:icon {
 *   atomCommonAttributes,
 *   (atomUri)
 * }
 *
 * The image SHOULD have an aspect ratio of one (horizontal) to one
 * (vertical) and SHOULD be suitable for presentation at a small size.
 */
class IconNode extends AbstractNode
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
