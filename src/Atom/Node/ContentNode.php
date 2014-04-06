<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\Atom\AbstractTextNode;

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
class ContentNode extends AbstractTextNode
{
}
