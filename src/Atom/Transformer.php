<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractTransformer;

class Transformer extends AbstractTransformer
{
    protected function preTransform($data)
    {
        return $data;
    }

    protected function postTransform($data)
    {
        if (!isset($data['feed'])) {
            $data = array(
                'feed' => $data
            );
        }

        return $data;
    }
}