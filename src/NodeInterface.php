<?php

namespace Anh\FeedBuilder;

interface NodeInterface
{
    public function getName();

    public function getAllowedChildren();

    public function getRequiredChildren();

    public function getAllowedAttributes();

    public function getRequiredAttributes();

    public function getDefaultAttributes();

    public function getChildren();

    public function getAttributes();

    public function getValue();

    public function validate();
}
