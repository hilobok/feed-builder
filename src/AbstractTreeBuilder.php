<?php

namespace Anh\FeedBuilder;

abstract class AbstractTreeBuilder
{
    protected $transformer;

    abstract public function __construct($transformer = null);
    abstract public function getNodeClassName($nodeName);

    public function build(array $data)
    {
        $data = $this->transformer->transform($data);
        $nodes = array();

        foreach ($data as $name => $value) {
            $node = $this->createNode($name, $value);

            if ($node) {
                $nodes[] = $node;
            }
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
                    $child = $this->createNode($name, $value);
                    if ($child) {
                        $node->addChild($child);
                    }
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
