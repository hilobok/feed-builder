<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:category" element conveys information about a category
 * associated with an entry or feed.  This specification assigns no
 * meaning to the content (if any) of this element.
 *
 * atomCategory =
 *   element atom:category {
 *      atomCommonAttributes,
 *      attribute term { text },
 *      attribute scheme { atomUri }?,
 *      attribute label { text }?,
 *      undefinedContent
 *   }
 *
 * The "term" attribute is a string that identifies the category to
 * which the entry or feed belongs.  Category elements MUST have a
 * "term" attribute.
 *
 * The "scheme" attribute is an IRI that identifies a categorization
 * scheme.  Category elements MAY have a "scheme" attribute.
 *
 * The "label" attribute provides a human-readable label for display in
 * end-user applications.  The content of the "label" attribute is
 * Language-Sensitive.  Entities such as "&amp;" and "&lt;" represent
 * their corresponding characters ("&" and "<", respectively), not
 * markup.  Category elements MAY have a "label" attribute.
 */
class CategoryNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'term',
            'scheme',
            'label',
        );
    }

    public function getRequiredAttributes()
    {
        return array(
            'term'
        );
    }

    public function processValue($data)
    {
        $term = null;

        if (is_array($data)) {
            $term = isset($data[0]) ? $data[0] : null;
        } else {
            $term = $data;
        }

        $this->attributes['term'] = $term;

        return null;
    }
}
