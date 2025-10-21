<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new legacy usage V2 CDR report request with the specified filters.
 *
 * @see Telnyx\Legacy\Reporting\UsageReports\Voice->create
 *
 * @phpstan-type voice_create_params = array{
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
    /** @use SdkModel<voice_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * End time in ISO format.
     */
    #[Api('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Api('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    #[Api('aggregation_type', optional: true)]
    public ?int $aggregationType;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Api('managed_accounts', list: 'string', optional: true)]
    public ?array $managedAccounts;

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    #[Api('product_breakdown', optional: true)]
    public ?int $productBreakdown;

    /**
     * Whether to select all managed accounts.
     */
    #[Api('select_all_managed_accounts', optional: true)]
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
        $obj = new self;

        $obj->endTime = $endTime;
        $obj->startTime = $startTime;

        null !== $aggregationType && $obj->aggregationType = $aggregationType;
        null !== $connections && $obj->connections = $connections;
        null !== $managedAccounts && $obj->managedAccounts = $managedAccounts;
        null !== $productBreakdown && $obj->productBreakdown = $productBreakdown;
        null !== $selectAllManagedAccounts && $obj->selectAllManagedAccounts = $selectAllManagedAccounts;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj->aggregationType = $aggregationType;

        return $obj;
    }

    /**
     * List of connections to filter by.
     *
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj->connections = $connections;

        return $obj;
    }

    /**
     * List of managed accounts to include.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj->managedAccounts = $managedAccounts;

        return $obj;
    }

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
        $obj = clone $this;
        $obj->productBreakdown = $productBreakdown;

        return $obj;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $obj = clone $this;
        $obj->selectAllManagedAccounts = $selectAllManagedAccounts;

        return $obj;
    }
}
