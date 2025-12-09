<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the amount of allocatable global outbound channels allocated to a specific managed account.
 *
 * @see Telnyx\Services\ManagedAccountsService::updateGlobalChannelLimit()
 *
 * @phpstan-type ManagedAccountUpdateGlobalChannelLimitParamsShape = array{
 *   channelLimit?: int
 * }
 */
final class ManagedAccountUpdateGlobalChannelLimitParams implements BaseModel
{
    /** @use SdkModel<ManagedAccountUpdateGlobalChannelLimitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $channelLimit = null): self
    {
        $self = new self;

        null !== $channelLimit && $self['channelLimit'] = $channelLimit;

        return $self;
    }

    /**
     * Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }
}
