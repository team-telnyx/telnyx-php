<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse;

use Telnyx\AuditEvents\AuditEventListResponse\Data\Change;
use Telnyx\AuditEvents\AuditEventListResponse\Data\ChangeMadeBy;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id?: string|null,
 *   alternateResourceID?: string|null,
 *   changeMadeBy?: value-of<ChangeMadeBy>|null,
 *   changeType?: string|null,
 *   changes?: list<Change>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   organizationID?: string|null,
 *   recordType?: string|null,
 *   resourceID?: string|null,
 *   userID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Unique identifier for the audit log entry.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    #[Api('alternate_resource_id', nullable: true, optional: true)]
    public ?string $alternateResourceID;

    /**
     * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
     *
     * @var value-of<ChangeMadeBy>|null $changeMadeBy
     */
    #[Api('change_made_by', enum: ChangeMadeBy::class, optional: true)]
    public ?string $changeMadeBy;

    /**
     * The type of change that occurred.
     */
    #[Api('change_type', optional: true)]
    public ?string $changeType;

    /**
     * Details of the changes made to the resource.
     *
     * @var list<Change>|null $changes
     */
    #[Api(list: Change::class, nullable: true, optional: true)]
    public ?array $changes;

    /**
     * ISO 8601 formatted date indicating when the change occurred.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Unique identifier for the organization that owns the resource.
     */
    #[Api('organization_id', optional: true)]
    public ?string $organizationID;

    /**
     * The type of the resource being audited.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Unique identifier for the resource that was changed.
     */
    #[Api('resource_id', optional: true)]
    public ?string $resourceID;

    /**
     * Unique identifier for the user who made the change.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ChangeMadeBy|value-of<ChangeMadeBy> $changeMadeBy
     * @param list<Change>|null $changes
     */
    public static function with(
        ?string $id = null,
        ?string $alternateResourceID = null,
        ChangeMadeBy|string|null $changeMadeBy = null,
        ?string $changeType = null,
        ?array $changes = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $organizationID = null,
        ?string $recordType = null,
        ?string $resourceID = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $alternateResourceID && $obj->alternateResourceID = $alternateResourceID;
        null !== $changeMadeBy && $obj->changeMadeBy = $changeMadeBy instanceof ChangeMadeBy ? $changeMadeBy->value : $changeMadeBy;
        null !== $changeType && $obj->changeType = $changeType;
        null !== $changes && $obj->changes = $changes;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $organizationID && $obj->organizationID = $organizationID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $resourceID && $obj->resourceID = $resourceID;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    /**
     * Unique identifier for the audit log entry.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    public function withAlternateResourceID(?string $alternateResourceID): self
    {
        $obj = clone $this;
        $obj->alternateResourceID = $alternateResourceID;

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
        $obj->changeMadeBy = $changeMadeBy instanceof ChangeMadeBy ? $changeMadeBy->value : $changeMadeBy;

        return $obj;
    }

    /**
     * The type of change that occurred.
     */
    public function withChangeType(string $changeType): self
    {
        $obj = clone $this;
        $obj->changeType = $changeType;

        return $obj;
    }

    /**
     * Details of the changes made to the resource.
     *
     * @param list<Change>|null $changes
     */
    public function withChanges(?array $changes): self
    {
        $obj = clone $this;
        $obj->changes = $changes;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the change occurred.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Unique identifier for the organization that owns the resource.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organizationID = $organizationID;

        return $obj;
    }

    /**
     * The type of the resource being audited.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for the resource that was changed.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj->resourceID = $resourceID;

        return $obj;
    }

    /**
     * Unique identifier for the user who made the change.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
