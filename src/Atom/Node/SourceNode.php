<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * If an atom:entry is copied from one feed into another feed, then the
 * source atom:feed's metadata (all child elements of atom:feed other
 * than the atom:entry elements) MAY be preserved within the copied
 * entry by adding an atom:source child element, if it is not already
 * present in the entry, and including some or all of the source feed's
 * Metadata elements as the atom:source element's children.  Such
 * metadata SHOULD be preserved if the source atom:feed contains any of
 * the child elements atom:author, atom:contributor, atom:rights, or
 * atom:category and those child elements are not present in the source
 * atom:entry.
 *
 * atomSource =
 *   element atom:source {
 *      atomCommonAttributes,
 *      (atomAuthor*
 *       & atomCategory*
 *       & atomContributor*
 *       & atomGenerator?
 *       & atomIcon?
 *       & atomId?
 *       & atomLink*
 *       & atomLogo?
 *       & atomRights?
 *       & atomSubtitle?
 *       & atomTitle?
 *       & atomUpdated?
 *       & extensionElement*)
 *   }
 *
 * The atom:source element is designed to allow the aggregation of
 * entries from different feeds while retaining information about an
 * entry's source feed.  For this reason, Atom Processors that are
 * performing such aggregation SHOULD include at least the required
 * feed-level Metadata elements (atom:id, atom:title, and atom:updated)
 * in the atom:source element.
 */
class SourceNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'author',
            'category',
            'contributor',
            'generator',
            'icon',
            'id',
            'link',
            'logo',
            'rights',
            'subtitle',
            'title',
            'updated',
        );
    }

    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',
        );
    }
}
