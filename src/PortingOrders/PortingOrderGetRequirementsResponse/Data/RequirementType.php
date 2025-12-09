<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data;

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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $acceptanceCriteria && $obj['acceptanceCriteria'] = $acceptanceCriteria;
        null !== $description && $obj['description'] = $description;
        null !== $example && $obj['example'] = $example;
        null !== $name && $obj['name'] = $name;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Identifies the requirement type.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The acceptance criteria for the requirement type.
     *
     * @param array<string,mixed> $acceptanceCriteria
     */
    public function withAcceptanceCriteria(array $acceptanceCriteria): self
    {
        $obj = clone $this;
        $obj['acceptanceCriteria'] = $acceptanceCriteria;

        return $obj;
    }

    /**
     * A description of the requirement type.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * An example of the requirement type.
     */
    public function withExample(string $example): self
    {
        $obj = clone $this;
        $obj['example'] = $example;

        return $obj;
    }

    /**
     * The name of the requirement type.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The type of the requirement type.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
