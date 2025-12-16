<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-import-type AcceptanceCriteriaShape from \Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria
 *
 * @phpstan-type RegulatoryRequirementShape = array{
 *   id?: string|null,
 *   acceptanceCriteria?: null|AcceptanceCriteria|AcceptanceCriteriaShape,
 *   description?: string|null,
 *   example?: string|null,
 *   fieldType?: string|null,
 *   name?: string|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('acceptance_criteria')]
    public ?AcceptanceCriteria $acceptanceCriteria;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $example;

    #[Optional('field_type')]
    public ?string $fieldType;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AcceptanceCriteriaShape $acceptanceCriteria
     */
    public static function with(
        ?string $id = null,
        AcceptanceCriteria|array|null $acceptanceCriteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $fieldType = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $acceptanceCriteria && $self['acceptanceCriteria'] = $acceptanceCriteria;
        null !== $description && $self['description'] = $description;
        null !== $example && $self['example'] = $example;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param AcceptanceCriteriaShape $acceptanceCriteria
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria|array $acceptanceCriteria
    ): self {
        $self = clone $this;
        $self['acceptanceCriteria'] = $acceptanceCriteria;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withExample(string $example): self
    {
        $self = clone $this;
        $self['example'] = $example;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
