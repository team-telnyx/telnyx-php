<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType Type of aggregation for the report
     * @param \DateTimeInterface $endDate End date for the usage report
     * @param list<string> $managedAccounts List of managed accounts to include in the report
     * @param \DateTimeInterface $startDate Start date for the usage report
     *
     * @throws APIException
     */
    public function create(
        $aggregationType = omit,
        $endDate = omit,
        $managedAccounts = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $page
     * @param int $perPage
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        $perPage = omit,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
