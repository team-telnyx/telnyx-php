<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new managed account owned by the authenticated user. You need to be explictly approved by Telnyx in order to become a manager account.
 *
 * @see Telnyx\ManagedAccounts->create
 *
 * @phpstan-type ManagedAccountCreateParamsShape = array{
 *   business_name: string,
 *   email?: string,
 *   managed_account_allow_custom_pricing?: bool,
 *   password?: string,
 *   rollup_billing?: bool,
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
    #[Api]
    public string $business_name;

    /**
     * The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    #[Api(optional: true)]
    public ?bool $managed_account_allow_custom_pricing;

    /**
     * Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.).
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $rollup_billing;

    /**
     * `new ManagedAccountCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ManagedAccountCreateParams::with(business_name: ...)
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
        string $business_name,
        ?string $email = null,
        ?bool $managed_account_allow_custom_pricing = null,
        ?string $password = null,
        ?bool $rollup_billing = null,
    ): self {
        $obj = new self;

        $obj->business_name = $business_name;

        null !== $email && $obj->email = $email;
        null !== $managed_account_allow_custom_pricing && $obj->managed_account_allow_custom_pricing = $managed_account_allow_custom_pricing;
        null !== $password && $obj->password = $password;
        null !== $rollup_billing && $obj->rollup_billing = $rollup_billing;

        return $obj;
    }

    /**
     * The name of the business for which the new managed account is being created, that will be used as the managed accounts's organization's name.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->business_name = $businessName;

        return $obj;
    }

    /**
     * The email address for the managed account. If not provided, the email address will be generated based on the email address of the manager account.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Boolean value that indicates if the managed account is able to have custom pricing set for it or not. If false, uses the pricing of the manager account. Defaults to false. This value may be changed after creation, but there may be time lag between when the value is changed and pricing changes take effect.
     */
    public function withManagedAccountAllowCustomPricing(
        bool $managedAccountAllowCustomPricing
    ): self {
        $obj = clone $this;
        $obj->managed_account_allow_custom_pricing = $managedAccountAllowCustomPricing;

        return $obj;
    }

    /**
     * Password for the managed account. If a password is not supplied, the account will not be able to be signed into directly. (A password reset may still be performed later to enable sign-in via password.).
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * Boolean value that indicates if the billing information and charges to the managed account "roll up" to the manager account. If true, the managed account will not have its own balance and will use the shared balance with the manager account. This value cannot be changed after account creation without going through Telnyx support as changes require manual updates to the account ledger. Defaults to false.
     */
    public function withRollupBilling(bool $rollupBilling): self
    {
        $obj = clone $this;
        $obj->rollup_billing = $rollupBilling;

        return $obj;
    }
}
