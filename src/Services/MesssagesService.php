<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messsages\MesssageRcsParams\Type;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard\CardWidth;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\CardOrientation;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\ThumbnailImageAlignment;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;
use Telnyx\Messsages\RcsCardContent;
use Telnyx\Messsages\RcsCardContent\Media\Height;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\Messsages\RcsSuggestion;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\Application;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction\WebviewViewMode;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MesssagesContract;

final class MesssagesService implements MesssagesContract
{
    /**
     * @api
     */
    public MesssagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MesssagesRawService($client);
    }

    /**
     * @api
     *
     * Send an RCS message
     *
     * @param string $agentID RCS Agent ID
     * @param array{
     *   contentMessage?: array{
     *     contentInfo?: array{
     *       fileURL: string, forceRefresh?: bool, thumbnailURL?: string
     *     }|RcsContentInfo,
     *     richCard?: array{
     *       carouselCard?: array{
     *         cardContents: list<array{
     *           description?: string,
     *           media?: array{
     *             contentInfo?: array{
     *               fileURL: string, forceRefresh?: bool, thumbnailURL?: string
     *             }|RcsContentInfo,
     *             height?: 'HEIGHT_UNSPECIFIED'|'SHORT'|'MEDIUM'|'TALL'|Height,
     *           },
     *           suggestions?: list<array{
     *             action?: array{
     *               createCalendarEventAction?: array{
     *                 description?: string,
     *                 endTime?: string|\DateTimeInterface,
     *                 startTime?: string|\DateTimeInterface,
     *                 title?: string,
     *               },
     *               dialAction?: array{phoneNumber: string},
     *               fallbackURL?: string,
     *               openURLAction?: array{
     *                 application: 'OPEN_URL_APPLICATION_UNSPECIFIED'|'BROWSER'|'WEBVIEW'|Application,
     *                 url: string,
     *                 webviewViewMode: 'WEBVIEW_VIEW_MODE_UNSPECIFIED'|'FULL'|'HALF'|'TALL'|WebviewViewMode,
     *                 description?: string,
     *               },
     *               postbackData?: string,
     *               shareLocationAction?: array<string,mixed>,
     *               text?: string,
     *               viewLocationAction?: array{
     *                 label?: string,
     *                 latLong?: array{latitude: float, longitude: float},
     *                 query?: string,
     *               },
     *             },
     *             reply?: array{postbackData?: string, text?: string},
     *           }|RcsSuggestion>,
     *           title?: string,
     *         }|RcsCardContent>,
     *         cardWidth: 'CARD_WIDTH_UNSPECIFIED'|'SMALL'|'MEDIUM'|CardWidth,
     *       },
     *       standaloneCard?: array{
     *         cardContent: array{
     *           description?: string,
     *           media?: array{
     *             contentInfo?: array{
     *               fileURL: string, forceRefresh?: bool, thumbnailURL?: string
     *             }|RcsContentInfo,
     *             height?: 'HEIGHT_UNSPECIFIED'|'SHORT'|'MEDIUM'|'TALL'|Height,
     *           },
     *           suggestions?: list<array{
     *             action?: array{
     *               createCalendarEventAction?: array{
     *                 description?: string,
     *                 endTime?: string|\DateTimeInterface,
     *                 startTime?: string|\DateTimeInterface,
     *                 title?: string,
     *               },
     *               dialAction?: array{phoneNumber: string},
     *               fallbackURL?: string,
     *               openURLAction?: array{
     *                 application: 'OPEN_URL_APPLICATION_UNSPECIFIED'|'BROWSER'|'WEBVIEW'|Application,
     *                 url: string,
     *                 webviewViewMode: 'WEBVIEW_VIEW_MODE_UNSPECIFIED'|'FULL'|'HALF'|'TALL'|WebviewViewMode,
     *                 description?: string,
     *               },
     *               postbackData?: string,
     *               shareLocationAction?: array<string,mixed>,
     *               text?: string,
     *               viewLocationAction?: array{
     *                 label?: string,
     *                 latLong?: array{latitude: float, longitude: float},
     *                 query?: string,
     *               },
     *             },
     *             reply?: array{postbackData?: string, text?: string},
     *           }|RcsSuggestion>,
     *           title?: string,
     *         }|RcsCardContent,
     *         cardOrientation: 'CARD_ORIENTATION_UNSPECIFIED'|'HORIZONTAL'|'VERTICAL'|CardOrientation,
     *         thumbnailImageAlignment: 'THUMBNAIL_IMAGE_ALIGNMENT_UNSPECIFIED'|'LEFT'|'RIGHT'|ThumbnailImageAlignment,
     *       },
     *     },
     *     suggestions?: list<array{
     *       action?: array{
     *         createCalendarEventAction?: array{
     *           description?: string,
     *           endTime?: string|\DateTimeInterface,
     *           startTime?: string|\DateTimeInterface,
     *           title?: string,
     *         },
     *         dialAction?: array{phoneNumber: string},
     *         fallbackURL?: string,
     *         openURLAction?: array{
     *           application: 'OPEN_URL_APPLICATION_UNSPECIFIED'|'BROWSER'|'WEBVIEW'|Application,
     *           url: string,
     *           webviewViewMode: 'WEBVIEW_VIEW_MODE_UNSPECIFIED'|'FULL'|'HALF'|'TALL'|WebviewViewMode,
     *           description?: string,
     *         },
     *         postbackData?: string,
     *         shareLocationAction?: array<string,mixed>,
     *         text?: string,
     *         viewLocationAction?: array{
     *           label?: string,
     *           latLong?: array{latitude: float, longitude: float},
     *           query?: string,
     *         },
     *       },
     *       reply?: array{postbackData?: string, text?: string},
     *     }|RcsSuggestion>,
     *     text?: string,
     *   },
     *   event?: array{eventType?: 'TYPE_UNSPECIFIED'|'IS_TYPING'|'READ'|EventType},
     *   expireTime?: string|\DateTimeInterface,
     *   ttl?: string,
     * }|RcsAgentMessage $agentMessage
     * @param string $messagingProfileID A valid messaging profile ID
     * @param string $to Phone number in +E.164 format
     * @param array{
     *   from?: string, mediaURLs?: list<string>, subject?: string, text?: string
     * } $mmsFallback
     * @param array{from?: string, text?: string} $smsFallback
     * @param 'RCS'|Type $type Message type - must be set to "RCS"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function rcs(
        string $agentID,
        array|RcsAgentMessage $agentMessage,
        string $messagingProfileID,
        string $to,
        ?array $mmsFallback = null,
        ?array $smsFallback = null,
        string|Type|null $type = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MesssageRcsResponse {
        $params = Util::removeNulls(
            [
                'agentID' => $agentID,
                'agentMessage' => $agentMessage,
                'messagingProfileID' => $messagingProfileID,
                'to' => $to,
                'mmsFallback' => $mmsFallback,
                'smsFallback' => $smsFallback,
                'type' => $type,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rcs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
