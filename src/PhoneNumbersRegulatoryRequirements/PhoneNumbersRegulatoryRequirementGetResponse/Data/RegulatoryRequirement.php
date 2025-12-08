<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   id?: string|null,
 *   acceptance_criteria?: AcceptanceCriteria|null,
 *   description?: string|null,
 *   example?: string|null,
 *   field_type?: string|null,
 *   label?: string|null,
 *   record_type?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?AcceptanceCriteria $acceptance_criteria;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $example;

    #[Optional]
    public ?string $field_type;

    #[Optional]
    public ?string $label;

    #[Optional]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AcceptanceCriteria|array{
     *   field_type?: string|null,
     *   field_value?: string|null,
     *   locality_limit?: string|null,
     * } $acceptance_criteria
     */
    public static function with(
        ?string $id = null,
        AcceptanceCriteria|array|null $acceptance_criteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $field_type = null,
        ?string $label = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $acceptance_criteria && $obj['acceptance_criteria'] = $acceptance_criteria;
        null !== $description && $obj['description'] = $description;
        null !== $example && $obj['example'] = $example;
        null !== $field_type && $obj['field_type'] = $field_type;
        null !== $label && $obj['label'] = $label;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param AcceptanceCriteria|array{
     *   field_type?: string|null,
     *   field_value?: string|null,
     *   locality_limit?: string|null,
     * } $acceptanceCriteria
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria|array $acceptanceCriteria
    ): self {
        $obj = clone $this;
        $obj['acceptance_criteria'] = $acceptanceCriteria;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withExample(string $example): self
    {
        $obj = clone $this;
        $obj['example'] = $example;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['field_type'] = $fieldType;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
