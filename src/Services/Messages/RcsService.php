<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messages\RcsContract;

final class RcsService implements RcsContract
{
    /**
     * @api
     */
    public RcsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RcsRawService($client);
    }

    /**
     * @api
     *
     * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
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
    ): RcGenerateDeeplinkResponse {
        $params = ['body' => $body, 'phoneNumber' => $phoneNumber];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateDeeplink($agentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
