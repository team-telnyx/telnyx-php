<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ListContract;

/**
 * Voice Channels.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ListService implements ListContract
{
    /**
     * @api
     */
    public ListRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of all phone numbers using Channel Billing, grouped by Zone.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAll(
        RequestOptions|array|null $requestOptions = null
    ): ListGetAllResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveAll(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of phone numbers using Channel Billing for a specific Zone.
     *
     * @param string $channelZoneID Channel zone identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        RequestOptions|array|null $requestOptions = null
    ): ListGetByZoneResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveByZone($channelZoneID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
