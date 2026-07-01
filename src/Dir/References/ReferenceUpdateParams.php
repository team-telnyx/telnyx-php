<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\References\ReferenceUpdateParams\RefType;

/**
 * Partially update one reference, addressed by the DIR id plus the reference's type (business or financial) and slot.
 *
 * Cosmetic fields (full name, job title, organization, relationship, email) are always editable. The phone number and timezone may only be changed while a scheduled call has not yet been dialed; if a call is in progress or all attempts are complete, those fields are locked. Changing the timezone reschedules any pending call into the new local calling window.
 *
 * @see Telnyx\Services\Dir\ReferencesService::update()
 *
 * @phpstan-type ReferenceUpdateParamsShape = array{
 *   dirID: string,
 *   refType: RefType|value-of<RefType>,
 *   email?: string|null,
 *   fullName?: string|null,
 *   jobTitle?: string|null,
 *   organization?: string|null,
 *   phoneE164?: string|null,
 *   relationshipToRegistrant?: string|null,
 *   timezone?: string|null,
 * }
 */
final class ReferenceUpdateParams implements BaseModel
{
    /** @use SdkModel<ReferenceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $dirID;

    /** @var value-of<RefType> $refType */
    #[Required(enum: RefType::class)]
    public string $refType;

    /**
     * Reference contact email address.
     */
    #[Optional]
    public ?string $email;

    /**
     * Full name of the reference contact.
     */
    #[Optional('full_name')]
    public ?string $fullName;

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
     * Reference phone number in E.164 format.
     */
    #[Optional('phone_e164')]
    public ?string $phoneE164;

    /**
     * How the reference contact is related to the registering business.
     */
    #[Optional('relationship_to_registrant', nullable: true)]
    public ?string $relationshipToRegistrant;

    /**
     * IANA timezone id for the reference.
     */
    #[Optional]
    public ?string $timezone;

    /**
     * `new ReferenceUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReferenceUpdateParams::with(dirID: ..., refType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReferenceUpdateParams)->withDirID(...)->withRefType(...)
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
     * @param RefType|value-of<RefType> $refType
     */
    public static function with(
        string $dirID,
        RefType|string $refType,
        ?string $email = null,
        ?string $fullName = null,
        ?string $jobTitle = null,
        ?string $organization = null,
        ?string $phoneE164 = null,
        ?string $relationshipToRegistrant = null,
        ?string $timezone = null,
    ): self {
        $self = new self;

        $self['dirID'] = $dirID;
        $self['refType'] = $refType;

        null !== $email && $self['email'] = $email;
        null !== $fullName && $self['fullName'] = $fullName;
        null !== $jobTitle && $self['jobTitle'] = $jobTitle;
        null !== $organization && $self['organization'] = $organization;
        null !== $phoneE164 && $self['phoneE164'] = $phoneE164;
        null !== $relationshipToRegistrant && $self['relationshipToRegistrant'] = $relationshipToRegistrant;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    public function withDirID(string $dirID): self
    {
        $self = clone $this;
        $self['dirID'] = $dirID;

        return $self;
    }

    /**
     * @param RefType|value-of<RefType> $refType
     */
    public function withRefType(RefType|string $refType): self
    {
        $self = clone $this;
        $self['refType'] = $refType;

        return $self;
    }

    /**
     * Reference contact email address.
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
     * Reference phone number in E.164 format.
     */
    public function withPhoneE164(string $phoneE164): self
    {
        $self = clone $this;
        $self['phoneE164'] = $phoneE164;

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

    /**
     * IANA timezone id for the reference.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
