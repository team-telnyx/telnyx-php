<?php

namespace Tests\Services\AI\Missions\Runs;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TelnyxAgentsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxAgentListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxAgentListResponse::class, $result);
    }

    #[Test]
    public function testLink(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->link(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            telnyxAgentID: 'telnyx_agent_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxAgentLinkResponse::class, $result);
    }

    #[Test]
    public function testLinkWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->link(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            telnyxAgentID: 'telnyx_agent_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxAgentLinkResponse::class, $result);
    }

    #[Test]
    public function testUnlink(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->unlink(
            'telnyx_agent_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUnlinkWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->missions->runs->telnyxAgents->unlink(
            'telnyx_agent_id',
            missionID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            runID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
