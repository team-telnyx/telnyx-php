<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\LlmTokenGateway\Usage\UsageRetrieveSummaryParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\UsageRawContract;

/**
 * Manage and report AI Gateway traffic.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UsageRawService implements UsageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return complete usage totals, UTC daily and model breakdowns, and guardrail event counts for one token group owned by the authenticated account. Requires the llm_token_gateway.usage.read permission; spend and guardrail read permissions do not grant this combined report. All sections share one database snapshot and include the latest usage corrections. Dates use an inclusive start and exclusive end spanning 1 to 31 days. Only token_group_id, start_date and end_date are accepted; pagination, group_by and other filters are rejected. Spend is reference/enforcement USD, not invoice truth or BYOK provider charges. Unknown cost is excluded from spend and reported through unknown_requests and reserved_spend. Daily rows include zero-activity days. Model rows are ordered by request count descending, then model name, and are limited to 1,000. Guardrail counts count events, not distinct requests; recent_events contains at most 20 newest events. A report that exceeds model or query limits returns 503 rather than a truncated success.
     *
     * @param array{
     *   endDate: string, startDate: string, tokenGroupID: string
     * }|UsageRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        array|UsageRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsageRetrieveSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/usage/summary',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'startDate' => 'start_date',
                    'tokenGroupID' => 'token_group_id',
                ],
            ),
            options: $options,
            convert: UsageGetSummaryResponse::class,
        );
    }
}
