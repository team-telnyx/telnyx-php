<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\EmailBlock\Reason;
use Telnyx\EmailBlocks\EmailBlock\RecordType;
use Telnyx\EmailBlocks\EmailBlock\Scope;
use Telnyx\EmailBlocks\EmailBlock\Source;
use Telnyx\EmailBlocks\EmailBlock\Status;

/**
 * Suppression record. Schema fields hidden by the view:
 * `account_id`, `bounce_category`, `dsn_code`, `meta`.
 *
 * @phpstan-type EmailBlockShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   reason: Reason|value-of<Reason>,
 *   recordType: RecordType|value-of<RecordType>,
 *   scope: Scope|value-of<Scope>,
 *   source: Source|value-of<Source>,
 *   status: Status|value-of<Status>,
 *   to: string,
 *   updatedAt: \DateTimeInterface,
 *   domainID?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   groupID?: string|null,
 * }
 */
final class EmailBlock implements BaseModel
{
    /** @use SdkModel<EmailBlockShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var value-of<Reason> $reason */
    #[Required(enum: Reason::class)]
    public string $reason;

    /**
     * View-only discriminator.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Derived server-side from `domain_id`/`from`; never trusted from the caller.
     *
     * @var value-of<Scope> $scope
     */
    #[Required(enum: Scope::class)]
    public string $scope;

    /** @var value-of<Source> $source */
    #[Required(enum: Source::class)]
    public string $source;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Normalized recipient. (schema: to_address).
     */
    #[Required]
    public string $to;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `null` ⇒ account scope. Stored on the row; exposed here.
     */
    #[Optional('domain_id', nullable: true)]
    public ?string $domainID;

    #[Optional('expires_at', nullable: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * `null` ⇒ not address-scope. (schema: from_address).
     */
    #[Optional(nullable: true)]
    public ?string $from;

    /**
     * `null` ⇒ global; set ⇒ group-scoped opt-out.
     */
    #[Optional('group_id', nullable: true)]
    public ?string $groupID;

    /**
     * `new EmailBlock()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlock::with(
     *   id: ...,
     *   createdAt: ...,
     *   reason: ...,
     *   recordType: ...,
     *   scope: ...,
     *   source: ...,
     *   status: ...,
     *   to: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlock)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withReason(...)
     *   ->withRecordType(...)
     *   ->withScope(...)
     *   ->withSource(...)
     *   ->withStatus(...)
     *   ->withTo(...)
     *   ->withUpdatedAt(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Reason|value-of<Reason> $reason
     * @param RecordType|value-of<RecordType> $recordType
     * @param Scope|value-of<Scope> $scope
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        Reason|string $reason,
        RecordType|string $recordType,
        Scope|string $scope,
        Source|string $source,
        Status|string $status,
        string $to,
        \DateTimeInterface $updatedAt,
        ?string $domainID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        ?string $groupID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['reason'] = $reason;
        $self['recordType'] = $recordType;
        $self['scope'] = $scope;
        $self['source'] = $source;
        $self['status'] = $status;
        $self['to'] = $to;
        $self['updatedAt'] = $updatedAt;

        null !== $domainID && $self['domainID'] = $domainID;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $from && $self['from'] = $from;
        null !== $groupID && $self['groupID'] = $groupID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * View-only discriminator.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Derived server-side from `domain_id`/`from`; never trusted from the caller.
     *
     * @param Scope|value-of<Scope> $scope
     */
    public function withScope(Scope|string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }

    /**
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Normalized recipient. (schema: to_address).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * `null` ⇒ account scope. Stored on the row; exposed here.
     */
    public function withDomainID(?string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * `null` ⇒ not address-scope. (schema: from_address).
     */
    public function withFrom(?string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * `null` ⇒ global; set ⇒ group-scoped opt-out.
     */
    public function withGroupID(?string $groupID): self
    {
        $self = clone $this;
        $self['groupID'] = $groupID;

        return $self;
    }
}
