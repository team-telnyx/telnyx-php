<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseUpdateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
 *
 * @phpstan-type OrganizationContactShape = array{
 *   email: string,
 *   firstName: string,
 *   jobTitle: string,
 *   lastName: string,
 *   phone: string,
 * }
 */
final class OrganizationContact implements BaseModel
{
    /** @use SdkModel<OrganizationContactShape> */
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
     * Contact's job title (required).
     */
    #[Required('job_title')]
    public string $jobTitle;

    /**
     * Contact's last name.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * Contact's phone number in E.164 format.
     */
    #[Required]
    public string $phone;

    /**
     * `new OrganizationContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrganizationContact::with(
     *   email: ..., firstName: ..., jobTitle: ..., lastName: ..., phone: ...
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
     *   ->withPhone(...)
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
        string $phone,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['jobTitle'] = $jobTitle;
        $self['lastName'] = $lastName;
        $self['phone'] = $phone;

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
     * Contact's job title (required).
     */
    public function withJobTitle(string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

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
     * Contact's phone number in E.164 format.
     */
    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }
}
