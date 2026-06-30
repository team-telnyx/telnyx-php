<?php

declare(strict_types=1);

namespace Telnyx\Dir\References\ReferenceSubmitResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\References\ReferenceSubmitResponse\Data\RecordType;
use Telnyx\Dir\References\ReferenceSubmitResponse\Data\RefType;

/**
 * A reference (business or financial) on a DIR, in the customer-facing shape. No internal identifiers are exposed.
 *
 * @phpstan-type DataShape = array{
 *   fullName: string,
 *   phoneE164: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   refType: RefType|value-of<RefType>,
 *   slot: int,
 *   timezone: string,
 *   email?: string|null,
 *   jobTitle?: string|null,
 *   organization?: string|null,
 *   relationshipToRegistrant?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Full name of the reference contact.
     */
    #[Required('full_name')]
    public string $fullName;

    /**
     * Reference phone number in E.164 format.
     */
    #[Required('phone_e164')]
    public string $phoneE164;

    /**
     * Always `dir_reference`.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether this is a business reference or the financial reference.
     *
     * @var value-of<RefType> $refType
     */
    #[Required('ref_type', enum: RefType::class)]
    public string $refType;

    /**
     * Position within the reference type. Business references occupy slots 0 and 1; the financial reference occupies slot 0.
     */
    #[Required]
    public int $slot;

    /**
     * IANA timezone id for the reference. Calls are only placed within the reference's local 8am-9pm window.
     */
    #[Required]
    public string $timezone;

    /**
     * Reference contact email address.
     */
    #[Optional(nullable: true)]
    public ?string $email;

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
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   fullName: ...,
     *   phoneE164: ...,
     *   recordType: ...,
     *   refType: ...,
     *   slot: ...,
     *   timezone: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withFullName(...)
     *   ->withPhoneE164(...)
     *   ->withRecordType(...)
     *   ->withRefType(...)
     *   ->withSlot(...)
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
     *
     * @param RecordType|value-of<RecordType> $recordType
     * @param RefType|value-of<RefType> $refType
     */
    public static function with(
        string $fullName,
        string $phoneE164,
        RecordType|string $recordType,
        RefType|string $refType,
        int $slot,
        string $timezone,
        ?string $email = null,
        ?string $jobTitle = null,
        ?string $organization = null,
        ?string $relationshipToRegistrant = null,
    ): self {
        $self = new self;

        $self['fullName'] = $fullName;
        $self['phoneE164'] = $phoneE164;
        $self['recordType'] = $recordType;
        $self['refType'] = $refType;
        $self['slot'] = $slot;
        $self['timezone'] = $timezone;

        null !== $email && $self['email'] = $email;
        null !== $jobTitle && $self['jobTitle'] = $jobTitle;
        null !== $organization && $self['organization'] = $organization;
        null !== $relationshipToRegistrant && $self['relationshipToRegistrant'] = $relationshipToRegistrant;

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
     * Reference phone number in E.164 format.
     */
    public function withPhoneE164(string $phoneE164): self
    {
        $self = clone $this;
        $self['phoneE164'] = $phoneE164;

        return $self;
    }

    /**
     * Always `dir_reference`.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Whether this is a business reference or the financial reference.
     *
     * @param RefType|value-of<RefType> $refType
     */
    public function withRefType(RefType|string $refType): self
    {
        $self = clone $this;
        $self['refType'] = $refType;

        return $self;
    }

    /**
     * Position within the reference type. Business references occupy slots 0 and 1; the financial reference occupies slot 0.
     */
    public function withSlot(int $slot): self
    {
        $self = clone $this;
        $self['slot'] = $slot;

        return $self;
    }

    /**
     * IANA timezone id for the reference. Calls are only placed within the reference's local 8am-9pm window.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * Reference contact email address.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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
