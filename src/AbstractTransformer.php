<?php

namespace Anh\FeedBuilder;

/**
 * Class for transformation of input data to proper specification (Rss->Atom and Atom->Rss)
 * in order to have ability to build both RSS and Atom from the same data.
 * Not sure if I would implement this ever, feel free to contribute ;)
 * See https://github.com/hilobok/feed-builder/commit/1f7674cf6d62aeed3780aa57d5c4b641d21c12c5
 * for draft implementation
 */
abstract class AbstractTransformer
{
    public function transform($data)
    {
        $data = $this->preTransform($data);
        $data = $this->postTransform($data);

        return $data;
    }

    abstract protected function preTransform($data);
    abstract protected function postTransform($data);
}