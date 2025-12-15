<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\MesssageWhatsappResponse;
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

        $result = $this->client->messsages->rcs(
            agentID: 'Agent007',
            agentMessage: [],
            messagingProfileID: 'messaging_profile_id',
            to: '+13125551234',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageRcsResponse::class, $result);
    }

    #[Test]
    public function testRcsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->rcs(
            agentID: 'Agent007',
            agentMessage: [
                'contentMessage' => [
                    'contentInfo' => [
                        'fileURL' => 'https://example.com/elephant.jpg',
                        'forceRefresh' => true,
                        'thumbnailURL' => 'thumbnail_url',
                    ],
                    'richCard' => [
                        'carouselCard' => [
                            'cardContents' => [
                                [
                                    'description' => 'description',
                                    'media' => [
                                        'contentInfo' => [
                                            'fileURL' => 'https://example.com/elephant.jpg',
                                            'forceRefresh' => true,
                                            'thumbnailURL' => 'thumbnail_url',
                                        ],
                                        'height' => 'MEDIUM',
                                    ],
                                    'suggestions' => [
                                        [
                                            'action' => [
                                                'createCalendarEventAction' => [
                                                    'description' => 'description',
                                                    'endTime' => new \DateTimeImmutable(
                                                        '2024-10-02T15:02:31Z'
                                                    ),
                                                    'startTime' => new \DateTimeImmutable(
                                                        '2024-10-02T15:01:23Z'
                                                    ),
                                                    'title' => 'title',
                                                ],
                                                'dialAction' => ['phoneNumber' => '+13125551234'],
                                                'fallbackURL' => 'fallback_url',
                                                'openURLAction' => [
                                                    'application' => 'BROWSER',
                                                    'url' => 'http://example.com',
                                                    'webviewViewMode' => 'HALF',
                                                    'description' => 'description',
                                            ],
                                                'postbackData' => 'postback_data',
                                                'shareLocationAction' => ['foo' => 'bar'],
                                                'text' => 'Hello world',
                                                'viewLocationAction' => [
                                                    'label' => 'label',
                                                    'latLong' => [
                                                        'latitude' => 41.8, 'longitude' => -87.6,
                                                    ],
                                                    'query' => 'query',
                                            ],
                                            ],
                                            'reply' => [
                                            'postbackData' => 'postback_data', 'text' => 'text',
                                        ],
                                        ],
                                    ],
                                    'title' => 'Elephant',
                                ],
                            ],
                            'cardWidth' => 'SMALL',
                        ],
                        'standaloneCard' => [
                        'cardContent' => [
                            'description' => 'description',
                            'media' => [
                                'contentInfo' => [
                                    'fileURL' => 'https://example.com/elephant.jpg',
                                    'forceRefresh' => true,
                                    'thumbnailURL' => 'thumbnail_url',
                                ],
                                'height' => 'MEDIUM',
                            ],
                            'suggestions' => [
                                [
                                    'action' => [
                                        'createCalendarEventAction' => [
                                            'description' => 'description',
                                            'endTime' => new \DateTimeImmutable(
                                                '2024-10-02T15:02:31Z'
                                            ),
                                            'startTime' => new \DateTimeImmutable(
                                                '2024-10-02T15:01:23Z'
                                            ),
                                            'title' => 'title',
                                        ],
                                        'dialAction' => ['phoneNumber' => '+13125551234'],
                                        'fallbackURL' => 'fallback_url',
                                        'openURLAction' => [
                                            'application' => 'BROWSER',
                                            'url' => 'http://example.com',
                                            'webviewViewMode' => 'HALF',
                                            'description' => 'description',
                                        ],
                                        'postbackData' => 'postback_data',
                                        'shareLocationAction' => ['foo' => 'bar'],
                                        'text' => 'Hello world',
                                        'viewLocationAction' => [
                                            'label' => 'label',
                                            'latLong' => ['latitude' => 41.8, 'longitude' => -87.6],
                                            'query' => 'query',
                                        ],
                                    ],
                                    'reply' => [
                                        'postbackData' => 'postback_data', 'text' => 'text',
                                    ],
                                ],
                            ],
                            'title' => 'Elephant',
                        ],
                        'cardOrientation' => 'HORIZONTAL',
                        'thumbnailImageAlignment' => 'LEFT',
                    ],
                    ],
                    'suggestions' => [
                    [
                        'action' => [
                            'createCalendarEventAction' => [
                                'description' => 'description',
                                'endTime' => new \DateTimeImmutable('2024-10-02T15:02:31Z'),
                                'startTime' => new \DateTimeImmutable('2024-10-02T15:01:23Z'),
                                'title' => 'title',
                            ],
                            'dialAction' => ['phoneNumber' => '+13125551234'],
                            'fallbackURL' => 'fallback_url',
                            'openURLAction' => [
                                'application' => 'BROWSER',
                                'url' => 'http://example.com',
                                'webviewViewMode' => 'HALF',
                                'description' => 'description',
                            ],
                            'postbackData' => 'postback_data',
                            'shareLocationAction' => ['foo' => 'bar'],
                            'text' => 'Hello world',
                            'viewLocationAction' => [
                                'label' => 'label',
                                'latLong' => ['latitude' => 41.8, 'longitude' => -87.6],
                                'query' => 'query',
                            ],
                        ],
                        'reply' => ['postbackData' => 'postback_data', 'text' => 'text'],
                    ],
                ],
                    'text' => 'Hello world!',
                ],
                'event' => ['eventType' => 'IS_TYPING'],
                'expireTime' => new \DateTimeImmutable('2024-10-02T15:01:23Z'),
                'ttl' => '10.5s',
            ],
            messagingProfileID: 'messaging_profile_id',
            to: '+13125551234',
            mmsFallback: [
                'from' => '+13125551234',
                'mediaURLs' => ['string'],
                'subject' => 'Test Message',
                'text' => 'Hello world!',
            ],
            smsFallback: ['from' => '+13125551234', 'text' => 'Hello world!'],
            type: 'RCS',
            webhookURL: 'webhook_url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageRcsResponse::class, $result);
    }

    #[Test]
    public function testWhatsapp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->whatsapp(
            from: '+13125551234',
            to: '+13125551234',
            whatsappMessage: []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageWhatsappResponse::class, $result);
    }

    #[Test]
    public function testWhatsappWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->whatsapp(
            from: '+13125551234',
            to: '+13125551234',
            whatsappMessage: [
                'audio' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'bizOpaqueCallbackData' => 'biz_opaque_callback_data',
                'contacts' => [
                    [
                        'addresses' => [
                            [
                                'city' => 'city',
                                'country' => 'country',
                                'countryCode' => 'country_code',
                                'state' => 'state',
                                'street' => 'street',
                                'type' => 'type',
                                'zip' => 'zip',
                            ],
                        ],
                        'birthday' => 'birthday',
                        'emails' => [['email' => 'email', 'type' => 'type']],
                        'name' => 'name',
                        'org' => [
                            'company' => 'company',
                            'department' => 'department',
                            'title' => 'title',
                        ],
                        'phones' => [
                            ['phone' => 'phone', 'type' => 'type', 'waID' => 'wa_id'],
                        ],
                        'urls' => [['type' => 'type', 'url' => 'url']],
                    ],
                ],
                'document' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'image' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'interactive' => [
                    'action' => [
                        'button' => 'button',
                        'buttons' => [
                            ['reply' => ['id' => 'id', 'title' => 'title'], 'type' => 'reply'],
                        ],
                        'cards' => [
                            [
                                'action' => [
                                    'catalogID' => 'catalog_id',
                                    'productRetailerID' => 'product_retailer_id',
                                ],
                                'body' => ['text' => 'text'],
                                'cardIndex' => 0,
                                'header' => [
                                    'image' => [
                                        'caption' => 'caption',
                                        'filename' => 'filename',
                                        'link' => 'http://example.com/media.jpg',
                                        'voice' => true,
                                    ],
                                    'type' => 'image',
                                    'video' => [
                                        'caption' => 'caption',
                                        'filename' => 'filename',
                                        'link' => 'http://example.com/media.jpg',
                                        'voice' => true,
                                    ],
                                ],
                                'type' => 'cta_url',
                            ],
                        ],
                        'catalogID' => 'catalog_id',
                        'mode' => 'mode',
                        'name' => 'name',
                        'parameters' => ['displayText' => 'display_text', 'url' => 'url'],
                        'productRetailerID' => 'product_retailer_id',
                        'sections' => [
                            [
                                'productItems' => [
                                    ['productRetailerID' => 'product_retailer_id'],
                                ],
                                'rows' => [
                                    [
                                        'id' => 'id',
                                        'description' => 'description',
                                        'title' => 'title',
                                    ],
                                ],
                                'title' => 'title',
                            ],
                        ],
                    ],
                    'body' => ['text' => 'text'],
                    'footer' => ['text' => 'text'],
                    'header' => [
                        'document' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                        'image' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                        'subText' => 'sub_text',
                        'text' => 'text',
                        'video' => [
                            'caption' => 'caption',
                            'filename' => 'filename',
                            'link' => 'http://example.com/media.jpg',
                            'voice' => true,
                        ],
                    ],
                    'type' => 'cta_url',
                ],
                'location' => [
                    'address' => 'address',
                    'latitude' => 'latitude',
                    'longitude' => 'longitude',
                    'name' => 'name',
                ],
                'reaction' => ['empji' => 'empji', 'messageID' => 'message_id'],
                'sticker' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
                'type' => 'audio',
                'video' => [
                    'caption' => 'caption',
                    'filename' => 'filename',
                    'link' => 'http://example.com/media.jpg',
                    'voice' => true,
                ],
            ],
            type: 'WHATSAPP',
            webhookURL: 'webhook_url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MesssageWhatsappResponse::class, $result);
    }
}
