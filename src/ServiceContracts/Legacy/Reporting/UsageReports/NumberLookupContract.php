<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberLookupContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType Type of aggregation for the report
     * @param string $endDate End date for the usage report
     * @param list<string> $managedAccounts List of managed accounts to include in the report
     * @param string $startDate Start date for the usage report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        AggregationType|string|null $aggregationType = null,
        ?string $endDate = null,
        ?array $managedAccounts = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberLookupNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NumberLookupGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): NumberLookupListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
