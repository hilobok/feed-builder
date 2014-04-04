<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:logo" element's content is an IRI reference [RFC3987] that
 * identifies an image that provides visual identification for a feed.
 *
 * atomLogo = element atom:logo {
 *   atomCommonAttributes,
 *   (atomUri)
 * }
 *
 * The image SHOULD have an aspect ratio of 2 (horizontal) to 1
 * (vertical).
 */
class LogoNode extends AbstractNode
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
