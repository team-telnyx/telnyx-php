<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Button\Type;
use Telnyx\Messsages\MesssageWhatsappResponse;
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
use Telnyx\Messsages\WhatsappMedia;
use Telnyx\RequestOptions;

interface MesssagesContract
{
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
     * @param 'RCS'|\Telnyx\Messsages\MesssageRcsParams\Type $type Message type - must be set to "RCS"
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
        string|\Telnyx\Messsages\MesssageRcsParams\Type|null $type = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MesssageRcsResponse;

    /**
     * @api
     *
     * @param string $from Phone number in +E.164 format associated with Whatsapp account
     * @param string $to Phone number in +E.164 format
     * @param array{
     *   audio?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   bizOpaqueCallbackData?: string,
     *   contacts?: list<array{
     *     addresses?: list<array{
     *       city?: string,
     *       country?: string,
     *       countryCode?: string,
     *       state?: string,
     *       street?: string,
     *       type?: string,
     *       zip?: string,
     *     }>,
     *     birthday?: string,
     *     emails?: list<array{email?: string, type?: string}>,
     *     name?: string,
     *     org?: array{company?: string, department?: string, title?: string},
     *     phones?: list<array{phone?: string, type?: string, waID?: string}>,
     *     urls?: list<array{type?: string, url?: string}>,
     *   }>,
     *   document?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   image?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   interactive?: array{
     *     action?: array{
     *       button?: string,
     *       buttons?: list<array{
     *         reply?: array{id?: string, title?: string}, type?: 'reply'|Type
     *       }>,
     *       cards?: list<array{
     *         action?: array{catalogID?: string, productRetailerID?: string},
     *         body?: array{text?: string},
     *         cardIndex?: int,
     *         header?: array{
     *           image?: array{
     *             caption?: string, filename?: string, link?: string, voice?: bool
     *           }|WhatsappMedia,
     *           type?: 'image'|'video'|\Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Type,
     *           video?: array{
     *             caption?: string, filename?: string, link?: string, voice?: bool
     *           }|WhatsappMedia,
     *         },
     *         type?: 'cta_url'|\Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Type,
     *       }>,
     *       catalogID?: string,
     *       mode?: string,
     *       name?: string,
     *       parameters?: array{displayText?: string, url?: string},
     *       productRetailerID?: string,
     *       sections?: list<array{
     *         productItems?: list<array{productRetailerID?: string}>,
     *         rows?: list<array{id?: string, description?: string, title?: string}>,
     *         title?: string,
     *       }>,
     *     },
     *     body?: array{text?: string},
     *     footer?: array{text?: string},
     *     header?: array{
     *       document?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *       image?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *       subText?: string,
     *       text?: string,
     *       video?: array{
     *         caption?: string, filename?: string, link?: string, voice?: bool
     *       }|WhatsappMedia,
     *     },
     *     type?: 'cta_url'|'list'|'carousel'|'button'|'location_request_message'|\Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Type,
     *   },
     *   location?: array{
     *     address?: string, latitude?: string, longitude?: string, name?: string
     *   },
     *   reaction?: array{empji?: string, messageID?: string},
     *   sticker?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     *   type?: 'audio'|'document'|'image'|'sticker'|'video'|'interactive'|'location'|'template'|'reaction'|'contacts'|\Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Type,
     *   video?: array{
     *     caption?: string, filename?: string, link?: string, voice?: bool
     *   }|WhatsappMedia,
     * } $whatsappMessage
     * @param 'WHATSAPP'|\Telnyx\Messsages\MesssageWhatsappParams\Type $type Message type - must be set to "WHATSAPP"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     *
     * @throws APIException
     */
    public function whatsapp(
        string $from,
        string $to,
        array $whatsappMessage,
        string|\Telnyx\Messsages\MesssageWhatsappParams\Type|null $type = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): MesssageWhatsappResponse;
}
