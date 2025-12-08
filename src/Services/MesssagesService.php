<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MesssagesContract;

final class MesssagesService implements MesssagesContract
{
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
     *   agent_id: string,
     *   agent_message: array{
     *     content_message?: array{
     *       content_info?: array<mixed>|RcsContentInfo,
     *       rich_card?: array<mixed>,
     *       suggestions?: list<mixed>,
     *       text?: string,
     *     },
     *     event?: array{event_type?: 'TYPE_UNSPECIFIED'|'IS_TYPING'|'READ'},
     *     expire_time?: string|\DateTimeInterface,
     *     ttl?: string,
     *   }|RcsAgentMessage,
     *   messaging_profile_id: string,
     *   to: string,
     *   mms_fallback?: array{
     *     from?: string, media_urls?: list<string>, subject?: string, text?: string
     *   },
     *   sms_fallback?: array{from?: string, text?: string},
     *   type?: 'RCS',
     *   webhook_url?: string,
     * }|MesssageRcsParams $params
     *
     * @throws APIException
     */
    public function rcs(
        array|MesssageRcsParams $params,
        ?RequestOptions $requestOptions = null
    ): MesssageRcsResponse {
        [$parsed, $options] = MesssageRcsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MesssageRcsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'messsages/rcs',
            body: (object) $parsed,
            options: $options,
            convert: MesssageRcsResponse::class,
        );

        return $response->parse();
    }
}
