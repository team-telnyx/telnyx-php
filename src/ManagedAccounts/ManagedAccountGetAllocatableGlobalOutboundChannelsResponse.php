<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse\Data;

/**
 * @phpstan-type ManagedAccountGetAllocatableGlobalOutboundChannelsResponseShape = array{
 *   data?: Data|null
 * }
 */
final class ManagedAccountGetAllocatableGlobalOutboundChannelsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ManagedAccountGetAllocatableGlobalOutboundChannelsResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   allocatable_global_outbound_channels?: int|null,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   record_type?: string|null,
     *   total_global_channels_allocated?: int|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   allocatable_global_outbound_channels?: int|null,
     *   managed_account_allow_custom_pricing?: bool|null,
     *   record_type?: string|null,
     *   total_global_channels_allocated?: int|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
