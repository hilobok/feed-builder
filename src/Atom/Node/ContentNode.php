<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:content" element either contains or links to the content of
 * the entry.  The content of atom:content is Language-Sensitive.
 *
 * atomInlineTextContent =
 *   element atom:content {
 *      atomCommonAttributes,
 *      attribute type { "text" | "html" }?,
 *      (text)*
 *   }
 */
class ContentNode extends AbstractNode
{
    public function getAvailableAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'type',
            'src',
        );
    }

    public function getDefaultAttributes()
    {
        return array(
            'type' => 'text'
        );
    }

    public function isValid()
    {
        return true;
    }
}