<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OtaUpdatesContract;

final class OtaUpdatesService implements OtaUpdatesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API returns the details of an Over the Air (OTA) update.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ota_updates/%1$s', $id],
            options: $requestOptions,
            convert: OtaUpdateGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List OTA updates
     *
     * @param array{
     *   filter?: array{
     *     sim_card_id?: string,
     *     status?: 'in-progress'|'completed'|'failed',
     *     type?: 'sim_card_network_preferences',
     *   },
     *   page?: array{number?: int, size?: int},
     * }|OtaUpdateListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OtaUpdateListParams $params,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateListResponse {
        [$parsed, $options] = OtaUpdateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ota_updates',
            query: $parsed,
            options: $options,
            convert: OtaUpdateListResponse::class,
        );
    }
}
