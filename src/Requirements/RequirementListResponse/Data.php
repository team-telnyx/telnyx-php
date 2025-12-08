<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;
use Telnyx\Requirements\RequirementListResponse\Data\Action;
use Telnyx\Requirements\RequirementListResponse\Data\PhoneNumberType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   action?: value-of<Action>|null,
 *   country_code?: string|null,
 *   created_at?: string|null,
 *   locality?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   record_type?: string|null,
 *   requirements_types?: list<DocReqsRequirementType>|null,
 *   updated_at?: string|null,
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
    #[Optional]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * The locality where this requirement applies.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Optional(enum: PhoneNumberType::class)]
    public ?string $phone_number_type;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @var list<DocReqsRequirementType>|null $requirements_types
     */
    #[Optional(list: DocReqsRequirementType::class)]
    public ?array $requirements_types;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Optional]
    public ?string $updated_at;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   created_at?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * }> $requirements_types
     */
    public static function with(
        ?string $id = null,
        Action|string|null $action = null,
        ?string $country_code = null,
        ?string $created_at = null,
        ?string $locality = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $record_type = null,
        ?array $requirements_types = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $locality && $obj['locality'] = $locality;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirements_types && $obj['requirements_types'] = $requirements_types;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Lists the requirement types necessary to fulfill this requirement.
     *
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptance_criteria?: AcceptanceCriteria|null,
     *   created_at?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * }> $requirementsTypes
     */
    public function withRequirementsTypes(array $requirementsTypes): self
    {
        $obj = clone $this;
        $obj['requirements_types'] = $requirementsTypes;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
