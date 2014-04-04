<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class TtlNode extends AbstractNode
{
    public function validate()
    {
        $errors = parent::validate();

        if (!is_numeric($this->getValue())) {
            $errors[] = "Value of element 'ttl' must be numeric.";
        }

        return $errors;
    }
}
