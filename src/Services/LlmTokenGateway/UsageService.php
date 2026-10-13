<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\UsageContract;

/**
 * Manage and report AI Gateway usage.
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
     * Durable, replayable, content-free usage export for customer pipelines. Requires the dedicated llm_token_gateway.usage_export.read V2 action; spend.read and usage.read do not grant it. Records are inference.request (one per immutable ledger revision; a correction adds a new id with supersedes, keep the highest revision per request_id) and guardrail.evaluation (one per guardrail event, including blocked prompts with no inference record; correlate on request_id). Delivery is at least once in commit order: deduplicate on id. Records appear after settlement and after every older database transaction has finished (meta.horizon_lag_seconds); keep polling with next_cursor, which is always returned and is reusable after has_more is false. After a logical database restore, restart from start_time and deduplicate on id; a cursor from before it may return 409 cursor_expired (no Retry-After). Retention promise 30 days. No prompts, responses, provider credentials, supplier or customer rates. Gateway reference/enforcement usage, not invoice truth or BYOK provider charges.
     *
     * @param string $cursor Opaque next_cursor from a previous page; not combinable with start_time. Bound to the requested types; the account always comes from the credential.
     * @param \DateTimeInterface $startTime first page only: RFC 3339 with offset, at most 30 days ago and not in the future; default now - 24h
     * @param string $types Comma-separated subset of inference.request,guardrail.evaluation; default both.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveExport(
        ?string $cursor = null,
        int $limit = 500,
        ?\DateTimeInterface $startTime = null,
        ?string $types = null,
        RequestOptions|array|null $requestOptions = null,
    ): UsageGetExportResponse {
        $params = array_filter(
            [
                'cursor' => $cursor ?? Omitted::VALUE,
                'limit' => $limit,
                'startTime' => $startTime ?? Omitted::VALUE,
                'types' => $types ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveExport(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gateway reference/enforcement usage, not invoice truth or BYOK provider charges. Requires the dedicated llm_token_gateway.usage.read V2 action for combined spend and guardrail reporting; existing spend.read and guardrail_events.read grants do not grant this endpoint. All totals, UTC daily buckets, models and latest 20 guardrail events share one database snapshot. UTC half-open dates, at most 31 days. Zero-filled days; at most 1000 models (503 rather than truncation on overflow/timeout). Known tokens sum independently known categories across latest attempt evidence, including corrections; unknown spend is excluded and unknown_requests/reserved_spend remain explicit. Guardrail counts count events, not distinct requests. No raw spend events, prompts or secrets. This read-only report creates no pagination snapshot and accepts no pagination parameters.
     *
     * @param array<string,string> $metadata Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $endDate,
        string $startDate,
        string $tokenGroupID,
        ?array $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): UsageGetSummaryResponse {
        $params = array_filter(
            [
                'endDate' => $endDate,
                'startDate' => $startDate,
                'tokenGroupID' => $tokenGroupID,
                'metadata' => $metadata ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSummary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
