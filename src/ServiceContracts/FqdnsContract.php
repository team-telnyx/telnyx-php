<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Fqdns\Fqdn;
use Telnyx\Fqdns\FqdnDeleteResponse;
use Telnyx\Fqdns\FqdnGetResponse;
use Telnyx\Fqdns\FqdnNewResponse;
use Telnyx\Fqdns\FqdnUpdateResponse;
use Telnyx\RequestOptions;

interface FqdnsContract
{
    /**
     * @api
     *
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string $dnsRecordType,
        string $fqdn,
        ?int $port = 5060,
        ?RequestOptions $requestOptions = null,
    ): FqdnNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $connectionID ID of the FQDN connection to which this IP should be attached
     * @param string $dnsRecordType The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     * @param string $fqdn FQDN represented by this resource
     * @param int|null $port port to use when connecting to this FQDN
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $connectionID = null,
        ?string $dnsRecordType = null,
        ?string $fqdn = null,
        ?int $port = 5060,
        ?RequestOptions $requestOptions = null,
    ): FqdnUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   connectionID?: string, dnsRecordType?: string, fqdn?: string, port?: int
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<Fqdn>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnDeleteResponse;
}
