<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;

/**
 * @phpstan-import-type AcceptanceCriteriaShape from \Telnyx\DocReqsRequirementType\AcceptanceCriteria
 *
 * @phpstan-type DocReqsRequirementTypeShape = array{
 *   id?: string|null,
 *   acceptanceCriteria?: null|AcceptanceCriteria|AcceptanceCriteriaShape,
 *   createdAt?: string|null,
 *   description?: string|null,
 *   example?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: string|null,
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
    #[Optional('acceptance_criteria')]
    public ?AcceptanceCriteria $acceptanceCriteria;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

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
    #[Optional('record_type')]
    public ?string $recordType;

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
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        AcceptanceCriteria|array|null $acceptanceCriteria = null,
        ?string $createdAt = null,
        ?string $description = null,
        ?string $example = null,
        ?string $name = null,
        ?string $recordType = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $acceptanceCriteria && $self['acceptanceCriteria'] = $acceptanceCriteria;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $example && $self['example'] = $example;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the associated document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies objective criteria for acceptance.
     *
     * @param AcceptanceCriteriaShape $acceptanceCriteria
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria|array $acceptanceCriteria
    ): self {
        $self = clone $this;
        $self['acceptanceCriteria'] = $acceptanceCriteria;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Describes the requirement type.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Provides one or more examples of acceptable documents.
     */
    public function withExample(string $example): self
    {
        $self = clone $this;
        $self['example'] = $example;

        return $self;
    }

    /**
     * A short descriptive name for this requirement_type.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Defines the type of this requirement type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
