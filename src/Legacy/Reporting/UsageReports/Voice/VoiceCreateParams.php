<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new legacy usage V2 CDR report request with the specified filters.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\VoiceService::create()
 *
 * @phpstan-type VoiceCreateParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   aggregationType?: int,
 *   connections?: list<int>,
 *   managedAccounts?: list<string>,
 *   productBreakdown?: int,
 *   selectAllManagedAccounts?: bool,
 * }
 */
final class VoiceCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End time in ISO format.
     */
    #[Required('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Required('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    #[Optional('aggregation_type')]
    public ?int $aggregationType;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Optional(list: 'int')]
    public ?array $connections;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    #[Optional('product_breakdown')]
    public ?int $productBreakdown;

    /**
     * Whether to select all managed accounts.
     */
    #[Optional('select_all_managed_accounts')]
    public ?bool $selectAllManagedAccounts;

    /**
     * `new VoiceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCreateParams::with(endTime: ..., startTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCreateParams)->withEndTime(...)->withStartTime(...)
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
     * @param list<int> $connections
     * @param list<string> $managedAccounts
     */
    public static function with(
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?int $aggregationType = null,
        ?array $connections = null,
        ?array $managedAccounts = null,
        ?int $productBreakdown = null,
        ?bool $selectAllManagedAccounts = null,
    ): self {
        $self = new self;

        $self['endTime'] = $endTime;
        $self['startTime'] = $startTime;

        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $connections && $self['connections'] = $connections;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $productBreakdown && $self['productBreakdown'] = $productBreakdown;
        null !== $selectAllManagedAccounts && $self['selectAllManagedAccounts'] = $selectAllManagedAccounts;

        return $self;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * List of connections to filter by.
     *
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    /**
     * List of managed accounts to include.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $self = clone $this;
        $self['managedAccounts'] = $managedAccounts;

        return $self;
    }

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
        $self = clone $this;
        $self['productBreakdown'] = $productBreakdown;

        return $self;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $self = clone $this;
        $self['selectAllManagedAccounts'] = $selectAllManagedAccounts;

        return $self;
    }
}
