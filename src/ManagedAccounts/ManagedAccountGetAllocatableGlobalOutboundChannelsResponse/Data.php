<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   allocatableGlobalOutboundChannels?: int,
 *   managedAccountAllowCustomPricing?: bool,
 *   recordType?: string,
 *   totalGlobalChannelsAllocated?: int,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The total amount of allocatable global outbound channels available to the authenticated manager. Will be 0 if the feature is not enabled for their account.
     */
    #[Api('allocatable_global_outbound_channels', optional: true)]
    public ?int $allocatableGlobalOutboundChannels;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Api('managed_account_allow_custom_pricing', optional: true)]
    public ?bool $managedAccountAllowCustomPricing;

    /**
     * The type of the data contained in this record.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The total number of allocatable global outbound channels currently allocated across all managed accounts for the authenticated user. This includes any amount of channels allocated by default at managed account creation time. Will be 0 if the feature is not enabled for their account.
     */
    #[Api('total_global_channels_allocated', optional: true)]
    public ?int $totalGlobalChannelsAllocated;

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
        ?int $allocatableGlobalOutboundChannels = null,
        ?bool $managedAccountAllowCustomPricing = null,
        ?string $recordType = null,
        ?int $totalGlobalChannelsAllocated = null,
    ): self {
        $obj = new self;

        null !== $allocatableGlobalOutboundChannels && $obj->allocatableGlobalOutboundChannels = $allocatableGlobalOutboundChannels;
        null !== $managedAccountAllowCustomPricing && $obj->managedAccountAllowCustomPricing = $managedAccountAllowCustomPricing;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $totalGlobalChannelsAllocated && $obj->totalGlobalChannelsAllocated = $totalGlobalChannelsAllocated;

        return $obj;
    }

    /**
     * The total amount of allocatable global outbound channels available to the authenticated manager. Will be 0 if the feature is not enabled for their account.
     */
    public function withAllocatableGlobalOutboundChannels(
        int $allocatableGlobalOutboundChannels
    ): self {
        $obj = clone $this;
        $obj->allocatableGlobalOutboundChannels = $allocatableGlobalOutboundChannels;

        return $obj;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $obj = clone $this;
        $obj->managedAccountAllowCustomPricing = $managedAccountAllowCustomPricing;

        return $obj;
    }

    /**
     * The type of the data contained in this record.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The total number of allocatable global outbound channels currently allocated across all managed accounts for the authenticated user. This includes any amount of channels allocated by default at managed account creation time. Will be 0 if the feature is not enabled for their account.
     */
    public function withTotalGlobalChannelsAllocated(
        int $totalGlobalChannelsAllocated
    ): self {
        $obj = clone $this;
        $obj->totalGlobalChannelsAllocated = $totalGlobalChannelsAllocated;

        return $obj;
    }
}
