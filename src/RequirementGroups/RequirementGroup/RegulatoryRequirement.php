<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement\Status;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   fieldType?: string|null,
 *   fieldValue?: string|null,
 *   requirementID?: string|null,
 *   status?: value-of<\Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement\Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    #[Optional('field_type')]
    public ?string $fieldType;

    #[Optional('field_value')]
    public ?string $fieldValue;

    #[Optional('requirement_id')]
    public ?string $requirementID;

    /**
     * @var value-of<Status>|null $status
     */
    #[Optional(
        enum: Status::class,
    )]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $fieldType = null,
        ?string $fieldValue = null,
        ?string $requirementID = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $fieldValue && $obj['fieldValue'] = $fieldValue;
        null !== $requirementID && $obj['requirementID'] = $requirementID;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['fieldValue'] = $fieldValue;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj['requirementID'] = $requirementID;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
