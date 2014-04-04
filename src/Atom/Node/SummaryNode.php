<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:summary" element is a Text construct that conveys a short
 * summary, abstract, or excerpt of an entry.
 *
 * atomSummary = element atom:summary { atomTextConstruct }
 *
 * It is not advisable for the atom:summary element to duplicate
 * atom:title or atom:content because Atom Processors might assume there
 * is a useful summary when there is none.
 */
class SummaryNode extends AbstractNode
{
}
