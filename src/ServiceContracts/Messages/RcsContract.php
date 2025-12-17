<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\Messages\Rcs\RcSendParams\Type;
use Telnyx\Messages\Rcs\RcSendResponse;
use Telnyx\Messages\RcsAgentMessage;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard\CardWidth;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\CardOrientation;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\ThumbnailImageAlignment;
use Telnyx\Messages\RcsAgentMessage\Event\EventType;
use Telnyx\Messages\RcsCardContent;
use Telnyx\Messages\RcsCardContent\Media\Height;
use Telnyx\Messages\RcsContentInfo;
use Telnyx\Messages\RcsSuggestion;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction\Application;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction\WebviewViewMode;
use Telnyx\RequestOptions;

interface RcsContract
{
    /**
     * @api
     *
     * @param string $agentID RCS agent ID
     * @param string $body Pre-filled message body (URL encoded)
     * @param string $phoneNumber Phone number in E164 format (URL encoded)
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        ?string $body = null,
        ?string $phoneNumber = null,
        ?RequestOptions $requestOptions = null,
    ): RcGenerateDeeplinkResponse;

    /**
     * @api
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
    public function send(
        string $agentID,
        array|RcsAgentMessage $agentMessage,
        string $messagingProfileID,
        string $to,
        ?array $mmsFallback = null,
        ?array $smsFallback = null,
        string|Type|null $type = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): RcSendResponse;
}
