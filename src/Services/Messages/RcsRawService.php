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
use Telnyx\Messages\Rcs\RcSendParams\MmsFallback;
use Telnyx\Messages\Rcs\RcSendParams\SMSFallback;
use Telnyx\Messages\Rcs\RcSendParams\Type;
use Telnyx\Messages\Rcs\RcSendResponse;
use Telnyx\Messages\RcsAgentMessage;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messages\RcsRawContract;

/**
 * @phpstan-import-type RcsAgentMessageShape from \Telnyx\Messages\RcsAgentMessage
 * @phpstan-import-type MmsFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\MmsFallback
 * @phpstan-import-type SMSFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\SMSFallback
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcGenerateDeeplinkResponse>
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        array|RcGenerateDeeplinkParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   agentMessage: RcsAgentMessage|RcsAgentMessageShape,
     *   messagingProfileID: string,
     *   to: string,
     *   mmsFallback?: MmsFallback|MmsFallbackShape,
     *   smsFallback?: SMSFallback|SMSFallbackShape,
     *   type?: Type|value-of<Type>,
     *   webhookURL?: string,
     * }|RcSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RcSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|RcSendParams $params,
        RequestOptions|array|null $requestOptions = null
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
