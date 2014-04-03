<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * atomEntry =
 *       element atom:entry {
 *          atomCommonAttributes,
 *          (atomAuthor*
 *           & atomCategory*
 *           & atomContent?
 *           & atomContributor*
 *           & atomId
 *           & atomLink*
 *           & atomPublished?
 *           & atomRights?
 *           & atomSource?
 *           & atomSummary?
 *           & atomTitle
 *           & atomUpdated
 *           & extensionElement*)
 *       }
 */
class EntryNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'author',
            'category',
            'content',
            'contributor',
            'id',
            'link',
            'published',
            'rights',
            'source',
            'summary',
            'title',
            'updated',
        );
    }

    public function getAvailableAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',
        );
    }

    public function isValid()
    {
        return true;
    }
}