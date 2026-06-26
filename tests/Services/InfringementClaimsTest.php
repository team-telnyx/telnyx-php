<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\InfringementClaims\InfringementClaimContestResponse;
use Telnyx\InfringementClaims\InfringementClaimGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class InfringementClaimsTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->infringementClaims->retrieve(
            'e379fbc8-cd83-4bef-a280-a0ac9d00dcf8'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InfringementClaimGetResponse::class, $result);
    }

    #[Test]
    public function testContest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->infringementClaims->contest(
            'e379fbc8-cd83-4bef-a280-a0ac9d00dcf8',
            contestNotes: 'We own the trademark outright; our registration precedes the claimant by three years. See attached certificate.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InfringementClaimContestResponse::class, $result);
    }

    #[Test]
    public function testContestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->infringementClaims->contest(
            'e379fbc8-cd83-4bef-a280-a0ac9d00dcf8',
            contestNotes: 'We own the trademark outright; our registration precedes the claimant by three years. See attached certificate.',
            documents: [
                [
                    'documentID' => '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
                    'documentType' => 'trademark_registration',
                    'description' => 'USPTO trademark certificate.',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InfringementClaimContestResponse::class, $result);
    }
}
