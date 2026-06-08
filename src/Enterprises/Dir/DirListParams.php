<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Dir\DirListParams\FilterStatus;
use Telnyx\Enterprises\Dir\DirListParams\Sort;

/**
 * Return the DIRs (Display Identity Records) belonging to a single enterprise. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Supports `filter[]` query params: `filter[status]`, `filter[display_name][contains]`, `filter[call_reason][contains]`, plus the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]` and the convenience `filter[expiring_within_days]` (mutually exclusive with the explicit gte/lte form). Sortable by `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at` (prefix `-` for descending; default `-created_at`).
 *
 * @see Telnyx\Services\Enterprises\DirService::list()
 *
 * @phpstan-type DirListParamsShape = array{
 *   filterCallReasonContains?: string|null,
 *   filterDisplayNameContains?: string|null,
 *   filterExpiringAtGte?: \DateTimeInterface|null,
 *   filterExpiringAtLte?: \DateTimeInterface|null,
 *   filterExpiringWithinDays?: int|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class DirListParams implements BaseModel
{
    /** @use SdkModel<DirListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Case-insensitive partial match on call reason.
     */
    #[Optional]
    public ?string $filterCallReasonContains;

    /**
     * Case-insensitive partial match on display name.
     */
    #[Optional]
    public ?string $filterDisplayNameContains;

    /**
     * Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterExpiringAtGte;

    /**
     * Return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterExpiringAtLte;

    /**
     * Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters - combining returns 400.
     */
    #[Optional]
    public ?int $filterExpiringWithinDays;

    /**
     * Filter by DIR status.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
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
     * @param FilterStatus|value-of<FilterStatus>|null $filterStatus
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterCallReasonContains = null,
        ?string $filterDisplayNameContains = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        ?int $filterExpiringWithinDays = null,
        FilterStatus|string|null $filterStatus = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterCallReasonContains && $self['filterCallReasonContains'] = $filterCallReasonContains;
        null !== $filterDisplayNameContains && $self['filterDisplayNameContains'] = $filterDisplayNameContains;
        null !== $filterExpiringAtGte && $self['filterExpiringAtGte'] = $filterExpiringAtGte;
        null !== $filterExpiringAtLte && $self['filterExpiringAtLte'] = $filterExpiringAtLte;
        null !== $filterExpiringWithinDays && $self['filterExpiringWithinDays'] = $filterExpiringWithinDays;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Case-insensitive partial match on call reason.
     */
    public function withFilterCallReasonContains(
        string $filterCallReasonContains
    ): self {
        $self = clone $this;
        $self['filterCallReasonContains'] = $filterCallReasonContains;

        return $self;
    }

    /**
     * Case-insensitive partial match on display name.
     */
    public function withFilterDisplayNameContains(
        string $filterDisplayNameContains
    ): self {
        $self = clone $this;
        $self['filterDisplayNameContains'] = $filterDisplayNameContains;

        return $self;
    }

    /**
     * Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp.
     */
    public function withFilterExpiringAtGte(
        \DateTimeInterface $filterExpiringAtGte
    ): self {
        $self = clone $this;
        $self['filterExpiringAtGte'] = $filterExpiringAtGte;

        return $self;
    }

    /**
     * Return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp.
     */
    public function withFilterExpiringAtLte(
        \DateTimeInterface $filterExpiringAtLte
    ): self {
        $self = clone $this;
        $self['filterExpiringAtLte'] = $filterExpiringAtLte;

        return $self;
    }

    /**
     * Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters - combining returns 400.
     */
    public function withFilterExpiringWithinDays(
        int $filterExpiringWithinDays
    ): self {
        $self = clone $this;
        $self['filterExpiringWithinDays'] = $filterExpiringWithinDays;

        return $self;
    }

    /**
     * Filter by DIR status.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
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
