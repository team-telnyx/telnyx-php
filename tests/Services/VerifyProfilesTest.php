<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VerifyProfilesTest extends TestCase
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

        $result = $this->client->verifyProfiles->create(['name' => 'Test Profile']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileData::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->create([
            'name' => 'Test Profile',
            'call' => [
                'app_name' => 'Example Secure App',
                'code_length' => 6,
                'default_verification_timeout_secs' => 300,
                'messaging_template_id' => '0abb5b4f-459f-445a-bfcd-488998b7572d',
                'whitelisted_destinations' => ['US', 'CA'],
            ],
            'flashcall' => [
                'default_verification_timeout_secs' => 300,
                'whitelisted_destinations' => ['US', 'CA'],
            ],
            'language' => 'en-US',
            'sms' => [
                'whitelisted_destinations' => ['US', 'CA'],
                'alpha_sender' => 'sqF',
                'app_name' => 'Example Secure App',
                'code_length' => 6,
                'default_verification_timeout_secs' => 300,
                'messaging_template_id' => '0abb5b4f-459f-445a-bfcd-488998b7572d',
            ],
            'webhook_failover_url' => 'http://example.com/webhook/failover',
            'webhook_url' => 'http://example.com/webhook',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileData::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->retrieve(
            '12ade33a-21c0-473b-b055-b3c836e1c292'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileData::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->update(
            '12ade33a-21c0-473b-b055-b3c836e1c292',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileData::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->delete(
            '12ade33a-21c0-473b-b055-b3c836e1c292'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileData::class, $result);
    }

    #[Test]
    public function testCreateTemplate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->createTemplate([
            'text' => 'Your {{app_name}} verification code is: {{code}}.',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageTemplate::class, $result);
    }

    #[Test]
    public function testCreateTemplateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->createTemplate([
            'text' => 'Your {{app_name}} verification code is: {{code}}.',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageTemplate::class, $result);
    }

    #[Test]
    public function testRetrieveTemplates(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->retrieveTemplates();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyProfileGetTemplatesResponse::class, $result);
    }

    #[Test]
    public function testUpdateTemplate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->updateTemplate(
            '12ade33a-21c0-473b-b055-b3c836e1c292',
            ['text' => 'Your {{app_name}} verification code is: {{code}}.'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageTemplate::class, $result);
    }

    #[Test]
    public function testUpdateTemplateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifyProfiles->updateTemplate(
            '12ade33a-21c0-473b-b055-b3c836e1c292',
            ['text' => 'Your {{app_name}} verification code is: {{code}}.'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageTemplate::class, $result);
    }
}
