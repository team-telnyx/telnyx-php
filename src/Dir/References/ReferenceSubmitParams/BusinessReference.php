<?php

declare(strict_types=1);

namespace Telnyx\Dir\References\ReferenceSubmitParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
 *
 * @phpstan-type BusinessReferenceShape = array{
 *   email: string,
 *   fullName: string,
 *   phoneE164: string,
 *   timezone: string,
 *   jobTitle?: string|null,
 *   organization?: string|null,
 *   relationshipToRegistrant?: string|null,
 * }
 */
final class BusinessReference implements BaseModel
{
    /** @use SdkModel<BusinessReferenceShape> */
    use SdkModel;

    /**
     * Reference contact email address. Required: the reference is emailed scheduling and dial-in notices.
     */
    #[Required]
    public string $email;

    /**
     * Full name of the reference contact.
     */
    #[Required('full_name')]
    public string $fullName;

    /**
     * Reference phone number in E.164 format, e.g. +14155550123.
     */
    #[Required('phone_e164')]
    public string $phoneE164;

    /**
     * IANA timezone id for the reference (e.g. America/New_York). Required: calls are only placed within the reference's local 8am-9pm window.
     */
    #[Required]
    public string $timezone;

    /**
     * Job title of the reference contact.
     */
    #[Optional('job_title', nullable: true)]
    public ?string $jobTitle;

    /**
     * Organization the reference contact belongs to.
     */
    #[Optional(nullable: true)]
    public ?string $organization;

    /**
     * How the reference contact is related to the registering business.
     */
    #[Optional('relationship_to_registrant', nullable: true)]
    public ?string $relationshipToRegistrant;

    /**
     * `new BusinessReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BusinessReference::with(
     *   email: ..., fullName: ..., phoneE164: ..., timezone: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BusinessReference)
     *   ->withEmail(...)
     *   ->withFullName(...)
     *   ->withPhoneE164(...)
     *   ->withTimezone(...)
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
        string $fullName,
        string $phoneE164,
        string $timezone,
        ?string $jobTitle = null,
        ?string $organization = null,
        ?string $relationshipToRegistrant = null,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['fullName'] = $fullName;
        $self['phoneE164'] = $phoneE164;
        $self['timezone'] = $timezone;

        null !== $jobTitle && $self['jobTitle'] = $jobTitle;
        null !== $organization && $self['organization'] = $organization;
        null !== $relationshipToRegistrant && $self['relationshipToRegistrant'] = $relationshipToRegistrant;

        return $self;
    }

    /**
     * Reference contact email address. Required: the reference is emailed scheduling and dial-in notices.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Full name of the reference contact.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * Reference phone number in E.164 format, e.g. +14155550123.
     */
    public function withPhoneE164(string $phoneE164): self
    {
        $self = clone $this;
        $self['phoneE164'] = $phoneE164;

        return $self;
    }

    /**
     * IANA timezone id for the reference (e.g. America/New_York). Required: calls are only placed within the reference's local 8am-9pm window.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Job title of the reference contact.
     */
    public function withJobTitle(?string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

        return $self;
    }

    /**
     * Organization the reference contact belongs to.
     */
    public function withOrganization(?string $organization): self
    {
        $self = clone $this;
        $self['organization'] = $organization;

        return $self;
    }

    /**
     * How the reference contact is related to the registering business.
     */
    public function withRelationshipToRegistrant(
        ?string $relationshipToRegistrant
    ): self {
        $self = clone $this;
        $self['relationshipToRegistrant'] = $relationshipToRegistrant;

        return $self;
    }
}
