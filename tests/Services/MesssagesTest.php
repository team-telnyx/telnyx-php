<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;
use Telnyx\Messsages\RcsAgentMessage\Event;
use Telnyx\Messsages\RcsCardContent;
use Telnyx\Messsages\RcsCardContent\Media;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\Messsages\RcsSuggestion;
use Telnyx\Messsages\RcsSuggestion\Action;
use Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messsages\RcsSuggestion\Action\DialAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction\LatLong;
use Telnyx\Messsages\RcsSuggestion\Reply;
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
            agentMessage: (new RcsAgentMessage),
            messagingProfileID: 'messaging_profile_id',
            to: '+13125551234',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRcsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messsages->rcs(
            agentID: 'Agent007',
            agentMessage: (new RcsAgentMessage)
                ->withContentMessage(
                    (new ContentMessage)
                        ->withContentInfo(
                            RcsContentInfo::with(fileURL: 'https://example.com/elephant.jpg')
                                ->withForceRefresh(true)
                                ->withThumbnailURL('thumbnail_url'),
                        )
                        ->withRichCard(
                            (new RichCard)
                                ->withCarouselCard(
                                    CarouselCard::with(
                                        cardContents: [
                                            (new RcsCardContent)
                                                ->withDescription('description')
                                                ->withMedia(
                                                    (new Media)
                                                        ->withContentInfo(
                                                            RcsContentInfo::with(
                                                                fileURL: 'https://example.com/elephant.jpg'
                                                            )
                                                                ->withForceRefresh(true)
                                                                ->withThumbnailURL('thumbnail_url'),
                                                        )
                                                        ->withHeight('MEDIUM'),
                                                )
                                                ->withSuggestions(
                                                    [
                                                        (new RcsSuggestion)
                                                            ->withAction(
                                                                (new Action)
                                                                    ->withCreateCalendarEventAction(
                                                                        (new CreateCalendarEventAction)
                                                                            ->withDescription('description')
                                                                            ->withEndTime(
                                                                                new \DateTimeImmutable('2024-10-02T15:02:31Z')
                                                                            )
                                                                            ->withStartTime(
                                                                                new \DateTimeImmutable('2024-10-02T15:01:23Z')
                                                                            )
                                                                            ->withTitle('title'),
                                                                    )
                                                                    ->withDialAction(
                                                                        DialAction::with(phoneNumber: '+13125551234')
                                                                    )
                                                                    ->withFallbackURL('fallback_url')
                                                                    ->withOpenURLAction(
                                                                        OpenURLAction::with(
                                                                            application: 'BROWSER',
                                                                            url: 'http://example.com',
                                                                            webviewViewMode: 'HALF',
                                                                        )
                                                                            ->withDescription('description'),
                                                                    )
                                                                    ->withPostbackData('postback_data')
                                                                    ->withShareLocationAction((object) [])
                                                                    ->withText('Hello world')
                                                                    ->withViewLocationAction(
                                                                        (new ViewLocationAction)
                                                                            ->withLabel('label')
                                                                            ->withLatLong(
                                                                                LatLong::with(latitude: 41.8, longitude: -87.6)
                                                                            )
                                                                            ->withQuery('query'),
                                                                    ),
                                                            )
                                                            ->withReply(
                                                                (new Reply)
                                                                    ->withPostbackData('postback_data')
                                                                    ->withText('text'),
                                                            ),
                                                    ],
                                                )
                                                ->withTitle('Elephant'),
                                        ],
                                        cardWidth: 'SMALL',
                                    ),
                                )
                                ->withStandaloneCard(
                                    StandaloneCard::with(
                                        cardContent: (new RcsCardContent)
                                            ->withDescription('description')
                                            ->withMedia(
                                                (new Media)
                                                    ->withContentInfo(
                                                        RcsContentInfo::with(
                                                            fileURL: 'https://example.com/elephant.jpg'
                                                        )
                                                            ->withForceRefresh(true)
                                                            ->withThumbnailURL('thumbnail_url'),
                                                    )
                                                    ->withHeight('MEDIUM'),
                                            )
                                            ->withSuggestions(
                                                [
                                                    (new RcsSuggestion)
                                                        ->withAction(
                                                            (new Action)
                                                                ->withCreateCalendarEventAction(
                                                                    (new CreateCalendarEventAction)
                                                                        ->withDescription('description')
                                                                        ->withEndTime(
                                                                            new \DateTimeImmutable('2024-10-02T15:02:31Z')
                                                                        )
                                                                        ->withStartTime(
                                                                            new \DateTimeImmutable('2024-10-02T15:01:23Z')
                                                                        )
                                                                        ->withTitle('title'),
                                                                )
                                                                ->withDialAction(
                                                                    DialAction::with(phoneNumber: '+13125551234')
                                                                )
                                                                ->withFallbackURL('fallback_url')
                                                                ->withOpenURLAction(
                                                                    OpenURLAction::with(
                                                                        application: 'BROWSER',
                                                                        url: 'http://example.com',
                                                                        webviewViewMode: 'HALF',
                                                                    )
                                                                        ->withDescription('description'),
                                                                )
                                                                ->withPostbackData('postback_data')
                                                                ->withShareLocationAction((object) [])
                                                                ->withText('Hello world')
                                                                ->withViewLocationAction(
                                                                    (new ViewLocationAction)
                                                                        ->withLabel('label')
                                                                        ->withLatLong(
                                                                            LatLong::with(latitude: 41.8, longitude: -87.6)
                                                                        )
                                                                        ->withQuery('query'),
                                                                ),
                                                        )
                                                        ->withReply(
                                                            (new Reply)
                                                                ->withPostbackData('postback_data')
                                                                ->withText('text'),
                                                        ),
                                                ],
                                            )
                                            ->withTitle('Elephant'),
                                        cardOrientation: 'HORIZONTAL',
                                        thumbnailImageAlignment: 'LEFT',
                                    ),
                                ),
                        )
                        ->withSuggestions(
                            [
                                (new RcsSuggestion)
                                    ->withAction(
                                        (new Action)
                                            ->withCreateCalendarEventAction(
                                                (new CreateCalendarEventAction)
                                                    ->withDescription('description')
                                                    ->withEndTime(new \DateTimeImmutable('2024-10-02T15:02:31Z'))
                                                    ->withStartTime(
                                                        new \DateTimeImmutable('2024-10-02T15:01:23Z')
                                                    )
                                                    ->withTitle('title'),
                                            )
                                            ->withDialAction(DialAction::with(phoneNumber: '+13125551234'))
                                            ->withFallbackURL('fallback_url')
                                            ->withOpenURLAction(
                                                OpenURLAction::with(
                                                    application: 'BROWSER',
                                                    url: 'http://example.com',
                                                    webviewViewMode: 'HALF',
                                                )
                                                    ->withDescription('description'),
                                            )
                                            ->withPostbackData('postback_data')
                                            ->withShareLocationAction((object) [])
                                            ->withText('Hello world')
                                            ->withViewLocationAction(
                                                (new ViewLocationAction)
                                                    ->withLabel('label')
                                                    ->withLatLong(LatLong::with(latitude: 41.8, longitude: -87.6))
                                                    ->withQuery('query'),
                                            ),
                                    )
                                    ->withReply(
                                        (new Reply)->withPostbackData('postback_data')->withText('text')
                                    ),
                            ],
                        )
                        ->withText('Hello world!'),
                )
                ->withEvent((new Event)->withEventType('IS_TYPING'))
                ->withExpireTime(new \DateTimeImmutable('2024-10-02T15:01:23Z'))
                ->withTtl('10.5s'),
            messagingProfileID: 'messaging_profile_id',
            to: '+13125551234',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
