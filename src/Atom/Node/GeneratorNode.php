<?php

namespace Anh\FeedBuilder\Atom\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * The "atom:generator" element's content identifies the agent used to
 * generate a feed, for debugging and other purposes.
 *
 * atomGenerator = element atom:generator {
 *   atomCommonAttributes,
 *   attribute uri { atomUri }?,
 *   attribute version { text }?,
 *   text
 * }
 *
 * The content of this element, when present, MUST be a string that is a
 * human-readable name for the generating agent.  Entities such as
 * "&amp;" and "&lt;" represent their corresponding characters ("&" and
 * "<" respectively), not markup.
 *
 * The atom:generator element MAY have a "uri" attribute whose value
 * MUST be an IRI reference [RFC3987].  When dereferenced, the resulting
 * URI (mapped from an IRI, if necessary) SHOULD produce a
 * representation that is relevant to that agent.
 *
 * The atom:generator element MAY have a "version" attribute that
 * indicates the version of the generating agent.
 */
class GeneratorNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',

            'uri',
            'version',
        );
    }
}