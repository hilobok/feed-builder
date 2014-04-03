<?php

namespace Anh\FeedBuilder;

abstract class AbstractNode
{
    protected $value;

    protected $attributes;

    protected $children;

    public function __construct($data)
    {
        $this->value = $this->processValue($data);
        $this->attributes = $this->processAttributes($data) + (array) $this->attributes;
    }

    protected function processValue($data)
    {
        if (is_array($data) && isset($data[0])) {
            return $data[0];
        }

        return !is_array($data) ? $data : null;
    }

    protected function processAttributes($data)
    {
        $attributes = array();

        if (!is_array($data)) {
            return $attributes;
        }

        foreach ($this->getAvailableAttributes() as $name) {
            if (array_key_exists($name, $data)) {
                $attributes[$name] = $data[$name];
            }
        }

        return $attributes + $this->getDefaultAttributes();
    }

    public function getAvailableAttributes()
    {
        return array();
    }

    public function getDefaultAttributes()
    {
        return array();
    }

    public function getAllowedChildren()
    {
        return array();
    }

    public function addChild($node)
    {
        $this->children[] = $node;
    }

    public function getChildren()
    {
        return $this->children;
    }

    // TODO XXX shuld not be here?
    public function build($root)
    {
        $doc = ($root instanceof \DOMDocument) ? $root : $root->ownerDocument;

        $element = $doc->createElement(
            $this->getNodeName(),
            $this->value
        );

        foreach ($this->attributes as $name => $value) {
            $element->setAttribute($name, $value);
        }

        $root->appendChild($element);

        if ($this->getChildren()) {
            foreach ($this->getChildren() as $childNode) {
                $childNode->build($element);
            }
        }

        return $element;
    }

    protected function getNodeName()
    {
        $parts = explode('\\', get_class($this));

        return preg_replace('/Node$/', '', lcfirst(end($parts)));
    }

    abstract public function isValid();
}