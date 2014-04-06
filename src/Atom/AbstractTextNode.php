<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractNode;

/**
 * A Text construct contains human-readable text, usually in small
 * quantities.  The content of Text constructs is Language-Sensitive.
 *
 * atomPlainTextConstruct =
 *   atomCommonAttributes,
 *   attribute type { "text" | "html" }?,
 *   text
 *
 * atomXHTMLTextConstruct =
 *   atomCommonAttributes,
 *   attribute type { "xhtml" },
 *   xhtmlDiv
 *
 * atomTextConstruct = atomPlainTextConstruct | atomXHTMLTextConstruct
 */
abstract class AbstractTextNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'type',
            'src',
        );
    }
}
