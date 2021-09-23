<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\DocumentLink
 */
final class DocumentLinkTest extends \Telnyx\TestCase
{
    const TEST_RESOURCE_ID = '6a09cdc3-8948-47f0-aa62-74ac943d6c58';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v2/document_links'
        );
        $resources = DocumentLink::all();
        $this->assertInstanceOf(\Telnyx\Collection::class, $resources);
        $this->assertInstanceOf(\Telnyx\DocumentLink::class, $resources['data'][0]);
    }
}
