<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsParams\Type;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;
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
