<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The admin of the customer service record.
 *
 * @phpstan-type AdminShape = array{
 *   accountNumber?: string,
 *   authorizedPersonName?: string,
 *   billingPhoneNumber?: string,
 *   name?: string,
 * }
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Api('account_number', optional: true)]
    public ?string $accountNumber;

    /**
     * The authorized person name of the customer service record.
     */
    #[Api('authorized_person_name', optional: true)]
    public ?string $authorizedPersonName;

    /**
     * The billing phone number of the customer service record.
     */
    #[Api('billing_phone_number', optional: true)]
    public ?string $billingPhoneNumber;

    /**
     * The name of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $name;

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
        ?string $accountNumber = null,
        ?string $authorizedPersonName = null,
        ?string $billingPhoneNumber = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $accountNumber && $obj->accountNumber = $accountNumber;
        null !== $authorizedPersonName && $obj->authorizedPersonName = $authorizedPersonName;
        null !== $billingPhoneNumber && $obj->billingPhoneNumber = $billingPhoneNumber;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The account number of the customer service record.
     */
    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj->accountNumber = $accountNumber;

        return $obj;
    }

    /**
     * The authorized person name of the customer service record.
     */
    public function withAuthorizedPersonName(string $authorizedPersonName): self
    {
        $obj = clone $this;
        $obj->authorizedPersonName = $authorizedPersonName;

        return $obj;
    }

    /**
     * The billing phone number of the customer service record.
     */
    public function withBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $obj = clone $this;
        $obj->billingPhoneNumber = $billingPhoneNumber;

        return $obj;
    }

    /**
     * The name of the customer service record.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
