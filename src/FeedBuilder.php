<?php

namespace Anh\FeedBuilder;

use Anh\FeedBuilder\Rss\TreeBuilder as RssTreeBuilder;
use Anh\FeedBuilder\Atom\TreeBuilder as AtomTreeBuilder;
use DOMDocument;
use DOMNode;

class FeedBuilder
{
    protected $data = array();

    protected $encoding = 'utf-8';

    protected $type = 'rss';

    protected $builders = array();

    public function __construct($rssBuilder = null, $atomBuilder = null)
    {
        $this->addBuilder('rss', $rssBuilder ?: new RssTreeBuilder());
        $this->addBuilder('atom', $atomBuilder ?: new AtomTreeBuilder());
    }

    public function addBuilder($type, $builder)
    {
        $this->builders[$type] = $builder;
    }

    public function getBuilder($type)
    {
        if (!isset($this->builders[$type])) {
            throw new \InvalidArgumentException(
                sprintf("Unable to get builder for type '%s'.", $type)
            );
        }

        return $this->builders[$type];
    }

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    public function setType($type)
    {
        $availableTypes = array_keys($this->builders);

        if (!in_array($type, $availableTypes)) {
            throw new \InvalidArgumentException(
                sprintf("Invalid type '%s'. Available types are '%s'.", $type, implode(', ', $availableTypes))
            );
        }

        $this->type = $type;

        return $this;
    }

    public function fromArray(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function build($format = false)
    {
        $nodes = $this->getBuilder($this->type)->build($this->data);

        $dom = new DOMDocument('1.0', $this->encoding);
        $dom->formatOutput = $format;

        foreach ($nodes as $node) {
            $dom->appendChild($this->buildNode($node, $dom));
        }

        return $dom->saveXML();
    }

    protected function buildNode(NodeInterface $node, DOMNode $root)
    {
        $doc = ($root instanceof \DOMDocument) ? $root : $root->ownerDocument;

        $element = $doc->createElement(
            $node->getName(),
            htmlentities($node->getValue())
        );

        foreach ($node->getAttributes() as $name => $value) {
            $element->setAttribute($name, $value);
        }

        foreach ($node->getChildren() as $child) {
            $this->buildNode($child, $element);
        }

        $root->appendChild($element);

        return $element;
    }

    public function validate()
    {
        $nodes = $this->getBuilder($this->type)->build($this->data);

        $errors = array();

        foreach ($nodes as $node) {
            $errors = array_merge($errors, $this->validateNode($node));
        }

        return $errors ?: null;
    }

    protected function validateNode(NodeInterface $node)
    {
        $errors = (array) $node->validate();

        foreach ($node->getChildren() as $child) {
            $errors = array_merge($errors, (array) $this->validateNode($child));
        }

        return $errors;
    }

    public function __toString()
    {
        return $this->build();
    }
}
