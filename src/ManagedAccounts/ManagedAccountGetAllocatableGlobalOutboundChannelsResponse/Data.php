<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   allocatable_global_outbound_channels?: int|null,
 *   managed_account_allow_custom_pricing?: bool|null,
 *   record_type?: string|null,
 *   total_global_channels_allocated?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The total amount of allocatable global outbound channels available to the authenticated manager. Will be 0 if the feature is not enabled for their account.
     */
    #[Optional]
    public ?int $allocatable_global_outbound_channels;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Optional]
    public ?bool $managed_account_allow_custom_pricing;

    /**
     * The type of the data contained in this record.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * The total number of allocatable global outbound channels currently allocated across all managed accounts for the authenticated user. This includes any amount of channels allocated by default at managed account creation time. Will be 0 if the feature is not enabled for their account.
     */
    #[Optional]
    public ?int $total_global_channels_allocated;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $allocatable_global_outbound_channels = null,
        ?bool $managed_account_allow_custom_pricing = null,
        ?string $record_type = null,
        ?int $total_global_channels_allocated = null,
    ): self {
        $obj = new self;

        null !== $allocatable_global_outbound_channels && $obj['allocatable_global_outbound_channels'] = $allocatable_global_outbound_channels;
        null !== $managed_account_allow_custom_pricing && $obj['managed_account_allow_custom_pricing'] = $managed_account_allow_custom_pricing;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $total_global_channels_allocated && $obj['total_global_channels_allocated'] = $total_global_channels_allocated;

        return $obj;
    }

    /**
     * The total amount of allocatable global outbound channels available to the authenticated manager. Will be 0 if the feature is not enabled for their account.
     */
    public function withAllocatableGlobalOutboundChannels(
        int $allocatableGlobalOutboundChannels
    ): self {
        $obj = clone $this;
        $obj['allocatable_global_outbound_channels'] = $allocatableGlobalOutboundChannels;

        return $obj;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $obj = clone $this;
        $obj['managed_account_allow_custom_pricing'] = $managedAccountAllowCustomPricing;

        return $obj;
    }

    /**
     * The type of the data contained in this record.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The total number of allocatable global outbound channels currently allocated across all managed accounts for the authenticated user. This includes any amount of channels allocated by default at managed account creation time. Will be 0 if the feature is not enabled for their account.
     */
    public function withTotalGlobalChannelsAllocated(
        int $totalGlobalChannelsAllocated
    ): self {
        $obj = clone $this;
        $obj['total_global_channels_allocated'] = $totalGlobalChannelsAllocated;

        return $obj;
    }
}
