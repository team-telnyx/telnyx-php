<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;

/**
 * @phpstan-type DocReqsRequirementTypeShape = array{
 *   id?: string|null,
 *   acceptance_criteria?: AcceptanceCriteria|null,
 *   created_at?: string|null,
 *   description?: string|null,
 *   example?: string|null,
 *   name?: string|null,
 *   record_type?: string|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
 * }
 */
final class DocReqsRequirementType implements BaseModel
{
    /** @use SdkModel<DocReqsRequirementTypeShape> */
    use SdkModel;

    /**
     * Identifies the associated document.
     */
    #[Optional]
    public ?string $id;

    /**
     * Specifies objective criteria for acceptance.
     */
    #[Optional]
    public ?AcceptanceCriteria $acceptance_criteria;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Describes the requirement type.
     */
    #[Optional]
    public ?string $description;

    /**
     * Provides one or more examples of acceptable documents.
     */
    #[Optional]
    public ?string $example;

    /**
     * A short descriptive name for this requirement_type.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Defines the type of this requirement type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

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
     * @param AcceptanceCriteria|array{
     *   acceptable_characters?: string|null,
     *   acceptable_values?: list<string>|null,
     *   locality_limit?: string|null,
     *   max_length?: int|null,
     *   min_length?: int|null,
     *   time_limit?: string|null,
     * } $acceptance_criteria
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        AcceptanceCriteria|array|null $acceptance_criteria = null,
        ?string $created_at = null,
        ?string $description = null,
        ?string $example = null,
        ?string $name = null,
        ?string $record_type = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $acceptance_criteria && $obj['acceptance_criteria'] = $acceptance_criteria;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $description && $obj['description'] = $description;
        null !== $example && $obj['example'] = $example;
        null !== $name && $obj['name'] = $name;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $type && $obj['type'] = $type;
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
     * Specifies objective criteria for acceptance.
     *
     * @param AcceptanceCriteria|array{
     *   acceptable_characters?: string|null,
     *   acceptable_values?: list<string>|null,
     *   locality_limit?: string|null,
     *   max_length?: int|null,
     *   min_length?: int|null,
     *   time_limit?: string|null,
     * } $acceptanceCriteria
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria|array $acceptanceCriteria
    ): self {
        $obj = clone $this;
        $obj['acceptance_criteria'] = $acceptanceCriteria;

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
     * Describes the requirement type.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Provides one or more examples of acceptable documents.
     */
    public function withExample(string $example): self
    {
        $obj = clone $this;
        $obj['example'] = $example;

        return $obj;
    }

    /**
     * A short descriptive name for this requirement_type.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
     * Defines the type of this requirement type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
