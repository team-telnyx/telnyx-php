<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a single managed account.
 *
 * @see Telnyx\Services\ManagedAccountsService::update()
 *
 * @phpstan-type ManagedAccountUpdateParamsShape = array{
 *   managedAccountAllowCustomPricing?: bool|null
 * }
 */
final class ManagedAccountUpdateParams implements BaseModel
{
    /** @use SdkModel<ManagedAccountUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Optional('managed_account_allow_custom_pricing')]
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
        $self = new self;

        null !== $managedAccountAllowCustomPricing && $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;

        return $self;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $self = clone $this;
        $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;

        return $self;
    }
}
