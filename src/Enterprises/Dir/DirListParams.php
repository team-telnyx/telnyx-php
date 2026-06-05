<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Dir\DirListParams\Sort;
use Telnyx\Enterprises\Dir\DirListParams\Status;

/**
 * Return the DIRs (Display Identity Records) belonging to a single enterprise. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Filterable by `status`. Searchable by case-insensitive partial match on `display_name` (`search=`). Sortable by any of `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at` (prefix `-` for descending; default `-created_at`). Supports the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]` and the convenience `filter[expiring_within_days]` (mutually exclusive with the explicit gte/lte form).
 *
 * @see Telnyx\Services\Enterprises\DirService::list()
 *
 * @phpstan-type DirListParamsShape = array{
 *   filterExpiringAtGte?: \DateTimeInterface|null,
 *   filterExpiringAtLte?: \DateTimeInterface|null,
 *   filterExpiringWithinDays?: int|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   search?: string|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class DirListParams implements BaseModel
{
    /** @use SdkModel<DirListParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters — combining returns 400.
     */
    #[Optional]
    public ?int $filterExpiringWithinDays;

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
     * Case-insensitive partial match on `display_name`.
     */
    #[Optional]
    public ?string $search;

    /**
     * Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * Filter by DIR status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        ?int $filterExpiringWithinDays = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $search = null,
        Sort|string|null $sort = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $filterExpiringAtGte && $self['filterExpiringAtGte'] = $filterExpiringAtGte;
        null !== $filterExpiringAtLte && $self['filterExpiringAtLte'] = $filterExpiringAtLte;
        null !== $filterExpiringWithinDays && $self['filterExpiringWithinDays'] = $filterExpiringWithinDays;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $search && $self['search'] = $search;
        null !== $sort && $self['sort'] = $sort;
        null !== $status && $self['status'] = $status;

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
     * Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters — combining returns 400.
     */
    public function withFilterExpiringWithinDays(
        int $filterExpiringWithinDays
    ): self {
        $self = clone $this;
        $self['filterExpiringWithinDays'] = $filterExpiringWithinDays;

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
     * Case-insensitive partial match on `display_name`.
     */
    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

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

    /**
     * Filter by DIR status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
