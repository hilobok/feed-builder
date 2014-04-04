# Feed builder
Library for building and validating RSS 2.0 and Atom 1.0 feeds.
Conforms with [RSS 2.0](http://validator.w3.org/feed/docs/rss2.html) and [Atom 1.0](http://tools.ietf.org/html/rfc4287) specifications.

## Note
Validator not fully completed, no tests, pre-release.

## Installation
Install via composer with command:

```bash
$ php composer.phar require 'anh/feed-builder:~1.0'
```

## Usage

### Atom 1.0 example
```php
<?php

require 'vendor/autoload.php';

use Anh\FeedBuilder\FeedBuilder;

$feed = new FeedBuilder();

$feed
    ->setType('atom')
    ->fromArray(array(
        'title' => 'Another feed title',
        'author' => array(
            'name' => 'John Doe',
        ),
        'link' => array(
            'rel' => 'self',
            'href' => 'http://some-host.tld/articles',
        ),
        'id' => 'http://some-host.tld/some/link',
        'updated' => '2014-01-10',
        'category1' => 'Articles',
        'category2' => array(
            'term' => 'Life & stuff',
            'scheme' => 'http://some-host.tld/category/3',
            'label' => 'Life & stuff'
        ),
        'rights' => 'John & Jane (c) 2014',
        'entry-1' => array(
            'title' => 'This is so title',
            'link' => '/articles/1',
            'id' => 'http://some-host.tld/articles/1',
            'published' => 'tomorrow',
            'updated' => '1 min ago',
            'content' => 'Content of article'
        ),
        'entry_2' => array(
            'title' => 'This is a second entry title',
            'link' => '/articles/2',
            'id' => 'http://some-host.tld/articles/2',
            'updated' => '2 min ago',
            'summary' => 'Summary of article'
        ),
        'entry3' => array(
            'title' => 'Let\'s talk about atom',
            'link' => '/articles/3',
            'id' => 'http://some-host.tld/articles/3',
            'updated' => '3 min ago',
            'category' => 'From Jane',
            'content' => array(
                'type' => 'html',
                '<div>Content with some <i>html</i> <b>markup</b>.</div>',
            ),
            'author' => array(
                'name' => 'Jane Doe',
                'email' => 'jane.doe@some-host.tld'
            )
        )
    ))
;

var_dump($feed->validate());

echo $feed;
```

### RSS 2.0 example
```php
<?php

require 'vendor/autoload.php';

use Anh\FeedBuilder\FeedBuilder;

$feed = new FeedBuilder();

$feed
    ->setType('rss')
    ->fromArray(array(
        'title' => 'Another feed title',
        'link' => '/some/link',
        'pubDate' => 'yesterday',
        'category' => 'Another & category',
        'cloud' => '',
        'copyright' => '(c) 2014',
        'image' => array(
        ),
        'skipDays' => array(
            'day1' => 'Monday',
            'day2' => 'Tuesday'
        ),
        'skipHours' => array(
            'hour1' => 10,
            'hour2' => 11,
            'hour3' => 12
        ),
        'textInput' => array(
        ),
        'ttl' => '60',
        'item' => array(
            'title' => 'Item title',
            'link' => '/item/link',
            'guid' => array(
                '/some/guid',
                'isPermaLink' => 'no'
            ),
            'pubDate' => '2 days ago',
            'description' => 'Item description'
        ),
        'item2' => array(
            'title' => 'This is second item'
        )
    ))
;

var_dump($feed->validate());

echo $feed;
```
