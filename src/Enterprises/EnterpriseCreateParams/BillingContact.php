<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingContactShape = array{
 *   email: string, firstName: string, lastName: string, phoneNumber: string
 * }
 */
final class BillingContact implements BaseModel
{
    /** @use SdkModel<BillingContactShape> */
    use SdkModel;

    /**
     * Contact's email address.
     */
    #[Required]
    public string $email;

    /**
     * Contact's first name.
     */
    #[Required('first_name')]
    public string $firstName;

    /**
     * Contact's last name.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * Contact's phone number (10-15 digits).
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new BillingContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BillingContact::with(
     *   email: ..., firstName: ..., lastName: ..., phoneNumber: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BillingContact)
     *   ->withEmail(...)
     *   ->withFirstName(...)
     *   ->withLastName(...)
     *   ->withPhoneNumber(...)
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
        string $email,
        string $firstName,
        string $lastName,
        string $phoneNumber
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Contact's email address.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Contact's first name.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Contact's last name.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Contact's phone number (10-15 digits).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
