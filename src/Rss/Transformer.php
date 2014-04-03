<?php

namespace Anh\FeedBuilder\Rss;

use Anh\FeedBuilder\AbstractTransformer;

class Transformer extends AbstractTransformer
{
    public function postTransform($data)
    {
        return array(
            'rss' => array(
                'channel' => $data
            )
        );
    }


}