<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractNode;
use DateTime;

/**
 * A Date construct is an element whose content MUST conform to the
 * "date-time" production in [RFC3339].  In addition, an uppercase "T"
 * character MUST be used to separate date and time, and an uppercase
 * "Z" character MUST be present in the absence of a numeric time zone
 * offset.
 *
 * atomDateConstruct =
 *   atomCommonAttributes,
 *   xsd:dateTime
 */
abstract class AbstractDateNode extends AbstractNode
{
    protected function processValue($data)
    {
        if ($data instanceof DateTime) {
            return $data->format(DateTime::ATOM);
        }

        if (is_numeric($data) && $data > 0) {
            return date(DateTime::ATOM, $data);
        }

        if (is_string($data)) {
            $data = new DateTime($data);

            return $data->format(DateTime::ATOM);
        }
    }

    public function getAvailableAttributes()
    {
        return array(
            // atomCommonAttributes
            'xml:base',
            'xml:lang',
        );
    }
}