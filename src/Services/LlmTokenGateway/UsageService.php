<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\UsageContract;

/**
 * Manage and report AI Gateway traffic.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UsageService implements UsageContract
{
    /**
     * @api
     */
    public UsageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsageRawService($client);
    }

    /**
     * @api
     *
     * Return complete usage totals, UTC daily and model breakdowns, and guardrail event counts for one token group owned by the authenticated account. Requires the llm_token_gateway.usage.read permission; spend and guardrail read permissions do not grant this combined report. All sections share one database snapshot and include the latest usage corrections. Dates use an inclusive start and exclusive end spanning 1 to 31 days. Only token_group_id, start_date and end_date are accepted; pagination, group_by and other filters are rejected. Spend is reference/enforcement USD, not invoice truth or BYOK provider charges. Unknown cost is excluded from spend and reported through unknown_requests and reserved_spend. Daily rows include zero-activity days. Model rows are ordered by request count descending, then model name, and are limited to 1,000. Guardrail counts count events, not distinct requests; recent_events contains at most 20 newest events. A report that exceeds model or query limits returns 503 rather than a truncated success.
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
    ): UsageGetSummaryResponse {
        $params = [
            'endDate' => $endDate,
            'startDate' => $startDate,
            'tokenGroupID' => $tokenGroupID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSummary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
