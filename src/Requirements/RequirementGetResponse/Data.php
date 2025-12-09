<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;
use Telnyx\Requirements\RequirementGetResponse\Data\Action;
use Telnyx\Requirements\RequirementGetResponse\Data\PhoneNumberType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   action?: value-of<Action>|null,
 *   countryCode?: string|null,
 *   createdAt?: string|null,
 *   locality?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   recordType?: string|null,
 *   requirementsTypes?: list<DocReqsRequirementType>|null,
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
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * }> $requirementsTypes
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

        null !== $id && $obj['id'] = $id;
        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $locality && $obj['locality'] = $locality;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirementsTypes && $obj['requirementsTypes'] = $requirementsTypes;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The locality where this requirement applies.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

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
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * }> $requirementsTypes
     */
    public function withRequirementsTypes(array $requirementsTypes): self
    {
        $obj = clone $this;
        $obj['requirementsTypes'] = $requirementsTypes;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
