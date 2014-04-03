<?php

namespace Anh\FeedBuilder;

abstract class AbstractTreeBuilder
{
    protected $transformer;

    abstract function __construct($transformer = null);
    abstract public function getNodeClassName($nodeName);

    public function build($data)
    {
print_r($data);
        $data = $this->transformer->transform($data);
print_r($data);

        foreach ($data as $name => $value) {
            $nodes[] = $this->createNode($name, $value);
        }

        return $nodes;
    }

    public function createNode($name, $data)
    {
        $className = $this->getNodeClassName(
            $this->normalizeNodeName($name)
        );

        if (class_exists($className)) {
            $node = new $className($data);

            foreach ((array) $data as $name => $value) {
                if (in_array(
                    $this->normalizeNodeName($name),
                    $node->getAllowedChildren()
                )) {
                    $node->addChild(
                        $this->createNode($name, $value)
                    );
                }
            }

            return $node;
        }
    }

    public function normalizeNodeName($nodeName)
    {
        return preg_replace('/[_-]?\d+$/', '', $nodeName);
    }
}