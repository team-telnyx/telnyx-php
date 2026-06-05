<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirListParams\Sort;
use Telnyx\Dir\DirListParams\Status;

/**
 * Convenience endpoint that returns every DIR you own without scoping to a specific enterprise. Equivalent to calling `GET /v2/enterprises/{enterprise_id}/dir` for each enterprise and concatenating the results, but server-side and paginated as a single list.
 *
 * @see Telnyx\Services\DirService::list()
 *
 * @phpstan-type DirListParamsShape = array{
 *   enterpriseID?: string|null,
 *   filterExpiringAtGte?: \DateTimeInterface|null,
 *   filterExpiringAtLte?: \DateTimeInterface|null,
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
     * Restrict results to a single enterprise.
     */
    #[Optional]
    public ?string $enterpriseID;

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
     * Case-insensitive partial match on `display_name` or call reason.
     */
    #[Optional]
    public ?string $search;

    /**
     * Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
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
        ?string $enterpriseID = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $search = null,
        Sort|string|null $sort = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $filterExpiringAtGte && $self['filterExpiringAtGte'] = $filterExpiringAtGte;
        null !== $filterExpiringAtLte && $self['filterExpiringAtLte'] = $filterExpiringAtLte;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $search && $self['search'] = $search;
        null !== $sort && $self['sort'] = $sort;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Restrict results to a single enterprise.
     */
    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

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
     * Case-insensitive partial match on `display_name` or call reason.
     */
    public function withSearch(string $search): self
    {
        $self = clone $this;
        $self['search'] = $search;

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
