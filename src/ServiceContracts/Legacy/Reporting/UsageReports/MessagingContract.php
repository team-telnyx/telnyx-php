<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MdrUsageReportResponseLegacy;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\MessagingNewResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;

interface MessagingContract
{
    /**
     * @api
     *
     * @param int $aggregationType Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     *
     * @throws APIException
     */
    public function create(
        int $aggregationType,
        string|\DateTimeInterface|null $endTime = null,
        ?array $managedAccounts = null,
        ?array $profiles = null,
        ?bool $selectAllManagedAccounts = null,
        string|\DateTimeInterface|null $startTime = null,
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
     *
     * @param int $page Page number
     * @param int $perPage Size of the page
     *
     * @return PerPagePagination<MdrUsageReportResponseLegacy>
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
    ): MessagingDeleteResponse;
}
