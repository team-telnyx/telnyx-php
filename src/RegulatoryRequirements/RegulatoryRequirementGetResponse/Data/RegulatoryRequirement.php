<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement\AcceptanceCriteria;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
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
     * @param AcceptanceCriteria|array{
     *   acceptableCharacters?: string|null,
     *   acceptableValues?: list<string>|null,
     *   caseSensitive?: string|null,
     *   localityLimit?: string|null,
     *   maxLength?: string|null,
     *   minLength?: string|null,
     *   regex?: string|null,
     *   timeLimit?: string|null,
     * } $acceptanceCriteria
     */
    public static function with(
        ?string $id = null,
        AcceptanceCriteria|array|null $acceptanceCriteria = null,
        ?string $description = null,
        ?string $example = null,
        ?string $fieldType = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $acceptanceCriteria && $obj['acceptanceCriteria'] = $acceptanceCriteria;
        null !== $description && $obj['description'] = $description;
        null !== $example && $obj['example'] = $example;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $name && $obj['name'] = $name;

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
     *   acceptableCharacters?: string|null,
     *   acceptableValues?: list<string>|null,
     *   caseSensitive?: string|null,
     *   localityLimit?: string|null,
     *   maxLength?: string|null,
     *   minLength?: string|null,
     *   regex?: string|null,
     *   timeLimit?: string|null,
     * } $acceptanceCriteria
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria|array $acceptanceCriteria
    ): self {
        $obj = clone $this;
        $obj['acceptanceCriteria'] = $acceptanceCriteria;

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
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
