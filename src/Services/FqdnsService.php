<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\Fqdns\Fqdn;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnListParams\Filter;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnsContract;

/**
 * FQDN operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Fqdns\FqdnListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FqdnsService implements FqdnsContract
{
    /**
     * @api
     */
    public FqdnsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FqdnsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new FQDN record and attaches it to the specified connection.
     *
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|Omitted|null $port port to use when connecting to this FQDN
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string $dnsRecordType,
        string $fqdn,
        int|Omitted|null $port = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnNewResponse {
        $params = array_filter(
            [
                'connectionID' => $connectionID,
                'dnsRecordType' => $dnsRecordType,
                'fqdn' => $fqdn,
                'port' => $port,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details regarding a specific FQDN.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the details of the specified FQDN record and returns the updated FQDN.
     *
     * @param string $id identifies the resource
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|Omitted|null $port port to use when connecting to this FQDN
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $connectionID = null,
        ?string $dnsRecordType = null,
        ?string $fqdn = null,
        int|Omitted|null $port = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnUpdateResponse {
        $params = array_filter(
            [
                'connectionID' => $connectionID ?? Omitted::VALUE,
                'dnsRecordType' => $dnsRecordType ?? Omitted::VALUE,
                'fqdn' => $fqdn ?? Omitted::VALUE,
                'port' => $port,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all FQDNs belonging to the user that match the given filters.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Fqdn>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes the specified FQDN record from its connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
