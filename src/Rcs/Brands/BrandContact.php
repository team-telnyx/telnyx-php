<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Brands\BrandContact\ContactType;

/**
 * @phpstan-type BrandContactShape = array{
 *   contactType: ContactType|value-of<ContactType>,
 *   email: string,
 *   firstName: string,
 *   lastName: string,
 *   phoneNumber: string,
 *   title?: string|null,
 * }
 */
final class BrandContact implements BaseModel
{
    /** @use SdkModel<BrandContactShape> */
    use SdkModel;

    /** @var value-of<ContactType> $contactType */
    #[Required('contact_type', enum: ContactType::class)]
    public string $contactType;

    #[Required]
    public string $email;

    #[Required('first_name')]
    public string $firstName;

    #[Required('last_name')]
    public string $lastName;

    #[Required('phone_number')]
    public string $phoneNumber;

    #[Optional(nullable: true)]
    public ?string $title;

    /**
     * `new BrandContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandContact::with(
     *   contactType: ..., email: ..., firstName: ..., lastName: ..., phoneNumber: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandContact)
     *   ->withContactType(...)
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
     *
     * @param ContactType|value-of<ContactType> $contactType
     */
    public static function with(
        ContactType|string $contactType,
        string $email,
        string $firstName,
        string $lastName,
        string $phoneNumber,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['contactType'] = $contactType;
        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;
        $self['phoneNumber'] = $phoneNumber;

        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * @param ContactType|value-of<ContactType> $contactType
     */
    public function withContactType(ContactType|string $contactType): self
    {
        $self = clone $this;
        $self['contactType'] = $contactType;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withTitle(?string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
