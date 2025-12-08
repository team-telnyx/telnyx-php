<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse;

use Telnyx\AuditEvents\AuditEventListResponse\Data\Change;
use Telnyx\AuditEvents\AuditEventListResponse\Data\ChangeMadeBy;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   alternate_resource_id?: string|null,
 *   change_made_by?: value-of<ChangeMadeBy>|null,
 *   change_type?: string|null,
 *   changes?: list<Change>|null,
 *   created_at?: \DateTimeInterface|null,
 *   organization_id?: string|null,
 *   record_type?: string|null,
 *   resource_id?: string|null,
 *   user_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the audit log entry.
     */
    #[Optional]
    public ?string $id;

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    #[Optional(nullable: true)]
    public ?string $alternate_resource_id;

    /**
     * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
     *
     * @var value-of<ChangeMadeBy>|null $change_made_by
     */
    #[Optional(enum: ChangeMadeBy::class)]
    public ?string $change_made_by;

    /**
     * The type of change that occurred.
     */
    #[Optional]
    public ?string $change_type;

    /**
     * Details of the changes made to the resource.
     *
     * @var list<Change>|null $changes
     */
    #[Optional(list: Change::class, nullable: true)]
    public ?array $changes;

    /**
     * ISO 8601 formatted date indicating when the change occurred.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Unique identifier for the organization that owns the resource.
     */
    #[Optional]
    public ?string $organization_id;

    /**
     * The type of the resource being audited.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Unique identifier for the resource that was changed.
     */
    #[Optional]
    public ?string $resource_id;

    /**
     * Unique identifier for the user who made the change.
     */
    #[Optional]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ChangeMadeBy|value-of<ChangeMadeBy> $change_made_by
     * @param list<Change|array{
     *   field?: string|null,
     *   from?: string|float|bool|list<mixed>|array<string,mixed>|null,
     *   to?: string|float|bool|list<mixed>|array<string,mixed>|null,
     * }>|null $changes
     */
    public static function with(
        ?string $id = null,
        ?string $alternate_resource_id = null,
        ChangeMadeBy|string|null $change_made_by = null,
        ?string $change_type = null,
        ?array $changes = null,
        ?\DateTimeInterface $created_at = null,
        ?string $organization_id = null,
        ?string $record_type = null,
        ?string $resource_id = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $alternate_resource_id && $obj['alternate_resource_id'] = $alternate_resource_id;
        null !== $change_made_by && $obj['change_made_by'] = $change_made_by;
        null !== $change_type && $obj['change_type'] = $change_type;
        null !== $changes && $obj['changes'] = $changes;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $organization_id && $obj['organization_id'] = $organization_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $resource_id && $obj['resource_id'] = $resource_id;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * Unique identifier for the audit log entry.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    public function withAlternateResourceID(?string $alternateResourceID): self
    {
        $obj = clone $this;
        $obj['alternate_resource_id'] = $alternateResourceID;

        return $obj;
    }

    /**
     * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
     *
     * @param ChangeMadeBy|value-of<ChangeMadeBy> $changeMadeBy
     */
    public function withChangeMadeBy(ChangeMadeBy|string $changeMadeBy): self
    {
        $obj = clone $this;
        $obj['change_made_by'] = $changeMadeBy;

        return $obj;
    }

    /**
     * The type of change that occurred.
     */
    public function withChangeType(string $changeType): self
    {
        $obj = clone $this;
        $obj['change_type'] = $changeType;

        return $obj;
    }

    /**
     * Details of the changes made to the resource.
     *
     * @param list<Change|array{
     *   field?: string|null,
     *   from?: string|float|bool|list<mixed>|array<string,mixed>|null,
     *   to?: string|float|bool|list<mixed>|array<string,mixed>|null,
     * }>|null $changes
     */
    public function withChanges(?array $changes): self
    {
        $obj = clone $this;
        $obj['changes'] = $changes;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the change occurred.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Unique identifier for the organization that owns the resource.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organization_id'] = $organizationID;

        return $obj;
    }

    /**
     * The type of the resource being audited.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for the resource that was changed.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj['resource_id'] = $resourceID;

        return $obj;
    }

    /**
     * Unique identifier for the user who made the change.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
