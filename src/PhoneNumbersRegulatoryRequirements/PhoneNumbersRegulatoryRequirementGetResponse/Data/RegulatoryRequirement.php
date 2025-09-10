<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type regulatory_requirement = array{
 *   id?: string|null,
 *   acceptanceCriteria?: AcceptanceCriteria|null,
 *   description?: string|null,
 *   example?: string|null,
 *   fieldType?: string|null,
 *   label?: string|null,
 *   recordType?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<regulatory_requirement> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api('acceptance_criteria', optional: true)]
    public ?AcceptanceCriteria $acceptanceCriteria;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $example;

    #[Api('field_type', optional: true)]
    public ?string $fieldType;

    #[Api(optional: true)]
    public ?string $label;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
        ?string $id = null,
        ?AcceptanceCriteria $acceptanceCriteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $fieldType = null,
        ?string $label = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $acceptanceCriteria && $obj->acceptanceCriteria = $acceptanceCriteria;
        null !== $description && $obj->description = $description;
        null !== $example && $obj->example = $example;
        null !== $fieldType && $obj->fieldType = $fieldType;
        null !== $label && $obj->label = $label;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAcceptanceCriteria(
        AcceptanceCriteria $acceptanceCriteria
    ): self {
        $obj = clone $this;
        $obj->acceptanceCriteria = $acceptanceCriteria;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withExample(string $example): self
    {
        $obj = clone $this;
        $obj->example = $example;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
