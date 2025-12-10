<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Voice\CdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;

interface VoiceContract
{
    /**
     * @api
     *
     * @param string|\DateTimeInterface $endTime End time in ISO format
     * @param string|\DateTimeInterface $startTime Start time in ISO format
     * @param int $aggregationType Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3
     * @param list<int> $connections List of connections to filter by
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param int $productBreakdown Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     *
     * @throws APIException
     */
    public function create(
        string|\DateTimeInterface $endTime,
        string|\DateTimeInterface $startTime,
        ?int $aggregationType = null,
        ?array $connections = null,
        ?array $managedAccounts = null,
        ?int $productBreakdown = null,
        ?bool $selectAllManagedAccounts = null,
        ?RequestOptions $requestOptions = null,
    ): VoiceNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse;

    /**
     * @api
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     *
     * @return PerPagePagination<CdrUsageReportResponseLegacy>
     *
     * @throws APIException
     */
    public function list(
        int $page = 1,
        int $perPage = 20,
        ?RequestOptions $requestOptions = null
    ): PerPagePagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse;
}
