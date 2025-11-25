<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TestsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->create([
            'destination' => '+15551234567',
            'instructions' => 'Act as a frustrated customer who received a damaged product. Ask for a refund and escalate if not satisfied with the initial response.',
            'name' => 'Customer Support Bot Test',
            'rubric' => [
                [
                    'criteria' => 'Assistant responds within 30 seconds',
                    'name' => 'Response Time',
                ],
                [
                    'criteria' => 'Provides correct product information',
                    'name' => 'Accuracy',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->create([
            'destination' => '+15551234567',
            'instructions' => 'Act as a frustrated customer who received a damaged product. Ask for a refund and escalate if not satisfied with the initial response.',
            'name' => 'Customer Support Bot Test',
            'rubric' => [
                [
                    'criteria' => 'Assistant responds within 30 seconds',
                    'name' => 'Response Time',
                ],
                [
                    'criteria' => 'Provides correct product information',
                    'name' => 'Accuracy',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->retrieve('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->update('test_id', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->tests->delete('test_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
