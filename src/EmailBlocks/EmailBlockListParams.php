<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\EmailBlockListParams\FilterReason;
use Telnyx\EmailBlocks\EmailBlockListParams\Sort;

/**
 * Account-scoped list. Two mutually exclusive pagination modes:
 *
 *   - **Offset**: `page[number]` (default 1) + `page[size]`
 *     (default 25, max 100). `meta` contains `total_pages`.
 *   - **Cursor**: `page[after]` and/or `page[before]` (opaque
 *     `Base.url_encode64` of `{"created_at","id"}`). Cannot combine
 *     with `page[number]`; `after`+`before` together is an error.
 *     `meta` contains `next_cursor` / `previous_cursor` (omitted when
 *     their flag is false).
 *
 * Sort defaults to `-created_at` (desc); only `created_at` is sortable.
 * A `--` prefix is an error. `nil`/empty filter values are silently dropped.
 *
 * @see Telnyx\Services\EmailBlocksService::list()
 *
 * @phpstan-type EmailBlockListParamsShape = array{
 *   filterCreatedAfter?: \DateTimeInterface|null,
 *   filterCreatedBefore?: \DateTimeInterface|null,
 *   filterDomainID?: string|null,
 *   filterReason?: null|FilterReason|value-of<FilterReason>,
 *   pageAfter?: string|null,
 *   pageBefore?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class EmailBlockListParams implements BaseModel
{
    /** @use SdkModel<EmailBlockListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * `created_at > value` (ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedAfter;

    /**
     * `created_at < value` (ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedBefore;

    /**
     * Exact-match filter on domain_id (UUID).
     */
    #[Optional]
    public ?string $filterDomainID;

    /**
     * Exact-match filter on reason.
     *
     * @var value-of<FilterReason>|null $filterReason
     */
    #[Optional(enum: FilterReason::class)]
    public ?string $filterReason;

    /**
     * Opaque cursor (`Base.url_encode64` of `{"created_at","id"}`). Cursor mode; mutually exclusive with `page[number]` and `page[before]`.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Opaque cursor (see `page[after]`). Mutually exclusive with `page[after]` and `page[number]`.
     */
    #[Optional]
    public ?string $pageBefore;

    /**
     * Offset page number (≥1, default 1).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Page size (1–100, default 25).
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterReason|value-of<FilterReason>|null $filterReason
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?\DateTimeInterface $filterCreatedAfter = null,
        ?\DateTimeInterface $filterCreatedBefore = null,
        ?string $filterDomainID = null,
        FilterReason|string|null $filterReason = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAfter && $self['filterCreatedAfter'] = $filterCreatedAfter;
        null !== $filterCreatedBefore && $self['filterCreatedBefore'] = $filterCreatedBefore;
        null !== $filterDomainID && $self['filterDomainID'] = $filterDomainID;
        null !== $filterReason && $self['filterReason'] = $filterReason;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageBefore && $self['pageBefore'] = $pageBefore;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * `created_at > value` (ISO 8601).
     */
    public function withFilterCreatedAfter(
        \DateTimeInterface $filterCreatedAfter
    ): self {
        $self = clone $this;
        $self['filterCreatedAfter'] = $filterCreatedAfter;

        return $self;
    }

    /**
     * `created_at < value` (ISO 8601).
     */
    public function withFilterCreatedBefore(
        \DateTimeInterface $filterCreatedBefore
    ): self {
        $self = clone $this;
        $self['filterCreatedBefore'] = $filterCreatedBefore;

        return $self;
    }

    /**
     * Exact-match filter on domain_id (UUID).
     */
    public function withFilterDomainID(string $filterDomainID): self
    {
        $self = clone $this;
        $self['filterDomainID'] = $filterDomainID;

        return $self;
    }

    /**
     * Exact-match filter on reason.
     *
     * @param FilterReason|value-of<FilterReason> $filterReason
     */
    public function withFilterReason(FilterReason|string $filterReason): self
    {
        $self = clone $this;
        $self['filterReason'] = $filterReason;

        return $self;
    }

    /**
     * Opaque cursor (`Base.url_encode64` of `{"created_at","id"}`). Cursor mode; mutually exclusive with `page[number]` and `page[before]`.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Opaque cursor (see `page[after]`). Mutually exclusive with `page[after]` and `page[number]`.
     */
    public function withPageBefore(string $pageBefore): self
    {
        $self = clone $this;
        $self['pageBefore'] = $pageBefore;

        return $self;
    }

    /**
     * Offset page number (≥1, default 1).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Page size (1–100, default 25).
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
