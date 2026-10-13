<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return request-level usage history for the authenticated account. Supply both UTC dates or neither; omitting both returns the previous full UTC day. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
 *
 * @see Telnyx\Services\LlmTokenGateway\SpendService::retrieveEvents()
 *
 * @phpstan-type SpendRetrieveEventsParamsShape = array{
 *   endDate?: string|null,
 *   endUserID?: string|null,
 *   metadata?: array<string,string>|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   pageSnapshot?: string|null,
 *   startDate?: string|null,
 *   tokenGroupID?: string|null,
 *   tokenKeyID?: string|null,
 *   tokenUserID?: string|null,
 * }
 */
final class SpendRetrieveEventsParams implements BaseModel
{
    /** @use SdkModel<SpendRetrieveEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $endDate;

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
    public ?string $startDate;

    #[Optional]
    public ?string $tokenGroupID;

    #[Optional]
    public ?string $tokenKeyID;

    #[Optional]
    public ?string $tokenUserID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,string>|null $metadata
     */
    public static function with(
        ?string $endDate = null,
        ?string $endUserID = null,
        ?array $metadata = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $pageSnapshot = null,
        ?string $startDate = null,
        ?string $tokenGroupID = null,
        ?string $tokenKeyID = null,
        ?string $tokenUserID = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $endUserID && $self['endUserID'] = $endUserID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageSnapshot && $self['pageSnapshot'] = $pageSnapshot;
        null !== $startDate && $self['startDate'] = $startDate;
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

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

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
