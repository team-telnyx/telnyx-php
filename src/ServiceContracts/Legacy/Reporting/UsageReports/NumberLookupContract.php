<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;
use Telnyx\RequestOptions;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param 'ALL'|'BY_ORGANIZATION_MEMBER'|AggregationType $aggregationType Type of aggregation for the report
     * @param string $endDate End date for the usage report
     * @param list<string> $managedAccounts List of managed accounts to include in the report
     * @param string $startDate Start date for the usage report
     *
     * @throws APIException
     */
    public function create(
        string|AggregationType|null $aggregationType = null,
        ?string $endDate = null,
        ?array $managedAccounts = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NumberLookupGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): NumberLookupListResponse;

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
