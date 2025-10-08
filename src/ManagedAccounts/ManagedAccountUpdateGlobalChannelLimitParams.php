<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ManagedAccountUpdateGlobalChannelLimitParams); // set properties as needed
 * $client->managedAccounts->updateGlobalChannelLimit(...$params->toArray());
 * ```
 * Update the amount of allocatable global outbound channels allocated to a specific managed account.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->managedAccounts->updateGlobalChannelLimit(...$params->toArray());`
 *
 * @see Telnyx\ManagedAccounts->updateGlobalChannelLimit
 *
 * @phpstan-type managed_account_update_global_channel_limit_params = array{
 *   channelLimit?: int
 * }
 */
final class ManagedAccountUpdateGlobalChannelLimitParams implements BaseModel
{
    /** @use SdkModel<managed_account_update_global_channel_limit_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    #[Api('channel_limit', optional: true)]
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
        $obj = new self;

        null !== $channelLimit && $obj->channelLimit = $channelLimit;

        return $obj;
    }

    /**
     * Integer value that indicates the number of allocatable global outbound channels that should be allocated to the managed account. Must be 0 or more. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channelLimit = $channelLimit;

        return $obj;
    }
}
