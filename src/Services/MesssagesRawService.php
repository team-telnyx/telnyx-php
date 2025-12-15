<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsParams\Type;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\MesssageWhatsappParams;
use Telnyx\Messsages\MesssageWhatsappResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MesssagesRawContract;

final class MesssagesRawService implements MesssagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send an RCS message
     *
     * @param array{
     *   agentID: string,
     *   agentMessage: array{
     *     contentMessage?: array{
     *       contentInfo?: array<mixed>|RcsContentInfo,
     *       richCard?: array<mixed>,
     *       suggestions?: list<mixed>,
     *       text?: string,
     *     },
     *     event?: array{eventType?: 'TYPE_UNSPECIFIED'|'IS_TYPING'|'READ'|EventType},
     *     expireTime?: string|\DateTimeInterface,
     *     ttl?: string,
     *   }|RcsAgentMessage,
     *   messagingProfileID: string,
     *   to: string,
     *   mmsFallback?: array{
     *     from?: string, mediaURLs?: list<string>, subject?: string, text?: string
     *   },
     *   smsFallback?: array{from?: string, text?: string},
     *   type?: 'RCS'|Type,
     *   webhookURL?: string,
     * }|MesssageRcsParams $params
     *
     * @return BaseResponse<MesssageRcsResponse>
     *
     * @throws APIException
     */
    public function rcs(
        array|MesssageRcsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = MesssageRcsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messsages/rcs',
            body: (object) $parsed,
            options: $options,
            convert: MesssageRcsResponse::class,
        );
    }

    /**
     * @api
     *
     * Send a Whatsapp message
     *
     * @param array{
     *   from: string,
     *   to: string,
     *   whatsappMessage: array{
     *     audio?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     bizOpaqueCallbackData?: string,
     *     contacts?: list<array{
     *       addresses?: list<array<mixed>>,
     *       birthday?: string,
     *       emails?: list<array<mixed>>,
     *       name?: string,
     *       org?: array<mixed>,
     *       phones?: list<array<mixed>>,
     *       urls?: list<array<mixed>>,
     *     }>,
     *     document?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     image?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     interactive?: array{
     *       action?: array{
     *         button?: string,
     *         buttons?: list<array<mixed>>,
     *         cards?: list<array<mixed>>,
     *         catalogID?: string,
     *         mode?: string,
     *         name?: string,
     *         parameters?: array<mixed>,
     *         productRetailerID?: string,
     *         sections?: list<array<mixed>>,
     *       },
     *       body?: array{text?: string},
     *       footer?: array{text?: string},
     *       header?: array{
     *         document?: array<mixed>,
     *         image?: array<mixed>,
     *         subText?: string,
     *         text?: string,
     *         video?: array<mixed>,
     *       },
     *       type?: 'cta_url'|'list'|'carousel'|'button'|'location_request_message'|MesssageWhatsappParams\WhatsappMessage\Interactive\Type,
     *     },
     *     location?: array{
     *       address?: string, latitude?: string, longitude?: string, name?: string
     *     },
     *     reaction?: array{empji?: string, messageID?: string},
     *     sticker?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *     type?: 'audio'|'document'|'image'|'sticker'|'video'|'interactive'|'location'|'template'|'reaction'|'contacts'|MesssageWhatsappParams\WhatsappMessage\Type,
     *     video?: array{
     *       caption?: string, filename?: string, link?: string, voice?: bool
     *     },
     *   },
     *   type?: 'WHATSAPP'|MesssageWhatsappParams\Type,
     *   webhookURL?: string,
     * }|MesssageWhatsappParams $params
     *
     * @return BaseResponse<MesssageWhatsappResponse>
     *
     * @throws APIException
     */
    public function whatsapp(
        array|MesssageWhatsappParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = MesssageWhatsappParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messsages/whatsapp',
            body: (object) $parsed,
            options: $options,
            convert: MesssageWhatsappResponse::class,
        );
    }
}
