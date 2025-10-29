<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\Requirements\RequirementListResponse\Data\Action;
use Telnyx\Requirements\RequirementListResponse\Data\PhoneNumberType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   action?: value-of<Action>,
 *   countryCode?: string,
 *   createdAt?: string,
 *   locality?: string,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   recordType?: string,
 *   requirementsTypes?: list<DocReqsRequirementType>,
 *   updatedAt?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the associated document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicates whether this requirement applies to branded_calling, ordering, porting, or both ordering and porting.
     *
     * @var value-of<Action>|null $action
     */
    #[Api(enum: Action::class, optional: true)]
    public ?string $action;

    /**
     * The 2-character (ISO 3166-1 alpha-2) country code where this requirement applies.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The locality where this requirement applies.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @var list<DocReqsRequirementType>|null $requirementsTypes
     */
    #[Api(
        'requirements_types',
        list: DocReqsRequirementType::class,
        optional: true
    )]
    public ?array $requirementsTypes;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param list<DocReqsRequirementType> $requirementsTypes
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $locality && $obj->locality = $locality;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirementsTypes && $obj->requirementsTypes = $requirementsTypes;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Indicates whether this requirement applies to branded_calling, ordering, porting, or both ordering and porting.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * The 2-character (ISO 3166-1 alpha-2) country code where this requirement applies.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The locality where this requirement applies.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @param list<DocReqsRequirementType> $requirementsTypes
     */
    public function withRequirementsTypes(array $requirementsTypes): self
    {
        $obj = clone $this;
        $obj->requirementsTypes = $requirementsTypes;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
