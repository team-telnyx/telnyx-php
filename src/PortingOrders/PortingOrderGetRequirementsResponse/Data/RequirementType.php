<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderGetRequirementsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Identifies the requirement type that meets this requirement.
 *
 * @phpstan-type RequirementTypeShape = array{
 *   id?: string|null,
 *   acceptance_criteria?: array<string,mixed>|null,
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
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The acceptance criteria for the requirement type.
     *
     * @var array<string,mixed>|null $acceptance_criteria
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $acceptance_criteria;

    /**
     * A description of the requirement type.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * An example of the requirement type.
     */
    #[Api(optional: true)]
    public ?string $example;

    /**
     * The name of the requirement type.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The type of the requirement type.
     */
    #[Api(optional: true)]
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
     * @param array<string,mixed> $acceptance_criteria
     */
    public static function with(
        ?string $id = null,
        ?array $acceptance_criteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $name = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $acceptance_criteria && $obj['acceptance_criteria'] = $acceptance_criteria;
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
        $obj['acceptance_criteria'] = $acceptanceCriteria;

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
