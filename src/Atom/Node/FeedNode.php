<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:feed" element is the document (i.e., top-level) element of
 * an Atom Feed Document, acting as a container for metadata and data
 * associated with the feed.  Its element children consist of metadata
 * elements followed by zero or more atom:entry child elements.
 *
 * atomFeed =
 *       element atom:feed {
 *          atomCommonAttributes,
 *          (atomAuthor*
 *           & atomCategory*
 *           & atomContributor*
 *           & atomGenerator?
 *           & atomIcon?
 *           & atomId
 *           & atomLink*
 *           & atomLogo?
 *           & atomRights?
 *           & atomSubtitle?
 *           & atomTitle
 *           & atomUpdated
 *           & extensionElement*),
 *          atomEntry*
 *       }
 */
class FeedNode extends AbstractNode
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
            'entry',
        );
    }

    public function getAvailableAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'xmlns',
        );
    }

    public function getDefaultAttributes()
    {
        return array(
            'xmlns' => 'http://www.w3.org/2005/Atom',
        );
    }

    public function isValid()
    {
        return true;
    }
}