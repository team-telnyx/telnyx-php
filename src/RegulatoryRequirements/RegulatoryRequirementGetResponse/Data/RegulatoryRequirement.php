<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   id?: string|null,
 *   acceptance_criteria?: AcceptanceCriteria|null,
 *   description?: string|null,
 *   example?: string|null,
 *   field_type?: string|null,
 *   name?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?AcceptanceCriteria $acceptance_criteria;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $example;

    #[Api(optional: true)]
    public ?string $field_type;

    #[Api(optional: true)]
    public ?string $name;

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
        ?AcceptanceCriteria $acceptance_criteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $field_type = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $acceptance_criteria && $obj->acceptance_criteria = $acceptance_criteria;
        null !== $description && $obj->description = $description;
        null !== $example && $obj->example = $example;
        null !== $field_type && $obj->field_type = $field_type;
        null !== $name && $obj->name = $name;

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
        $obj->acceptance_criteria = $acceptanceCriteria;

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
        $obj->field_type = $fieldType;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
