<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The admin of the customer service record.
 *
 * @phpstan-type AdminShape = array{
 *   accountNumber?: string|null,
 *   authorizedPersonName?: string|null,
 *   billingPhoneNumber?: string|null,
 *   name?: string|null,
 * }
 */
final class Admin implements BaseModel
{
    /** @use SdkModel<AdminShape> */
    use SdkModel;

    /**
     * The account number of the customer service record.
     */
    #[Optional('account_number')]
    public ?string $accountNumber;

    /**
     * The authorized person name of the customer service record.
     */
    #[Optional('authorized_person_name')]
    public ?string $authorizedPersonName;

    /**
     * The billing phone number of the customer service record.
     */
    #[Optional('billing_phone_number')]
    public ?string $billingPhoneNumber;

    /**
     * The name of the customer service record.
     */
    #[Optional]
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
        $self = new self;

        null !== $accountNumber && $self['accountNumber'] = $accountNumber;
        null !== $authorizedPersonName && $self['authorizedPersonName'] = $authorizedPersonName;
        null !== $billingPhoneNumber && $self['billingPhoneNumber'] = $billingPhoneNumber;
        null !== $name && $self['name'] = $name;

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
     * The authorized person name of the customer service record.
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
     * The name of the customer service record.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
