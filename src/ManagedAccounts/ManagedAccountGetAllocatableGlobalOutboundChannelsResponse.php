<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse\Data;

/**
 * @phpstan-type ManagedAccountGetAllocatableGlobalOutboundChannelsResponseShape = array{
 *   data?: Data|null
 * }
 */
final class ManagedAccountGetAllocatableGlobalOutboundChannelsResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountGetAllocatableGlobalOutboundChannelsResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   allocatableGlobalOutboundChannels?: int|null,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   recordType?: string|null,
     *   totalGlobalChannelsAllocated?: int|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   allocatableGlobalOutboundChannels?: int|null,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   recordType?: string|null,
     *   totalGlobalChannelsAllocated?: int|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
