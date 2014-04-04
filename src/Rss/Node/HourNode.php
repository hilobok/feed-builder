<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class HourNode extends AbstractNode
{
    public function validate()
    {
        $errors = parent::validate();

        if (!in_array($this->getValue(), range(0, 23))) {
            $errors[] = "Value of element 'hour' must be in range [0-23].";
        }

        return $errors;
    }
}
