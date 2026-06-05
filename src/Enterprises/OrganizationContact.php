<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrganizationContactShape = array{
 *   email: string,
 *   firstName: string,
 *   jobTitle: string,
 *   lastName: string,
 *   phoneNumber: string,
 * }
 */
final class OrganizationContact implements BaseModel
{
    /** @use SdkModel<OrganizationContactShape> */
    use SdkModel;

    #[Required]
    public string $email;

    #[Required('first_name')]
    public string $firstName;

    #[Required('job_title')]
    public string $jobTitle;

    #[Required('last_name')]
    public string $lastName;

    /**
     * E.164 format with leading `+`.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new OrganizationContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrganizationContact::with(
     *   email: ..., firstName: ..., jobTitle: ..., lastName: ..., phoneNumber: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrganizationContact)
     *   ->withEmail(...)
     *   ->withFirstName(...)
     *   ->withJobTitle(...)
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
        string $jobTitle,
        string $lastName,
        string $phoneNumber,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['jobTitle'] = $jobTitle;
        $self['lastName'] = $lastName;
        $self['phoneNumber'] = $phoneNumber;

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

    public function withJobTitle(string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * E.164 format with leading `+`.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
