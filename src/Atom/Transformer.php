<?php

namespace Anh\FeedBuilder\Atom;

use Anh\FeedBuilder\AbstractTransformer;

class Transformer extends AbstractTransformer
{
    protected function getMap()
    {
        return array(
            'copyright' => 'rights',
            'pubDate' => 'updated',
            'lastBuildDate' => 'updated',
            'image' => 'logo',
            'category' => array($this, 'mapCategory'),
            'managingEditor' => 'author',
            'item' => 'entry',
            'guid' => 'id',
            'description' => 'content'
        );
    }

    protected function mapCategory($key, $value)
    {
        $category = array();

        if (is_array($value)) {
            if (isset($value[0])) {
                $category['term'] = $category['label'] = $value[0];
            }

            if (isset($value['domain'])) {
                $category['scheme'] = $value['domain'];
            }
        } else {
            $category['term'] = $category['label'] = $value;
        }

        return array('category', $category);
    }

    protected function postTransform($data)
    {
        if (!isset($data['feed'])) {
            $data = array(
                'feed' => $data
            );
        }

        if (!isset($data['feed']['id']) && isset($data['feed']['link'])) {
            $data['feed'] = array_merge(
                array('id' => $data['feed']['link']),
                $data['feed']
            );
        }

        if (!isset($data['feed']['updated'])) {
            $data['feed']['updated'] = 'now';
        }

        return $data;
    }
}