<?php

namespace Tests\Services\X402;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettleResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CreditAccountTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreateQuote(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->x402->creditAccount->createQuote(
            amountUsd: '50.00'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreditAccountNewQuoteResponse::class, $result);
    }

    #[Test]
    public function testCreateQuoteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->x402->creditAccount->createQuote(
            amountUsd: '50.00'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreditAccountNewQuoteResponse::class, $result);
    }

    #[Test]
    public function testSettle(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->x402->creditAccount->settle(id: 'quote_abc123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreditAccountSettleResponse::class, $result);
    }

    #[Test]
    public function testSettleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->x402->creditAccount->settle(
            id: 'quote_abc123',
            paymentSignature: '0xabc123...',
            paymentSignatureHeader: 'PAYMENT-SIGNATURE',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreditAccountSettleResponse::class, $result);
    }
}
