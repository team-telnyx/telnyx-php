<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGroupBy;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\SpendContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpendService implements SpendContract
{
    /**
     * @api
     */
    public SpendRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpendRawService($client);
    }

    /**
     * @api
     *
     * Return request-level usage history for the authenticated account. Supply both UTC dates or neither; omitting both returns the previous full UTC day. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
     *
     * @param array<string,string> $metadata Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     * @param string $pageSnapshot required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEvents(
        ?string $endDate = null,
        ?string $endUserID = null,
        ?array $metadata = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $pageSnapshot = null,
        ?string $startDate = null,
        ?string $tokenGroupID = null,
        ?string $tokenKeyID = null,
        ?string $tokenUserID = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendGetEventsResponse {
        $params = array_filter(
            [
                'endDate' => $endDate ?? Omitted::VALUE,
                'endUserID' => $endUserID ?? Omitted::VALUE,
                'metadata' => $metadata ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'pageSnapshot' => $pageSnapshot ?? Omitted::VALUE,
                'startDate' => $startDate ?? Omitted::VALUE,
                'tokenGroupID' => $tokenGroupID ?? Omitted::VALUE,
                'tokenKeyID' => $tokenKeyID ?? Omitted::VALUE,
                'tokenUserID' => $tokenUserID ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEvents(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return request counts, token counts and reference spend grouped by one attribution dimension. Both UTC dates and group_by are required. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
     *
     * @param string|SpendGroupBy|value-of<SpendGroupBy> $groupBy a scope, or metadata:<key> to group by one request tag's text-form value; requests without the key form one group with a null dimension_id
     * @param array<string,string> $metadata Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     * @param string $pageSnapshot required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $endDate,
        SpendGroupBy|string $groupBy,
        string $startDate,
        ?string $endUserID = null,
        ?array $metadata = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $pageSnapshot = null,
        ?string $tokenGroupID = null,
        ?string $tokenKeyID = null,
        ?string $tokenUserID = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpendGetSummaryResponse {
        $params = array_filter(
            [
                'endDate' => $endDate,
                'groupBy' => $groupBy,
                'startDate' => $startDate,
                'endUserID' => $endUserID ?? Omitted::VALUE,
                'metadata' => $metadata ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'pageSnapshot' => $pageSnapshot ?? Omitted::VALUE,
                'tokenGroupID' => $tokenGroupID ?? Omitted::VALUE,
                'tokenKeyID' => $tokenKeyID ?? Omitted::VALUE,
                'tokenUserID' => $tokenUserID ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSummary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
