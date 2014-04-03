<?php

namespace Anh\FeedBuilder\Rss;

use Anh\FeedBuilder\AbstractNode;
use DateTime;

abstract class AbstractDateNode extends AbstractNode
{
    protected function processValue($value)
    {
        if ($value instanceof DateTime) {
            return $value->format(DateTime::RSS);
        }

        if (is_numeric($value) && $value > 0) {
            return date(DateTime::RSS, $value);
        }

        if (is_string($value)) {
            $value = new DateTime($value);

            return $value->format(DateTime::RSS);
        }
    }
}