<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams\FilterStatus;

/**
 * List the dedicated sending IPs owned by the account, newest first. Narrow the list with `filter[status]`, `filter[pool_id]`, and `filter[region]`; supplied filters combine, so an IP must match every one. An empty value, or a nested or array value such as `filter[status][]=active`, applies no filter, and other `filter[...]` keys are ignored. A value that no IP can match (an unknown status, a `pool_id` that is not a UUID, or a value containing a NUL byte) returns an empty list, not an error.
 *
 * @see Telnyx\Services\Email\DedicatedIPsService::list()
 *
 * @phpstan-type DedicatedIPListParamsShape = array{
 *   filterPoolID?: string|null,
 *   filterRegion?: string|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 * }
 */
final class DedicatedIPListParams implements BaseModel
{
    /** @use SdkModel<DedicatedIPListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return only IPs in this pool (exact match on `pool_id`). A value that is not a UUID returns an empty list. An empty value applies no filter.
     */
    #[Optional]
    public ?string $filterPoolID;

    /**
     * Return only IPs in this region (exact, case-sensitive match on `region`). An empty value applies no filter.
     */
    #[Optional]
    public ?string $filterRegion;

    /**
     * Return only IPs in this lifecycle status (exact match). Any other value returns an empty list. An empty value applies no filter.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

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
     */
    public static function with(
        ?string $filterPoolID = null,
        ?string $filterRegion = null,
        FilterStatus|string|null $filterStatus = null,
    ): self {
        $self = new self;

        null !== $filterPoolID && $self['filterPoolID'] = $filterPoolID;
        null !== $filterRegion && $self['filterRegion'] = $filterRegion;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * Return only IPs in this pool (exact match on `pool_id`). A value that is not a UUID returns an empty list. An empty value applies no filter.
     */
    public function withFilterPoolID(string $filterPoolID): self
    {
        $self = clone $this;
        $self['filterPoolID'] = $filterPoolID;

        return $self;
    }

    /**
     * Return only IPs in this region (exact, case-sensitive match on `region`). An empty value applies no filter.
     */
    public function withFilterRegion(string $filterRegion): self
    {
        $self = clone $this;
        $self['filterRegion'] = $filterRegion;

        return $self;
    }

    /**
     * Return only IPs in this lifecycle status (exact match). Any other value returns an empty list. An empty value applies no filter.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }
}
