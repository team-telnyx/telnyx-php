<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type additional_data = array{
 *   accountNumber?: string|null,
 *   addressLine1?: string|null,
 *   authorizedPersonName?: string|null,
 *   billingPhoneNumber?: string|null,
 *   city?: string|null,
 *   customerCode?: string|null,
 *   name?: string|null,
 *   pin?: string|null,
 *   state?: string|null,
 *   zipCode?: string|null,
 * }
 */
final class AdditionalData implements BaseModel
{
    /** @use SdkModel<additional_data> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Api('account_number', optional: true)]
    public ?string $accountNumber;

    /**
     * The first line of the address of the customer service record.
     */
    #[Api('address_line_1', optional: true)]
    public ?string $addressLine1;

    /**
     * The name of the authorized person.
     */
    #[Api('authorized_person_name', optional: true)]
    public ?string $authorizedPersonName;

    /**
     * The billing phone number of the customer service record.
     */
    #[Api('billing_phone_number', optional: true)]
    public ?string $billingPhoneNumber;

    /**
     * The city of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * The customer code of the customer service record.
     */
    #[Api('customer_code', optional: true)]
    public ?string $customerCode;

    /**
     * The name of the administrator of CSR.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The PIN of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $pin;

    /**
     * The state of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * The zip code of the customer service record.
     */
    #[Api('zip_code', optional: true)]
    public ?string $zipCode;

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
        ?string $addressLine1 = null,
        ?string $authorizedPersonName = null,
        ?string $billingPhoneNumber = null,
        ?string $city = null,
        ?string $customerCode = null,
        ?string $name = null,
        ?string $pin = null,
        ?string $state = null,
        ?string $zipCode = null,
    ): self {
        $obj = new self;

        null !== $accountNumber && $obj->accountNumber = $accountNumber;
        null !== $addressLine1 && $obj->addressLine1 = $addressLine1;
        null !== $authorizedPersonName && $obj->authorizedPersonName = $authorizedPersonName;
        null !== $billingPhoneNumber && $obj->billingPhoneNumber = $billingPhoneNumber;
        null !== $city && $obj->city = $city;
        null !== $customerCode && $obj->customerCode = $customerCode;
        null !== $name && $obj->name = $name;
        null !== $pin && $obj->pin = $pin;
        null !== $state && $obj->state = $state;
        null !== $zipCode && $obj->zipCode = $zipCode;

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
     * The first line of the address of the customer service record.
     */
    public function withAddressLine1(string $addressLine1): self
    {
        $obj = clone $this;
        $obj->addressLine1 = $addressLine1;

        return $obj;
    }

    /**
     * The name of the authorized person.
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
     * The city of the customer service record.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * The customer code of the customer service record.
     */
    public function withCustomerCode(string $customerCode): self
    {
        $obj = clone $this;
        $obj->customerCode = $customerCode;

        return $obj;
    }

    /**
     * The name of the administrator of CSR.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The PIN of the customer service record.
     */
    public function withPin(string $pin): self
    {
        $obj = clone $this;
        $obj->pin = $pin;

        return $obj;
    }

    /**
     * The state of the customer service record.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * The zip code of the customer service record.
     */
    public function withZipCode(string $zipCode): self
    {
        $obj = clone $this;
        $obj->zipCode = $zipCode;

        return $obj;
    }
}
