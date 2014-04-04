<?php

namespace Anh\FeedBuilder\Rss\Node;

use Anh\FeedBuilder\AbstractNode;

/**
 * It specifies a web service that supports the rssCloud interface
 * which can be implemented in HTTP-POST, XML-RPC or SOAP 1.1.
 * Its purpose is to allow processes to register with a cloud to be notified of updates to the channel,
 * implementing a lightweight publish-subscribe protocol for RSS feeds.
 */
class CloudNode extends AbstractNode
{
    public function getRequiredAttributes()
    {
        return array(
            'domain',
            'port',
            'path',
            'registerProcedure',
            'protocol'
        );
    }
}
