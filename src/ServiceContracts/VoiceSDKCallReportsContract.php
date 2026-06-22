<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReport;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams\Sort;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceSDKCallReportsContract
{
    /**
     * @api
     *
     * @param string $callID call identifier used to retrieve reports owned by the authenticated user
     * @param RequestOpts|null $requestOptions
     *
     * @return list<VoiceSDKCallReport>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callID,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param Sort|value-of<Sort> $sort Set the order of the results by creation date. `asc` and `created_at` sort oldest reports first; `desc` and `-created_at` sort newest reports first. If not given, results are sorted by creation date in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceSDKCallReport>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'desc',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
