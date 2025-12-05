<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroup;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement\Status;

/**
 * @phpstan-type RegulatoryRequirementShape = array{
 *   created_at?: \DateTimeInterface|null,
 *   expires_at?: \DateTimeInterface|null,
 *   field_type?: string|null,
 *   field_value?: string|null,
 *   requirement_id?: string|null,
 *   status?: value-of<\Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement\Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class RegulatoryRequirement implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expires_at;

    #[Api(optional: true)]
    public ?string $field_type;

    #[Api(optional: true)]
    public ?string $field_value;

    #[Api(optional: true)]
    public ?string $requirement_id;

    /**
     * @var value-of<Status>|null $status
     */
    #[Api(
        enum: Status::class,
        optional: true,
    )]
    public ?string $status;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $expires_at = null,
        ?string $field_type = null,
        ?string $field_value = null,
        ?string $requirement_id = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $field_type && $obj['field_type'] = $field_type;
        null !== $field_value && $obj['field_value'] = $field_value;
        null !== $requirement_id && $obj['requirement_id'] = $requirement_id;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['field_type'] = $fieldType;

        return $obj;
    }

    public function withFieldValue(string $fieldValue): self
    {
        $obj = clone $this;
        $obj['field_value'] = $fieldValue;

        return $obj;
    }

    public function withRequirementID(string $requirementID): self
    {
        $obj = clone $this;
        $obj['requirement_id'] = $requirementID;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
