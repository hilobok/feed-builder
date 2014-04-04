<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractNode;

/**
 * A Person construct is an element that describes a person,
 * corporation, or similar entity (hereafter, 'person').
 *
 * atomPersonConstruct =
 *    atomCommonAttributes,
 *    (element atom:name { text }
 *     & element atom:uri { atomUri }?
 *     & element atom:email { atomEmailAddress }?
 *     & extensionElement*)
 *
 * This specification assigns no significance to the order of appearance
 * of the child elements in a Person construct.  Person constructs allow
 * extension Metadata elements (see http://tools.ietf.org/html/rfc4287#section-6.4).
 */
abstract class AbstractPersonNode extends AbstractNode
{
    public function getAllowedChildren()
    {
        return array(
            'name',
            'uri',
            'email',
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

    public function getRequiredChildren()
    {
        return array(
            'name'
        );
    }
}