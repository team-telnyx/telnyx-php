<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AdditionalDataShape = array{
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
    /** @use SdkModel<AdditionalDataShape> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Optional('account_number')]
    public ?string $accountNumber;

    /**
     * The first line of the address of the customer service record.
     */
    #[Optional('address_line_1')]
    public ?string $addressLine1;

    /**
     * The name of the authorized person.
     */
    #[Optional('authorized_person_name')]
    public ?string $authorizedPersonName;

    /**
     * The billing phone number of the customer service record.
     */
    #[Optional('billing_phone_number')]
    public ?string $billingPhoneNumber;

    /**
     * The city of the customer service record.
     */
    #[Optional]
    public ?string $city;

    /**
     * The customer code of the customer service record.
     */
    #[Optional('customer_code')]
    public ?string $customerCode;

    /**
     * The name of the administrator of CSR.
     */
    #[Optional]
    public ?string $name;

    /**
     * The PIN of the customer service record.
     */
    #[Optional]
    public ?string $pin;

    /**
     * The state of the customer service record.
     */
    #[Optional]
    public ?string $state;

    /**
     * The zip code of the customer service record.
     */
    #[Optional('zip_code')]
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
        $self = new self;

        null !== $accountNumber && $self['accountNumber'] = $accountNumber;
        null !== $addressLine1 && $self['addressLine1'] = $addressLine1;
        null !== $authorizedPersonName && $self['authorizedPersonName'] = $authorizedPersonName;
        null !== $billingPhoneNumber && $self['billingPhoneNumber'] = $billingPhoneNumber;
        null !== $city && $self['city'] = $city;
        null !== $customerCode && $self['customerCode'] = $customerCode;
        null !== $name && $self['name'] = $name;
        null !== $pin && $self['pin'] = $pin;
        null !== $state && $self['state'] = $state;
        null !== $zipCode && $self['zipCode'] = $zipCode;

        return $self;
    }

    /**
     * The account number of the customer service record.
     */
    public function withAccountNumber(string $accountNumber): self
    {
        $self = clone $this;
        $self['accountNumber'] = $accountNumber;

        return $self;
    }

    /**
     * The first line of the address of the customer service record.
     */
    public function withAddressLine1(string $addressLine1): self
    {
        $self = clone $this;
        $self['addressLine1'] = $addressLine1;

        return $self;
    }

    /**
     * The name of the authorized person.
     */
    public function withAuthorizedPersonName(string $authorizedPersonName): self
    {
        $self = clone $this;
        $self['authorizedPersonName'] = $authorizedPersonName;

        return $self;
    }

    /**
     * The billing phone number of the customer service record.
     */
    public function withBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $self = clone $this;
        $self['billingPhoneNumber'] = $billingPhoneNumber;

        return $self;
    }

    /**
     * The city of the customer service record.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * The customer code of the customer service record.
     */
    public function withCustomerCode(string $customerCode): self
    {
        $self = clone $this;
        $self['customerCode'] = $customerCode;

        return $self;
    }

    /**
     * The name of the administrator of CSR.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The PIN of the customer service record.
     */
    public function withPin(string $pin): self
    {
        $self = clone $this;
        $self['pin'] = $pin;

        return $self;
    }

    /**
     * The state of the customer service record.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The zip code of the customer service record.
     */
    public function withZipCode(string $zipCode): self
    {
        $self = clone $this;
        $self['zipCode'] = $zipCode;

        return $self;
    }
}
