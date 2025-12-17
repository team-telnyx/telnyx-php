<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\Messages\Rcs\RcSendParams;
use Telnyx\Messages\Rcs\RcSendParams\Type;
use Telnyx\Messages\Rcs\RcSendResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;
use Telnyx\Messsages\RcsContentInfo;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messages\RcsRawContract;

final class RcsRawService implements RcsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
     *
     * @param string $agentID RCS agent ID
     * @param array{
     *   body?: string, phoneNumber?: string
     * }|RcGenerateDeeplinkParams $params
     *
     * @return BaseResponse<RcGenerateDeeplinkResponse>
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        array|RcGenerateDeeplinkParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RcGenerateDeeplinkParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messages/rcs/deeplinks/%1$s', $agentID],
            query: Util::array_transform_keys(
                $parsed,
                ['phoneNumber' => 'phone_number']
            ),
            options: $options,
            convert: RcGenerateDeeplinkResponse::class,
        );
    }

    /**
     * @api
     *
     * Send an RCS message
     *
     * @param array{
     *   agentID: string,
     *   agentMessage: array{
     *     contentMessage?: array{
     *       contentInfo?: array<string,mixed>|RcsContentInfo,
     *       richCard?: array<string,mixed>,
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
     * }|RcSendParams $params
     *
     * @return BaseResponse<RcSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|RcSendParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = RcSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messages/rcs',
            body: (object) $parsed,
            options: $options,
            convert: RcSendResponse::class,
        );
    }
}
