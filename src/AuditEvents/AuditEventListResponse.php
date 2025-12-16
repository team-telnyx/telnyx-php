<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents;

use Telnyx\AuditEvents\AuditEventListResponse\Change;
use Telnyx\AuditEvents\AuditEventListResponse\ChangeMadeBy;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ChangeShape from \Telnyx\AuditEvents\AuditEventListResponse\Change
 *
 * @phpstan-type AuditEventListResponseShape = array{
 *   id?: string|null,
 *   alternateResourceID?: string|null,
 *   changeMadeBy?: null|ChangeMadeBy|value-of<ChangeMadeBy>,
 *   changeType?: string|null,
 *   changes?: list<ChangeShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   organizationID?: string|null,
 *   recordType?: string|null,
 *   resourceID?: string|null,
 *   userID?: string|null,
 * }
 */
final class AuditEventListResponse implements BaseModel
{
    /** @use SdkModel<AuditEventListResponseShape> */
    use SdkModel;

    /**
     * Unique identifier for the audit log entry.
     */
    #[Optional]
    public ?string $id;

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    #[Optional('alternate_resource_id', nullable: true)]
    public ?string $alternateResourceID;

    /**
     * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
     *
     * @var value-of<ChangeMadeBy>|null $changeMadeBy
     */
    #[Optional('change_made_by', enum: ChangeMadeBy::class)]
    public ?string $changeMadeBy;

    /**
     * The type of change that occurred.
     */
    #[Optional('change_type')]
    public ?string $changeType;

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
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Unique identifier for the organization that owns the resource.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * The type of the resource being audited.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Unique identifier for the resource that was changed.
     */
    #[Optional('resource_id')]
    public ?string $resourceID;

    /**
     * Unique identifier for the user who made the change.
     */
    #[Optional('user_id')]
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
     * @param list<ChangeShape>|null $changes
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $alternateResourceID && $self['alternateResourceID'] = $alternateResourceID;
        null !== $changeMadeBy && $self['changeMadeBy'] = $changeMadeBy;
        null !== $changeType && $self['changeType'] = $changeType;
        null !== $changes && $self['changes'] = $changes;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $resourceID && $self['resourceID'] = $resourceID;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Unique identifier for the audit log entry.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An alternate identifier for a resource which may be considered unique enough to identify the resource but is not the primary identifier for the resource. For example, this field could be used to store the phone number value for a phone number when the primary database identifier is a separate distinct value.
     */
    public function withAlternateResourceID(?string $alternateResourceID): self
    {
        $self = clone $this;
        $self['alternateResourceID'] = $alternateResourceID;

        return $self;
    }

    /**
     * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
     *
     * @param ChangeMadeBy|value-of<ChangeMadeBy> $changeMadeBy
     */
    public function withChangeMadeBy(ChangeMadeBy|string $changeMadeBy): self
    {
        $self = clone $this;
        $self['changeMadeBy'] = $changeMadeBy;

        return $self;
    }

    /**
     * The type of change that occurred.
     */
    public function withChangeType(string $changeType): self
    {
        $self = clone $this;
        $self['changeType'] = $changeType;

        return $self;
    }

    /**
     * Details of the changes made to the resource.
     *
     * @param list<ChangeShape>|null $changes
     */
    public function withChanges(?array $changes): self
    {
        $self = clone $this;
        $self['changes'] = $changes;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the change occurred.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Unique identifier for the organization that owns the resource.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * The type of the resource being audited.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique identifier for the resource that was changed.
     */
    public function withResourceID(string $resourceID): self
    {
        $self = clone $this;
        $self['resourceID'] = $resourceID;

        return $self;
    }

    /**
     * Unique identifier for the user who made the change.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
