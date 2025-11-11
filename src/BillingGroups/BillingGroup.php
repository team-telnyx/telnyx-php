<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\BillingGroups\BillingGroup\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingGroupShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   deleted_at?: \DateTimeInterface|null,
 *   name?: string|null,
 *   organization_id?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class BillingGroup implements BaseModel
{
    /** @use SdkModel<BillingGroupShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * ISO 8601 formatted date indicating when the resource was removed.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $deleted_at;

    /**
     * A user-specified name for the billing group.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the organization that owns the resource.
     */
    #[Api(optional: true)]
    public ?string $organization_id;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $deleted_at = null,
        ?string $name = null,
        ?string $organization_id = null,
        RecordType|string|null $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $deleted_at && $obj->deleted_at = $deleted_at;
        null !== $name && $obj->name = $name;
        null !== $organization_id && $obj->organization_id = $organization_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was removed.
     */
    public function withDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deleted_at = $deletedAt;

        return $obj;
    }

    /**
     * A user-specified name for the billing group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the organization that owns the resource.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organization_id = $organizationID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
