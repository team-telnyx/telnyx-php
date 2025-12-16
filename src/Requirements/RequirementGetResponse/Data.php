<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\Requirements\RequirementGetResponse\Data\Action;
use Telnyx\Requirements\RequirementGetResponse\Data\PhoneNumberType;

/**
 * @phpstan-import-type DocReqsRequirementTypeShape from \Telnyx\DocReqsRequirementType
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   action?: null|Action|value-of<Action>,
 *   countryCode?: string|null,
 *   createdAt?: string|null,
 *   locality?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   recordType?: string|null,
 *   requirementsTypes?: list<DocReqsRequirementTypeShape>|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the associated document.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates whether this requirement applies to branded_calling, ordering, porting, or both ordering and porting.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

    /**
     * The 2-character (ISO 3166-1 alpha-2) country code where this requirement applies.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The locality where this requirement applies.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @var list<DocReqsRequirementType>|null $requirementsTypes
     */
    #[Optional('requirements_types', list: DocReqsRequirementType::class)]
    public ?array $requirementsTypes;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|value-of<Action> $action
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<DocReqsRequirementTypeShape> $requirementsTypes
     */
    public static function with(
        ?string $id = null,
        Action|string|null $action = null,
        ?string $countryCode = null,
        ?string $createdAt = null,
        ?string $locality = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
        ?array $requirementsTypes = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $action && $self['action'] = $action;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $locality && $self['locality'] = $locality;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirementsTypes && $self['requirementsTypes'] = $requirementsTypes;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the associated document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Indicates whether this requirement applies to branded_calling, ordering, porting, or both ordering and porting.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * The 2-character (ISO 3166-1 alpha-2) country code where this requirement applies.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The locality where this requirement applies.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @param list<DocReqsRequirementTypeShape> $requirementsTypes
     */
    public function withRequirementsTypes(array $requirementsTypes): self
    {
        $self = clone $this;
        $self['requirementsTypes'] = $requirementsTypes;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
