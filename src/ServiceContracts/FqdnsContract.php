<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Fqdns\Fqdn;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnListParams\Filter;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Fqdns\FqdnListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FqdnsContract
{
    /**
     * @api
     *
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string $dnsRecordType,
        string $fqdn,
        ?int $port = 5060,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $connectionID = null,
        ?string $dnsRecordType = null,
        ?string $fqdn = null,
        ?int $port = 5060,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnDeleteResponse;
}
