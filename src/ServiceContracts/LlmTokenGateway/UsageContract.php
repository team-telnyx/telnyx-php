<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageContract
{
    /**
     * @api
     *
     * @param string $endDate Exclusive UTC date in YYYY-MM-DD format. Must follow start_date by 1 to 31 days.
     * @param string $startDate Inclusive UTC date in YYYY-MM-DD format. Must precede end_date by 1 to 31 days.
     * @param string $tokenGroupID ID of a token group owned by the authenticated account
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $endDate,
        string $startDate,
        string $tokenGroupID,
        RequestOptions|array|null $requestOptions = null,
    ): UsageGetSummaryResponse;
}
