<?php

namespace Tests\Services\Dir;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Dir\References\ReferenceList;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ReferencesTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->references->create(
            '16635d38-75a6-4481-82e8-69af60e05011',
            businessReferences: [
                [
                    'email' => 'dana.reyes@example.com',
                    'fullName' => 'Dana Reyes',
                    'phoneE164' => '+14155550123',
                    'timezone' => 'America/New_York',
                ],
                [
                    'email' => 'dana.reyes@example.com',
                    'fullName' => 'Dana Reyes',
                    'phoneE164' => '+14155550123',
                    'timezone' => 'America/New_York',
                ],
            ],
            financialReference: [
                'email' => 'dana.reyes@example.com',
                'fullName' => 'Dana Reyes',
                'phoneE164' => '+14155550123',
                'timezone' => 'America/New_York',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReferenceList::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->references->create(
            '16635d38-75a6-4481-82e8-69af60e05011',
            businessReferences: [
                [
                    'email' => 'dana.reyes@example.com',
                    'fullName' => 'Dana Reyes',
                    'phoneE164' => '+14155550123',
                    'timezone' => 'America/New_York',
                    'jobTitle' => 'VP of Operations',
                    'organization' => 'Acme Logistics',
                    'relationshipToRegistrant' => 'Supplier',
                ],
                [
                    'email' => 'dana.reyes@example.com',
                    'fullName' => 'Dana Reyes',
                    'phoneE164' => '+14155550123',
                    'timezone' => 'America/New_York',
                    'jobTitle' => 'VP of Operations',
                    'organization' => 'Acme Logistics',
                    'relationshipToRegistrant' => 'Supplier',
                ],
            ],
            financialReference: [
                'email' => 'dana.reyes@example.com',
                'fullName' => 'Dana Reyes',
                'phoneE164' => '+14155550123',
                'timezone' => 'America/New_York',
                'jobTitle' => 'VP of Operations',
                'organization' => 'Acme Logistics',
                'relationshipToRegistrant' => 'Supplier',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReferenceList::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->references->update(
            0,
            dirID: '16635d38-75a6-4481-82e8-69af60e05011',
            refType: 'business'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReferenceUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->references->update(
            0,
            dirID: '16635d38-75a6-4481-82e8-69af60e05011',
            refType: 'business',
            email: 'dana.reyes@example.com',
            fullName: 'Dana Reyes',
            jobTitle: 'VP of Operations',
            organization: 'Acme Logistics',
            phoneE164: '+14155550123',
            relationshipToRegistrant: 'Supplier',
            timezone: 'America/New_York',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReferenceUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->references->list(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReferenceList::class, $result);
    }
}
