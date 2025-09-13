<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Fqdns\FqdnCreateParams;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnListParams;
use Telnyx\Fqdns\FqdnListParams\Filter;
use Telnyx\Fqdns\FqdnListParams\Page;
use Telnyx\Fqdns\FqdnListResponse;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateParams;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     *
     * @return FqdnNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $connectionID,
        $dnsRecordType,
        $fqdn,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): FqdnNewResponse {
        $params = [
            'connectionID' => $connectionID,
            'dnsRecordType' => $dnsRecordType,
            'fqdn' => $fqdn,
            'port' => $port,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FqdnNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FqdnNewResponse {
        [$parsed, $options] = FqdnCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return FqdnGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return FqdnGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     *
     * @return FqdnUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $connectionID = omit,
        $dnsRecordType = omit,
        $fqdn = omit,
        $port = omit,
        ?RequestOptions $requestOptions = null,
    ): FqdnUpdateResponse {
        $params = [
            'connectionID' => $connectionID,
            'dnsRecordType' => $dnsRecordType,
            'fqdn' => $fqdn,
            'port' => $port,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FqdnUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FqdnUpdateResponse {
        [$parsed, $options] = FqdnUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return FqdnListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): FqdnListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FqdnListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FqdnListResponse {
        [$parsed, $options] = FqdnListParams::parseRequest(
            $params,
            $requestOptions
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
     * @return FqdnDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return FqdnDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
