<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\UserDataContract;
use Telnyx\Whatsapp\UserData\UserDataGetResponse;
use Telnyx\Whatsapp\UserData\UserDataUpdateResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UserDataService implements UserDataContract
{
    /**
     * @api
     */
    public UserDataRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UserDataRawService($client);
    }

    /**
     * @api
     *
     * Fetch Whatsapp user data
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): UserDataGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Whatsapp user data
     *
     * @param string $webhookFailoverURL Failover URL to send Whatsapp signup events
     * @param string $webhookURL URL to send Whatsapp signup events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserDataUpdateResponse {
        $params = Util::removeNulls(
            ['webhookFailoverURL' => $webhookFailoverURL, 'webhookURL' => $webhookURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
