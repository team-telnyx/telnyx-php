<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return request counts, token counts and reference spend grouped by one attribution dimension. Both UTC dates and group_by are required. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
 *
 * @see Telnyx\Services\LlmTokenGateway\SpendService::retrieveSummary()
 *
 * @phpstan-type SpendRetrieveSummaryParamsShape = array{
 *   endDate: string,
 *   groupBy: string|SpendGroupBy|value-of<SpendGroupBy>,
 *   startDate: string,
 *   endUserID?: string|null,
 *   metadata?: array<string,string>|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   pageSnapshot?: string|null,
 *   tokenGroupID?: string|null,
 *   tokenKeyID?: string|null,
 *   tokenUserID?: string|null,
 * }
 */
final class SpendRetrieveSummaryParams implements BaseModel
{
    /** @use SdkModel<SpendRetrieveSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $endDate;

    /**
     * A scope, or metadata:<key> to group by one request tag's text-form value; requests without the key form one group with a null dimension_id.
     *
     * @var string|value-of<SpendGroupBy> $groupBy
     */
    #[Required(enum: SpendGroupBy::class)]
    public string $groupBy;

    #[Required]
    public string $startDate;

    #[Optional]
    public ?string $endUserID;

    /**
     * Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     *
     * @var array<string,string>|null $metadata
     */
    #[Optional(map: 'string')]
    public ?array $metadata;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    #[Optional]
    public ?string $pageSnapshot;

    #[Optional]
    public ?string $tokenGroupID;

    #[Optional]
    public ?string $tokenKeyID;

    #[Optional]
    public ?string $tokenUserID;

    /**
     * `new SpendRetrieveSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendRetrieveSummaryParams::with(endDate: ..., groupBy: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendRetrieveSummaryParams)
     *   ->withEndDate(...)
     *   ->withGroupBy(...)
     *   ->withStartDate(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|SpendGroupBy|value-of<SpendGroupBy> $groupBy
     * @param array<string,string>|null $metadata
     */
    public static function with(
        string $endDate,
        SpendGroupBy|string $groupBy,
        string $startDate,
        ?string $endUserID = null,
        ?array $metadata = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $pageSnapshot = null,
        ?string $tokenGroupID = null,
        ?string $tokenKeyID = null,
        ?string $tokenUserID = null,
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['groupBy'] = $groupBy;
        $self['startDate'] = $startDate;

        null !== $endUserID && $self['endUserID'] = $endUserID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageSnapshot && $self['pageSnapshot'] = $pageSnapshot;
        null !== $tokenGroupID && $self['tokenGroupID'] = $tokenGroupID;
        null !== $tokenKeyID && $self['tokenKeyID'] = $tokenKeyID;
        null !== $tokenUserID && $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * A scope, or metadata:<key> to group by one request tag's text-form value; requests without the key form one group with a null dimension_id.
     *
     * @param string|SpendGroupBy|value-of<SpendGroupBy> $groupBy
     */
    public function withGroupBy(SpendGroupBy|string $groupBy): self
    {
        $self = clone $this;
        $self['groupBy'] = $groupBy;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withEndUserID(string $endUserID): self
    {
        $self = clone $this;
        $self['endUserID'] = $endUserID;

        return $self;
    }

    /**
     * Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    public function withPageSnapshot(string $pageSnapshot): self
    {
        $self = clone $this;
        $self['pageSnapshot'] = $pageSnapshot;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenKeyID(string $tokenKeyID): self
    {
        $self = clone $this;
        $self['tokenKeyID'] = $tokenKeyID;

        return $self;
    }

    public function withTokenUserID(string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }
}
