<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGroupBy;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpendContract
{
    /**
     * @api
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
    ): SpendGetEventsResponse;

    /**
     * @api
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
    ): SpendGetSummaryResponse;
}
