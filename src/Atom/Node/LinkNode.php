<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:link" element defines a reference from an entry or feed to
 * a Web resource.  This specification assigns no meaning to the content
 * (if any) of this element.
 *
 * atomLink =
 *   element atom:link {
 *      atomCommonAttributes,
 *      attribute href { atomUri },
 *      attribute rel { atomNCName | atomUri }?,
 *      attribute type { atomMediaType }?,
 *      attribute hreflang { atomLanguageTag }?,
 *      attribute title { text }?,
 *      attribute length { text }?,
 *      undefinedContent
 *   }
 */
class LinkNode extends AbstractNode
{
    public function processValue($data)
    {
        $href = null;

        if (is_array($data)) {
            $href = isset($data[0]) ? $data[0] : null;
        } else {
            $href = $data;
        }

        $this->attributes['href'] = $href;

        return null;
    }

    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'href',
            'rel',
            'type',
            'hreflang',
            'title',
            'length',
        );
    }

    public function getRequiredAttributes()
    {
        return array(
            'href',
        );
    }
}
