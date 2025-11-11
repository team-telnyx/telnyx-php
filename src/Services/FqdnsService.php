<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Fqdns\FqdnCreateParams;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnListParams;
use Telnyx\Fqdns\FqdnListResponse;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateParams;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnsContract;

final class FqdnsService implements FqdnsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new FQDN object.
     *
     * @param array{
     *   connection_id: string, dns_record_type: string, fqdn: string, port?: int|null
     * }|FqdnCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FqdnCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): FqdnNewResponse {
        [$parsed, $options] = FqdnCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'fqdns',
            body: (object) $parsed,
            options: $options,
            convert: FqdnNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details regarding a specific FQDN.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['fqdns/%1$s', $id],
            options: $requestOptions,
            convert: FqdnGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the details of a specific FQDN.
     *
     * @param array{
     *   connection_id?: string,
     *   dns_record_type?: string,
     *   fqdn?: string,
     *   port?: int|null,
     * }|FqdnUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnUpdateResponse {
        [$parsed, $options] = FqdnUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['fqdns/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: FqdnUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all FQDNs belonging to the user that match the given filters.
     *
     * @param array{
     *   filter?: array{
     *     connection_id?: string, dns_record_type?: string, fqdn?: string, port?: int
     *   },
     *   page?: array{number?: int, size?: int},
     * }|FqdnListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|FqdnListParams $params,
        ?RequestOptions $requestOptions = null
    ): FqdnListResponse {
        [$parsed, $options] = FqdnListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'fqdns',
            query: $parsed,
            options: $options,
            convert: FqdnListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an FQDN.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['fqdns/%1$s', $id],
            options: $requestOptions,
            convert: FqdnDeleteResponse::class,
        );
    }
}
