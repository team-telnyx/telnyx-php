<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;

/**
 * @phpstan-type doc_reqs_requirement_type = array{
 *   id?: string|null,
 *   acceptanceCriteria?: AcceptanceCriteria|null,
 *   createdAt?: string|null,
 *   description?: string|null,
 *   example?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: string|null,
 * }
 */
final class DocReqsRequirementType implements BaseModel
{
    /** @use SdkModel<doc_reqs_requirement_type> */
    use SdkModel;

    /**
     * Identifies the associated document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies objective criteria for acceptance.
     */
    #[Api('acceptance_criteria', optional: true)]
    public ?AcceptanceCriteria $acceptanceCriteria;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Describes the requirement type.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Provides one or more examples of acceptable documents.
     */
    #[Api(optional: true)]
    public ?string $example;

    /**
     * A short descriptive name for this requirement_type.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Defines the type of this requirement type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?AcceptanceCriteria $acceptanceCriteria = null,
        ?string $createdAt = null,
        ?string $description = null,
        ?string $example = null,
        ?string $name = null,
        ?string $recordType = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $acceptanceCriteria && $obj->acceptanceCriteria = $acceptanceCriteria;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $description && $obj->description = $description;
        null !== $example && $obj->example = $example;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies objective criteria for acceptance.
     */
    public function withAcceptanceCriteria(
        AcceptanceCriteria $acceptanceCriteria
    ): self {
        $obj = clone $this;
        $obj->acceptanceCriteria = $acceptanceCriteria;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Describes the requirement type.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Provides one or more examples of acceptable documents.
     */
    public function withExample(string $example): self
    {
        $obj = clone $this;
        $obj->example = $example;

        return $obj;
    }

    /**
     * A short descriptive name for this requirement_type.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
