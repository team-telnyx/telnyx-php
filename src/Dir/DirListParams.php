<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirListParams\Sort;

/**
 * Returns every DIR (Display Identity Record) you own, across all of your enterprises, as a single list. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Supports `filter[]` query params: `filter[enterprise_id]`, `filter[status]`, `filter[display_name][contains]`, `filter[call_reason][contains]`, plus the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]`. Sortable by `created_at`, `updated_at`, `display_name`, `status` (prefix `-` for descending; default `-created_at`).
 *
 * @see Telnyx\Services\DirService::list()
 *
 * @phpstan-type DirListParamsShape = array{
 *   filterCallReasonContains?: string|null,
 *   filterDisplayNameContains?: string|null,
 *   filterEnterpriseID?: string|null,
 *   filterExpiringAtGte?: \DateTimeInterface|null,
 *   filterExpiringAtLte?: \DateTimeInterface|null,
 *   filterStatus?: null|DirStatus|value-of<DirStatus>,
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
     * Filter by enterprise ID.
     */
    #[Optional]
    public ?string $filterEnterpriseID;

    /**
     * Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp. Pairs with the `[lte]` variant to build renewal-window dashboards.
     */
    #[Optional]
    public ?\DateTimeInterface $filterExpiringAtGte;

    /**
     * Return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterExpiringAtLte;

    /**
     * Filter by DIR status.
     *
     * @var value-of<DirStatus>|null $filterStatus
     */
    #[Optional(enum: DirStatus::class)]
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
     * Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
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
     * @param DirStatus|value-of<DirStatus>|null $filterStatus
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterCallReasonContains = null,
        ?string $filterDisplayNameContains = null,
        ?string $filterEnterpriseID = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        DirStatus|string|null $filterStatus = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterCallReasonContains && $self['filterCallReasonContains'] = $filterCallReasonContains;
        null !== $filterDisplayNameContains && $self['filterDisplayNameContains'] = $filterDisplayNameContains;
        null !== $filterEnterpriseID && $self['filterEnterpriseID'] = $filterEnterpriseID;
        null !== $filterExpiringAtGte && $self['filterExpiringAtGte'] = $filterExpiringAtGte;
        null !== $filterExpiringAtLte && $self['filterExpiringAtLte'] = $filterExpiringAtLte;
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
     * Filter by enterprise ID.
     */
    public function withFilterEnterpriseID(string $filterEnterpriseID): self
    {
        $self = clone $this;
        $self['filterEnterpriseID'] = $filterEnterpriseID;

        return $self;
    }

    /**
     * Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp. Pairs with the `[lte]` variant to build renewal-window dashboards.
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
     * Filter by DIR status.
     *
     * @param DirStatus|value-of<DirStatus> $filterStatus
     */
    public function withFilterStatus(DirStatus|string $filterStatus): self
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
     * Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
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
