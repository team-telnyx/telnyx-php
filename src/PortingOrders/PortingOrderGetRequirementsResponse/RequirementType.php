<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Identifies the requirement type that meets this requirement.
 *
 * @phpstan-type RequirementTypeShape = array{
 *   id?: string|null,
 *   acceptanceCriteria?: array<string,mixed>|null,
 *   description?: string|null,
 *   example?: string|null,
 *   name?: string|null,
 *   type?: string|null,
 * }
 */
final class RequirementType implements BaseModel
{
    /** @use SdkModel<RequirementTypeShape> */
    use SdkModel;

    /**
     * Identifies the requirement type.
     */
    #[Optional]
    public ?string $id;

    /**
     * The acceptance criteria for the requirement type.
     *
     * @var array<string,mixed>|null $acceptanceCriteria
     */
    #[Optional('acceptance_criteria', map: 'mixed')]
    public ?array $acceptanceCriteria;

    /**
     * A description of the requirement type.
     */
    #[Optional]
    public ?string $description;

    /**
     * An example of the requirement type.
     */
    #[Optional]
    public ?string $example;

    /**
     * The name of the requirement type.
     */
    #[Optional]
    public ?string $name;

    /**
     * The type of the requirement type.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $acceptanceCriteria
     */
    public static function with(
        ?string $id = null,
        ?array $acceptanceCriteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $name = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $acceptanceCriteria && $self['acceptanceCriteria'] = $acceptanceCriteria;
        null !== $description && $self['description'] = $description;
        null !== $example && $self['example'] = $example;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Identifies the requirement type.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The acceptance criteria for the requirement type.
     *
     * @param array<string,mixed> $acceptanceCriteria
     */
    public function withAcceptanceCriteria(array $acceptanceCriteria): self
    {
        $self = clone $this;
        $self['acceptanceCriteria'] = $acceptanceCriteria;

        return $self;
    }

    /**
     * A description of the requirement type.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * An example of the requirement type.
     */
    public function withExample(string $example): self
    {
        $self = clone $this;
        $self['example'] = $example;

        return $self;
    }

    /**
     * The name of the requirement type.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The type of the requirement type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
