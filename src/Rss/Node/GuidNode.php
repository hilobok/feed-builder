<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

class GuidNode extends AbstractNode
{
    public function getAllowedAttributes()
    {
        return array(
            'isPermaLink'
        );
    }

    public function getDefaultAttributes()
    {
        return array(
            'isPermaLink' => true
        );
    }

    protected function processAttributes($data)
    {
        $attributes = parent::processAttributes($data);

        if (isset($attributes['isPermaLink'])) {
            $attributes['isPermaLink'] = $this->isTrue($attributes['isPermaLink']) ? 'true' : 'false';
        }

        return $attributes;
    }

    public function getRequiredAttributes()
    {
        return array(
            'isPermaLink'
        );
    }

    protected function isTrue($boolean)
    {
        return !(
            empty($boolean) || in_array(strtolower($boolean), array('no', 'false'))
        );
    }
}