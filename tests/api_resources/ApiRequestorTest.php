<?php

namespace Telnyx;

use Telnyx\HttpClient\CurlClient;

/**
 * @internal
 * @covers \Telnyx\ApiRequestor
 */
final class ApiRequestorTest extends \Telnyx\TestCase
{
    public function testEncodeObjects()
    {
        $reflector = new \ReflectionClass(\Telnyx\ApiRequestor::class);
        $method = $reflector->getMethod('_encodeObjects');
        $method->setAccessible(true);

        $a = ['customer' => new PhoneNumber('abcd')];
        $enc = $method->invoke(null, $a);
        static::assertSame($enc, ['customer' => 'abcd']);

        // Preserves UTF-8
        $v = ['customer' => '☃'];
        $enc = $method->invoke(null, $v);
        static::assertSame($enc, $v);

        // Encodes latin-1 -> UTF-8
        $v = ['customer' => "\xe9"];
        $enc = $method->invoke(null, $v);
        static::assertSame($enc, ['customer' => "\xc3\xa9"]);

        // Encodes booleans
        $v = true;
        $enc = $method->invoke(null, $v);
        static::assertSame('true', $enc);

        $v = false;
        $enc = $method->invoke(null, $v);
        static::assertSame('false', $enc);
    }

    public function testHttpClientInjection()
    {
        $reflector = new \ReflectionClass(\Telnyx\ApiRequestor::class);
        $method = $reflector->getMethod('httpClient');
        $method->setAccessible(true);

        $curl = new CurlClient();
        $curl->setTimeout(10);
        ApiRequestor::setHttpClient($curl);

        $injectedCurl = $method->invoke(new ApiRequestor());
        static::assertSame($injectedCurl, $curl);
    }

    public function testDefaultHeaders()
    {
        $reflector = new \ReflectionClass(\Telnyx\ApiRequestor::class);
        $method = $reflector->getMethod('_defaultHeaders');
        $method->setAccessible(true);

        // no way to stub static methods with PHPUnit 4.x :(
        Telnyx::setAppInfo('MyTestApp', '1.2.34', 'https://mytestapp.example', 'partner_1234');
        $apiKey = 'sk_test_notarealkey';
        $clientInfo = ['httplib' => 'testlib 0.1.2'];

        $headers = $method->invoke(null, $apiKey, $clientInfo);

        $ua = \json_decode($headers['X-Telnyx-Client-User-Agent']);
        static::assertSame($ua->application->name, 'MyTestApp');
        static::assertSame($ua->application->version, '1.2.34');
        static::assertSame($ua->application->url, 'https://mytestapp.example');
        static::assertSame($ua->application->partner_id, 'partner_1234');

        static::assertSame($ua->httplib, 'testlib 0.1.2');

        static::assertSame(
            $headers['User-Agent'],
            'Telnyx/v2 PhpBindings/' . Telnyx::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)'
        );

        static::assertSame($headers['Authorization'], 'Bearer ' . $apiKey);
    }

    public function testRaisesAuthenticationErrorWhenNoApiKey()
    {
        $this->expectException(\Telnyx\Exception\AuthenticationException::class);
        $this->expectExceptionMessageRegExp('#No API key provided#');

        Telnyx::setApiKey(null);
        Call::create();
    }

    public function testHeaderTelnyxVersionGlobal()
    {
        Telnyx::setApiVersion('2222-22-22');
        $this->stubRequest(
            'POST',
            '/v2/calls',
            [],
            [
                'Telnyx-Version: 2222-22-22',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Call::create();
    }

    public function testHeaderTelnyxVersionRequestOptions()
    {
        $this->stubRequest(
            'POST',
            '/v2/calls',
            [],
            [
                'Telnyx-Version: 2222-22-22',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Call::create([], ['telnyx_version' => '2222-22-22']);
    }

    public function testHeaderTelnyxAccountGlobal()
    {
        Telnyx::setAccountId('acct_123');
        $this->stubRequest(
            'POST',
            '/v2/calls',
            [],
            [
                'Telnyx-Account: acct_123',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Call::create();
    }

    public function testHeaderTelnyxAccountRequestOptions()
    {
        $this->stubRequest(
            'POST',
            '/v2/calls',
            [],
            [
                'Telnyx-Account: acct_123',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Call::create([], ['telnyx_account' => 'acct_123']);
    }
}
