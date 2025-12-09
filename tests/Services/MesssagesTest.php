<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Messsages\MesssageRcsResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MesssagesTest extends TestCase
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
    public function testRcs(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->rcs([
            'agent_id' => 'Agent007',
            'agent_message' => [],
            'messaging_profile_id' => 'messaging_profile_id',
            'to' => '+13125551234',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageRcsResponse::class, $result);
    }

    #[Test]
    public function testRcsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->rcs([
            'agent_id' => 'Agent007',
            'agent_message' => [
                'content_message' => [
                    'content_info' => [
                        'file_url' => 'https://example.com/elephant.jpg',
                        'force_refresh' => true,
                        'thumbnail_url' => 'thumbnail_url',
                    ],
                    'rich_card' => [
                        'carousel_card' => [
                            'card_contents' => [
                                [
                                    'description' => 'description',
                                    'media' => [
                                        'content_info' => [
                                            'file_url' => 'https://example.com/elephant.jpg',
                                            'force_refresh' => true,
                                            'thumbnail_url' => 'thumbnail_url',
                                        ],
                                        'height' => 'MEDIUM',
                                    ],
                                    'suggestions' => [
                                        [
                                            'action' => [
                                                'create_calendar_event_action' => [
                                                    'description' => 'description',
                                                    'end_time' => new \DateTimeImmutable(
                                                        '2024-10-02T15:02:31Z'
                                                    ),
                                                    'start_time' => new \DateTimeImmutable(
                                                        '2024-10-02T15:01:23Z'
                                                    ),
                                                    'title' => 'title',
                                                ],
                                                'dial_action' => ['phone_number' => '+13125551234'],
                                                'fallback_url' => 'fallback_url',
                                                'open_url_action' => [
                                                    'application' => 'BROWSER',
                                                    'url' => 'http://example.com',
                                                    'webview_view_mode' => 'HALF',
                                                    'description' => 'description',
                                            ],
                                                'postback_data' => 'postback_data',
                                                'share_location_action' => [],
                                                'text' => 'Hello world',
                                                'view_location_action' => [
                                                    'label' => 'label',
                                                    'lat_long' => [
                                                        'latitude' => 41.8, 'longitude' => -87.6,
                                                    ],
                                                    'query' => 'query',
                                            ],
                                            ],
                                            'reply' => [
                                            'postback_data' => 'postback_data', 'text' => 'text',
                                        ],
                                        ],
                                    ],
                                    'title' => 'Elephant',
                                ],
                            ],
                            'card_width' => 'SMALL',
                        ],
                        'standalone_card' => [
                        'card_content' => [
                            'description' => 'description',
                            'media' => [
                                'content_info' => [
                                    'file_url' => 'https://example.com/elephant.jpg',
                                    'force_refresh' => true,
                                    'thumbnail_url' => 'thumbnail_url',
                                ],
                                'height' => 'MEDIUM',
                            ],
                            'suggestions' => [
                                [
                                    'action' => [
                                        'create_calendar_event_action' => [
                                            'description' => 'description',
                                            'end_time' => new \DateTimeImmutable(
                                                '2024-10-02T15:02:31Z'
                                            ),
                                            'start_time' => new \DateTimeImmutable(
                                                '2024-10-02T15:01:23Z'
                                            ),
                                            'title' => 'title',
                                        ],
                                        'dial_action' => ['phone_number' => '+13125551234'],
                                        'fallback_url' => 'fallback_url',
                                        'open_url_action' => [
                                            'application' => 'BROWSER',
                                            'url' => 'http://example.com',
                                            'webview_view_mode' => 'HALF',
                                            'description' => 'description',
                                        ],
                                        'postback_data' => 'postback_data',
                                        'share_location_action' => [],
                                        'text' => 'Hello world',
                                        'view_location_action' => [
                                            'label' => 'label',
                                            'lat_long' => [
                                                'latitude' => 41.8, 'longitude' => -87.6,
                                            ],
                                            'query' => 'query',
                                        ],
                                    ],
                                    'reply' => [
                                        'postback_data' => 'postback_data', 'text' => 'text',
                                    ],
                                ],
                            ],
                            'title' => 'Elephant',
                        ],
                        'card_orientation' => 'HORIZONTAL',
                        'thumbnail_image_alignment' => 'LEFT',
                    ],
                    ],
                    'suggestions' => [
                    [
                        'action' => [
                            'create_calendar_event_action' => [
                                'description' => 'description',
                                'end_time' => new \DateTimeImmutable('2024-10-02T15:02:31Z'),
                                'start_time' => new \DateTimeImmutable(
                                    '2024-10-02T15:01:23Z'
                                ),
                                'title' => 'title',
                            ],
                            'dial_action' => ['phone_number' => '+13125551234'],
                            'fallback_url' => 'fallback_url',
                            'open_url_action' => [
                                'application' => 'BROWSER',
                                'url' => 'http://example.com',
                                'webview_view_mode' => 'HALF',
                                'description' => 'description',
                            ],
                            'postback_data' => 'postback_data',
                            'share_location_action' => [],
                            'text' => 'Hello world',
                            'view_location_action' => [
                                'label' => 'label',
                                'lat_long' => ['latitude' => 41.8, 'longitude' => -87.6],
                                'query' => 'query',
                            ],
                        ],
                        'reply' => ['postback_data' => 'postback_data', 'text' => 'text'],
                    ],
                ],
                    'text' => 'Hello world!',
                ],
                'event' => ['event_type' => 'IS_TYPING'],
                'expire_time' => new \DateTimeImmutable('2024-10-02T15:01:23Z'),
                'ttl' => '10.5s',
            ],
            'messaging_profile_id' => 'messaging_profile_id',
            'to' => '+13125551234',
            'mms_fallback' => [
            'from' => '+13125551234',
            'media_urls' => ['string'],
            'subject' => 'Test Message',
            'text' => 'Hello world!',
        ],
            'sms_fallback' => ['from' => '+13125551234', 'text' => 'Hello world!'],
            'type' => 'RCS',
            'webhook_url' => 'webhook_url',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageRcsResponse::class, $result);
    }
}
