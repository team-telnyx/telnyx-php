<?php

namespace Tests\Services\AI\Typesafe;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class V1Test extends TestCase
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
    public function testSystemone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->typesafe->v1->systemone(
            questions: [
                'team' => [
                    'criteria' => [
                        'billing' => 'Payments and refunds',
                        'technical_support' => 'Service faults and technical problems',
                        'sales' => 'New purchases',
                    ],
                    'instructions' => 'Choose the team that should handle this incident.',
                    'type' => 'choice',
                ],
                'production_incident' => [
                    'instructions' => 'Does the message describe an active production incident?',
                    'type' => 'noul',
                ],
                'urgency' => [
                    'criteria' => ['Low', 'Normal', 'High', 'Critical'],
                    'instructions' => 'Rate operational urgency.',
                    'type' => 'score',
                ],
            ],
            state: 'Our production calls are failing. Every customer is affected.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(V1SystemoneResponse::class, $result);
    }

    #[Test]
    public function testSystemoneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->typesafe->v1->systemone(
            questions: [
                'team' => [
                    'criteria' => [
                        'billing' => 'Payments and refunds',
                        'technical_support' => 'Service faults and technical problems',
                        'sales' => 'New purchases',
                    ],
                    'instructions' => 'Choose the team that should handle this incident.',
                    'type' => 'choice',
                ],
                'production_incident' => [
                    'instructions' => 'Does the message describe an active production incident?',
                    'type' => 'noul',
                    'criteria' => ['false' => 'false', 'true' => 'true'],
                ],
                'urgency' => [
                    'criteria' => ['Low', 'Normal', 'High', 'Critical'],
                    'instructions' => 'Rate operational urgency.',
                    'type' => 'score',
                ],
            ],
            state: 'Our production calls are failing. Every customer is affected.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(V1SystemoneResponse::class, $result);
    }
}
