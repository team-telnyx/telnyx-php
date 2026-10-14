<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;
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
    ): UsageGetExportResponse;

    /**
     * @api
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
    ): UsageGetSummaryResponse;
}
