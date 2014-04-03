<?php

namespace Anh\FeedBuilder;

abstract class AbstractTransformer
{
    public function transform($data)
    {
        $data = $this->preTransform($data);
        $map = $this->getMap();

        foreach ($data as $key => $value) {
            list($newKey, $newValue) = $this->doTransform($key, $value, $map);

            if ($newKey) {
                $new[$newKey] = $newValue;
            }
        }

        return $this->postTransform($new);
    }

    protected function doTransform($key, $value, $map)
    {
        $normalizedKey = preg_replace('/[_-]?\d+$/', '', $key);

        if (isset($map[$normalizedKey])) {
            if (is_callable($map[$normalizedKey])) {
                return call_user_func_array($map[$normalizedKey], array($key, $value));
            // } elseif (is_array($map[$normalizedKey])) {
            } else {
                $newKey = preg_replace(
                    sprintf('/^%s/', $normalizedKey),
                    $map[$normalizedKey],
                    $key
                );
            }
        } else {
            $newKey = $key;
        }

        if (is_array($value)) {
            foreach ($value as $subKey => $subValue) {
                list($newSubKey, $newSubValue) = $this->doTransform($subKey, $subValue, $map);
                $newValue[$newSubKey] = $newSubValue;
            }
        } else {
            $newValue = $value;
        }

        return array($newKey, $newValue);
    }

    protected function preTransform($data)
    {
        if (isset($data['feed'])) {
            $data = $data['feed'];
        }

        if (isset($data['rss'])) {
            $data = $data['rss'];
        }

        if (isset($data['channel'])) {
            $data = $data['channel'];
        }

        return $data;
    }

    abstract protected function getMap();
    abstract protected function postTransform($data);
}