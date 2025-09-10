<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type regulatory_requirement = array{
 *   id?: string|null,
 *   acceptanceCriteria?: AcceptanceCriteria|null,
 *   description?: string|null,
 *   example?: string|null,
 *   fieldType?: string|null,
 *   name?: string|null,
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
        ?AcceptanceCriteria $acceptanceCriteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $fieldType = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $acceptanceCriteria && $obj->acceptanceCriteria = $acceptanceCriteria;
        null !== $description && $obj->description = $description;
        null !== $example && $obj->example = $example;
        null !== $fieldType && $obj->fieldType = $fieldType;
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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
