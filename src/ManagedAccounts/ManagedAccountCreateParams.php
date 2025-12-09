<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new managed account owned by the authenticated user. You need to be explictly approved by Telnyx in order to become a manager account.
 *
 * @see Telnyx\Services\ManagedAccountsService::create()
 *
 * @phpstan-type ManagedAccountCreateParamsShape = array{
 *   businessName: string,
 *   email?: string,
 *   managedAccountAllowCustomPricing?: bool,
 *   password?: string,
 *   rollupBilling?: bool,
 * }
 */
final class ManagedAccountCreateParams implements BaseModel
{
    /** @use SdkModel<ManagedAccountCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the business for which the new managed account is being created, that will be used as the managed accounts's organization's name.
     */
    #[Required('business_name')]
    public string $businessName;

    /**
     * The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     */
    #[Optional]
    public ?string $email;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Optional('managed_account_allow_custom_pricing')]
    public ?bool $managedAccountAllowCustomPricing;

    /**
     * Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.).
     */
    #[Optional]
    public ?string $password;

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    #[Optional('rollup_billing')]
    public ?bool $rollupBilling;

    /**
     * `new ManagedAccountCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ManagedAccountCreateParams::with(businessName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ManagedAccountCreateParams)->withBusinessName(...)
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
     */
    public static function with(
        string $businessName,
        ?string $email = null,
        ?bool $managedAccountAllowCustomPricing = null,
        ?string $password = null,
        ?bool $rollupBilling = null,
    ): self {
        $self = new self;

        $self['businessName'] = $businessName;

        null !== $email && $self['email'] = $email;
        null !== $managedAccountAllowCustomPricing && $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;
        null !== $password && $self['password'] = $password;
        null !== $rollupBilling && $self['rollupBilling'] = $rollupBilling;

        return $self;
    }

    /**
     * The name of the business for which the new managed account is being created, that will be used as the managed accounts's organization's name.
     */
    public function withBusinessName(string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $self = clone $this;
        $self['managedAccountAllowCustomPricing'] = $managedAccountAllowCustomPricing;

        return $self;
    }

    /**
     * Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.).
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    public function withRollupBilling(bool $rollupBilling): self
    {
        $self = clone $this;
        $self['rollupBilling'] = $rollupBilling;

        return $self;
    }
}
