<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
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
}
