<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\LlmTokenGateway\Usage\UsageRetrieveExportParams;
use Telnyx\LlmTokenGateway\Usage\UsageRetrieveSummaryParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\UsageRawContract;

/**
 * Manage and report AI Gateway usage.
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
     * Durable, replayable, content-free usage export for customer pipelines. Requires the dedicated llm_token_gateway.usage_export.read V2 action; spend.read and usage.read do not grant it. Records are inference.request (one per immutable ledger revision; a correction adds a new id with supersedes, keep the highest revision per request_id) and guardrail.evaluation (one per guardrail event, including blocked prompts with no inference record; correlate on request_id). Delivery is at least once in commit order: deduplicate on id. Records appear after settlement and after every older database transaction has finished (meta.horizon_lag_seconds); keep polling with next_cursor, which is always returned and is reusable after has_more is false. After a logical database restore, restart from start_time and deduplicate on id; a cursor from before it may return 409 cursor_expired (no Retry-After). Retention promise 30 days. No prompts, responses, provider credentials, supplier or customer rates. Gateway reference/enforcement usage, not invoice truth or BYOK provider charges.
     *
     * @param array{
     *   cursor?: string, limit?: int, startTime?: \DateTimeInterface, types?: string
     * }|UsageRetrieveExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetExportResponse>
     *
     * @throws APIException
     */
    public function retrieveExport(
        array|UsageRetrieveExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsageRetrieveExportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/usage/export',
            query: Util::array_transform_keys($parsed, ['startTime' => 'start_time']),
            options: $options,
            convert: UsageGetExportResponse::class,
        );
    }

    /**
     * @api
     *
     * Gateway reference/enforcement usage, not invoice truth or BYOK provider charges. Requires the dedicated llm_token_gateway.usage.read V2 action for combined spend and guardrail reporting; existing spend.read and guardrail_events.read grants do not grant this endpoint. All totals, UTC daily buckets, models and latest 20 guardrail events share one database snapshot. UTC half-open dates, at most 31 days. Zero-filled days; at most 1000 models (503 rather than truncation on overflow/timeout). Known tokens sum independently known categories across latest attempt evidence, including corrections; unknown spend is excluded and unknown_requests/reserved_spend remain explicit. Guardrail counts count events, not distinct requests. No raw spend events, prompts or secrets. This read-only report creates no pagination snapshot and accepts no pagination parameters.
     *
     * @param array{
     *   endDate: string,
     *   startDate: string,
     *   tokenGroupID: string,
     *   metadata?: array<string,string>,
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
