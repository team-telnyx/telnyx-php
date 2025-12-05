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
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\VoiceService::create()
 *
 * @phpstan-type VoiceCreateParamsShape = array{
 *   end_time: \DateTimeInterface,
 *   start_time: \DateTimeInterface,
 *   aggregation_type?: int,
 *   connections?: list<int>,
 *   managed_accounts?: list<string>,
 *   product_breakdown?: int,
 *   select_all_managed_accounts?: bool,
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
    #[Api]
    public \DateTimeInterface $end_time;

    /**
     * Start time in ISO format.
     */
    #[Api]
    public \DateTimeInterface $start_time;

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    #[Api(optional: true)]
    public ?int $aggregation_type;

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
     * @var list<string>|null $managed_accounts
     */
    #[Api(list: 'string', optional: true)]
    public ?array $managed_accounts;

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    #[Api(optional: true)]
    public ?int $product_breakdown;

    /**
     * Whether to select all managed accounts.
     */
    #[Api(optional: true)]
    public ?bool $select_all_managed_accounts;

    /**
     * `new VoiceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCreateParams::with(end_time: ..., start_time: ...)
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
     * @param list<string> $managed_accounts
     */
    public static function with(
        \DateTimeInterface $end_time,
        \DateTimeInterface $start_time,
        ?int $aggregation_type = null,
        ?array $connections = null,
        ?array $managed_accounts = null,
        ?int $product_breakdown = null,
        ?bool $select_all_managed_accounts = null,
    ): self {
        $obj = new self;

        $obj['end_time'] = $end_time;
        $obj['start_time'] = $start_time;

        null !== $aggregation_type && $obj['aggregation_type'] = $aggregation_type;
        null !== $connections && $obj['connections'] = $connections;
        null !== $managed_accounts && $obj['managed_accounts'] = $managed_accounts;
        null !== $product_breakdown && $obj['product_breakdown'] = $product_breakdown;
        null !== $select_all_managed_accounts && $obj['select_all_managed_accounts'] = $select_all_managed_accounts;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregation_type'] = $aggregationType;

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
        $obj['connections'] = $connections;

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
        $obj['managed_accounts'] = $managedAccounts;

        return $obj;
    }

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
        $obj = clone $this;
        $obj['product_breakdown'] = $productBreakdown;

        return $obj;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $obj = clone $this;
        $obj['select_all_managed_accounts'] = $selectAllManagedAccounts;

        return $obj;
    }
}
