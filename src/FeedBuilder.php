<?php

namespace Anh\FeedBuilder;

use DOMDocument;

class FeedBuilder
{
    protected $data;

    protected $encoding = 'utf-8';

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    public function init(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function build($type = 'rss')
    {
        // $builder = new \Anh\FeedBuilder\Rss\TreeBuilder();
        $builder = new \Anh\FeedBuilder\Atom\TreeBuilder();
        $nodes = $builder->build($this->data);
// print_r($nodes);
        $dom = new DOMDocument('1.0', $this->encoding);

        foreach ($nodes as $node) {
            $dom->appendChild($node->build($dom));
        }

        return $dom->saveXML();
    }
}