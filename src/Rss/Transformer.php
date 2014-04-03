<?php

namespace Anh\FeedBuilder\Rss;

use Anh\FeedBuilder\AbstractTransformer;

class Transformer extends AbstractTransformer
{
    protected function preTransform($data)
    {
        return $data;
    }

    protected function postTransform($data)
    {
        if (!isset($data['rss']) && !isset($data['channel'])) {
            $data = array(
                'channel' => $data
            );
        }

        if (!isset($data['rss'])) {
            $data = array(
                'rss' => $data
            );
        }

        return $data;
    }
}