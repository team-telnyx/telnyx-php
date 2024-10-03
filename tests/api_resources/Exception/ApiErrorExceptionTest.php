<?php

namespace Telnyx\Exception;


use PHPUnit\Framework\Attributes\CoversClass;

class TestApiErrorException extends ApiErrorException
{
    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $telnyxCode = null
    ) {
        $instance = new self($message);
        $instance->setHttpStatus($httpStatus);
        $instance->setHttpBody($httpBody);
        $instance->setJsonBody($jsonBody);
        $instance->setHttpHeaders($httpHeaders);
        $instance->setTelnyxCode($telnyxCode);
        return $instance;
    }
}

#[CoversClass(\Telnyx\Exception\ApiErrorException::class)]
 
final class ApiErrorExceptionTest extends \Telnyx\TestCase
{
    public function createFixture(): TestApiErrorException
    {
        return TestApiErrorException::factory(
            'message',
            200, 
            // $httpBody
            '{"errors":[{"code":"some_code"}]}', 
            // $jsonBody
            [
                "errors" => [
                    [
                        "code" => "some_code",
                        "title" => "some_title",
                        "detail" => "some_detail",
                        "source" => [
                            "pointer" => "/some_pointer"
                        ],
                        "meta" => [
                            "url" => "some_url"
                        ]
                    ]
                ]
            ],

            // $httpHeaders
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],

            // $telnyxCode
            'some_code'
        );
        
    }

    /**
     * @skip
    public function testGetters()
    {
        $e = $this->createFixture();

        static::assertSame(200, $e->getHttpStatus());
        static::assertSame('{"errors":[{"code":"some_code"}]}', $e->getHttpBody());
        static::assertSame([
            "errors" => [
                [
                    "code" => "some_code",
                    "title" => "some_title",
                    "detail" => "some_detail",
                    "source" => [
                        "pointer" => "/some_pointer"
                    ],
                    "meta" => [
                        "url" => "some_url"
                    ]
                ]
            ]
        ], $e->getJsonBody());

        static::assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        static::assertSame('some_code', $e->getTelnyxCode());
        static::assertNotNull($e->getError());
        static::assertSame('some_code', $e->getError()->code);
        static::assertSame('some_detail', $e->getError()->detail);
        static::assertSame('some_title', $e->getError()->title);
    }
    */

    public function testToString()
    {
        $e = $this->createFixture();
        $e->setRequestId('req_test');
        static::assertStringContainsString('(Request req_test)', (string) $e);
    }

    public function testNull()
    {
        $result = TestApiErrorException::factory(
            'message',
            200,

            // $httpBody
            '{"errors":[{"code":"some_code"}]}',

            // $jsonBody
            null,

            // $httpHeaders
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],

            // $telnyxCode
            'some_code'
        );

        static::assertNull($result->getError());
    }
}
