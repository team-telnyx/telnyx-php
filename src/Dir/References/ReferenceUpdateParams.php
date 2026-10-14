<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
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
     * The reference's email address. We email them scheduling and dial-in instructions before we call, so use an address they check.
     */
    #[Optional]
    public ?string $email;

    /**
     * The full name of the person we should contact as your reference.
     */
    #[Optional('full_name')]
    public ?string $fullName;

    /**
     * The reference contact's job title, for example CFO or Owner.
     */
    #[Optional('job_title', nullable: true)]
    public ?string $jobTitle;

    /**
     * The name of the organization the reference contact works for.
     */
    #[Optional(nullable: true)]
    public ?string $organization;

    /**
     * The reference's phone number in E.164 format, for example +14155550123. We call this number during their local business hours.
     */
    #[Optional('phone_e164')]
    public ?string $phoneE164;

    /**
     * How the reference contact is related to the registering business.
     */
    #[Optional('relationship_to_registrant', nullable: true)]
    public ?string $relationshipToRegistrant;

    /**
     * The reference's IANA time zone, for example America/New_York. We only call during their local 8am to 9pm hours, which is why we need it.
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
        string|Omitted|null $jobTitle = Omitted::VALUE,
        string|Omitted|null $organization = Omitted::VALUE,
        string|Omitted|null $relationshipToRegistrant = Omitted::VALUE,
        ?string $email = null,
        ?string $fullName = null,
        ?string $phoneE164 = null,
        ?string $timezone = null,
    ): self {
        $self = new self;

        $self['dirID'] = $dirID;
        $self['refType'] = $refType;

        null !== $email && $self['email'] = $email;
        null !== $fullName && $self['fullName'] = $fullName;
        Omitted::VALUE !== $jobTitle && $self['jobTitle'] = $jobTitle;
        Omitted::VALUE !== $organization && $self['organization'] = $organization;
        null !== $phoneE164 && $self['phoneE164'] = $phoneE164;
        Omitted::VALUE !== $relationshipToRegistrant && $self['relationshipToRegistrant'] = $relationshipToRegistrant;
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
     * The reference's email address. We email them scheduling and dial-in instructions before we call, so use an address they check.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The full name of the person we should contact as your reference.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * The reference contact's job title, for example CFO or Owner.
     */
    public function withJobTitle(?string $jobTitle): self
    {
        $self = clone $this;
        $self['jobTitle'] = $jobTitle;

        return $self;
    }

    /**
     * The name of the organization the reference contact works for.
     */
    public function withOrganization(?string $organization): self
    {
        $self = clone $this;
        $self['organization'] = $organization;

        return $self;
    }

    /**
     * The reference's phone number in E.164 format, for example +14155550123. We call this number during their local business hours.
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
     * The reference's IANA time zone, for example America/New_York. We only call during their local 8am to 9pm hours, which is why we need it.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
