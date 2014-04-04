<?php

namespace Anh\FeedBuilder;

abstract class AbstractNode implements NodeInterface
{
    protected $value = null;

    protected $attributes = array();

    protected $children = array();

    public function __construct($data)
    {
        $this->value = $this->processValue($data);
        $this->attributes = $this->processAttributes($data) + $this->attributes;
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
            return $this->getDefaultAttributes();
        }

        foreach ($this->getAllowedAttributes() as $name) {
            if (array_key_exists($name, $data)) {
                $attributes[$name] = $data[$name];
            }
        }

        return $attributes + $this->getDefaultAttributes();
    }

    public function getName()
    {
        $parts = explode('\\', get_class($this));

        return preg_replace('/Node$/', '', lcfirst(end($parts)));
    }

    public function getAllowedChildren()
    {
        return array();
    }

    public function getRequiredChildren()
    {
        return array();
    }

    public function getAllowedAttributes()
    {
        return array();
    }

    public function getRequiredAttributes()
    {
        return array();
    }

    public function getDefaultAttributes()
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

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function hasChild($name)
    {
        foreach ($this->getChildren() as $child) {
            if ($child->getName() == $name) {
                return true;
            }
        }

        return false;
    }

    public function hasAttribute($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    public function childCount($name)
    {
        $count = 0;

        foreach ($this->getChildren() as $child) {
            if ($child->getName() == $name) {
                $count++;
            }
        }

        return $count;
    }

    public function validate()
    {
        $errors = array_merge(
            $this->checkRequiredChildren(),
            $this->checkRequiredAttributes()
        );

        return $errors ?: null;
    }

    protected function checkRequiredChildren()
    {
        $errors = array();

        foreach ($this->getRequiredChildren() as $child) {
            if (!$this->hasChild($child)) {
                $errors[] = sprintf("Element '%s' must contain '%s' element.", $this->getName(), $child);
            }
        }

        return $errors;
    }

    protected function checkRequiredAttributes()
    {
        $errors = array();

        foreach ($this->getRequiredAttributes() as $attribute) {
            if (!$this->hasAttribute($attribute)) {
                $errors[] = sprintf("Element '%s' must contain '%s' attribute.", $this->getName(), $attribute);
            }
        }

        return $errors;
    }
}
