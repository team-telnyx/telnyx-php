<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a single managed account.
 *
 * @see Telnyx\ManagedAccounts->update
 *
 * @phpstan-type managed_account_update_params = array{
 *   managedAccountAllowCustomPricing?: bool
 * }
 */
final class ManagedAccountUpdateParams implements BaseModel
{
    /** @use SdkModel<managed_account_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Api('managed_account_allow_custom_pricing', optional: true)]
    public ?bool $managedAccountAllowCustomPricing;

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
        ?bool $managedAccountAllowCustomPricing = null
    ): self {
        $obj = new self;

        null !== $managedAccountAllowCustomPricing && $obj->managedAccountAllowCustomPricing = $managedAccountAllowCustomPricing;

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
}
