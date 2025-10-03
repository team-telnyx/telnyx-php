<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkParams;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messages\RcsContract;

use const Telnyx\Core\OMIT as omit;

final class RcsService implements RcsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
     *
     * @param string $body Pre-filled message body (URL encoded)
     * @param string $phoneNumber Phone number in E164 format (URL encoded)
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        $body = omit,
        $phoneNumber = omit,
        ?RequestOptions $requestOptions = null,
    ): RcGenerateDeeplinkResponse {
        $params = ['body' => $body, 'phoneNumber' => $phoneNumber];

        return $this->generateDeeplinkRaw($agentID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function generateDeeplinkRaw(
        string $agentID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RcGenerateDeeplinkResponse {
        [$parsed, $options] = RcGenerateDeeplinkParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messages/rcs/deeplinks/%1$s', $agentID],
            query: $parsed,
            options: $options,
            convert: RcGenerateDeeplinkResponse::class,
        );
    }
}
