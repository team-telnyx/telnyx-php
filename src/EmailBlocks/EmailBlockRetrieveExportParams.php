<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason;
use Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort;

/**
 * Streams the account's suppressions as a chunked CSV (server-side
 * cursor; never materialized). Content-type `text/csv`, header
 * `Content-Disposition: attachment; filename="email_blocks_export.csv"`.
 *
 * Filters (`filter[reason]`, `filter[domain_id]`,
 * `filter[created_after]`, `filter[created_before]`) are the only
 * params that affect output. `sort` and `page[*]` are **parsed**
 * (bad values still produce `400`) but **ignored** — rows stream
 * `ORDER BY created_at ASC, id ASC` with no pagination.
 *
 * CSV columns: `id,to,from,reason,source,scope,status,domain_id,
 * created_at,updated_at,expires_at,group_id`. The CSV carries the
 * `group_id` column so group-scoped suppressions' group link survives
 * the export (empty for account-scope rows).
 *
 * @see Telnyx\Services\EmailBlocksService::retrieveExport()
 *
 * @phpstan-type EmailBlockRetrieveExportParamsShape = array{
 *   filterCreatedAfter?: \DateTimeInterface|null,
 *   filterCreatedBefore?: \DateTimeInterface|null,
 *   filterDomainID?: string|null,
 *   filterReason?: null|FilterReason|value-of<FilterReason>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class EmailBlockRetrieveExportParams implements BaseModel
{
    /** @use SdkModel<EmailBlockRetrieveExportParamsShape> */
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
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAfter && $self['filterCreatedAfter'] = $filterCreatedAfter;
        null !== $filterCreatedBefore && $self['filterCreatedBefore'] = $filterCreatedBefore;
        null !== $filterDomainID && $self['filterDomainID'] = $filterDomainID;
        null !== $filterReason && $self['filterReason'] = $filterReason;
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
