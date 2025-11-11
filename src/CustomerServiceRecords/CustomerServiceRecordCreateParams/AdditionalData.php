<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdditionalDataShape = array{
 *   account_number?: string|null,
 *   address_line_1?: string|null,
 *   authorized_person_name?: string|null,
 *   billing_phone_number?: string|null,
 *   city?: string|null,
 *   customer_code?: string|null,
 *   name?: string|null,
 *   pin?: string|null,
 *   state?: string|null,
 *   zip_code?: string|null,
 * }
 */
final class AdditionalData implements BaseModel
{
    /** @use SdkModel<AdditionalDataShape> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $account_number;

    /**
     * The first line of the address of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $address_line_1;

    /**
     * The name of the authorized person.
     */
    #[Api(optional: true)]
    public ?string $authorized_person_name;

    /**
     * The billing phone number of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $billing_phone_number;

    /**
     * The city of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * The customer code of the customer service record.
     */
    #[Api(optional: true)]
    public ?string $customer_code;

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
    #[Api(optional: true)]
    public ?string $zip_code;

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
        ?string $account_number = null,
        ?string $address_line_1 = null,
        ?string $authorized_person_name = null,
        ?string $billing_phone_number = null,
        ?string $city = null,
        ?string $customer_code = null,
        ?string $name = null,
        ?string $pin = null,
        ?string $state = null,
        ?string $zip_code = null,
    ): self {
        $obj = new self;

        null !== $account_number && $obj->account_number = $account_number;
        null !== $address_line_1 && $obj->address_line_1 = $address_line_1;
        null !== $authorized_person_name && $obj->authorized_person_name = $authorized_person_name;
        null !== $billing_phone_number && $obj->billing_phone_number = $billing_phone_number;
        null !== $city && $obj->city = $city;
        null !== $customer_code && $obj->customer_code = $customer_code;
        null !== $name && $obj->name = $name;
        null !== $pin && $obj->pin = $pin;
        null !== $state && $obj->state = $state;
        null !== $zip_code && $obj->zip_code = $zip_code;

        return $obj;
    }

    /**
     * The account number of the customer service record.
     */
    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj->account_number = $accountNumber;

        return $obj;
    }

    /**
     * The first line of the address of the customer service record.
     */
    public function withAddressLine1(string $addressLine1): self
    {
        $obj = clone $this;
        $obj->address_line_1 = $addressLine1;

        return $obj;
    }

    /**
     * The name of the authorized person.
     */
    public function withAuthorizedPersonName(string $authorizedPersonName): self
    {
        $obj = clone $this;
        $obj->authorized_person_name = $authorizedPersonName;

        return $obj;
    }

    /**
     * The billing phone number of the customer service record.
     */
    public function withBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $obj = clone $this;
        $obj->billing_phone_number = $billingPhoneNumber;

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
        $obj->customer_code = $customerCode;

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
        $obj->zip_code = $zipCode;

        return $obj;
    }
}
