<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class DayNode extends AbstractNode
{
    public function validate()
    {
        $errors = parent::validate();

        $days = array(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        );

        if (!in_array($this->getValue(), $days)) {
            $errors[] = sprintf("Value of element 'day' must be one of [%s].", implode(', ', $days));
        }

        return $errors;
    }
}
