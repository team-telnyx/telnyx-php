<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthGrants\OAuthGrant\RecordType;

/**
 * @phpstan-type OAuthGrantShape = array{
 *   id: string,
 *   clientID: string,
 *   createdAt: \DateTimeInterface,
 *   recordType: value-of<RecordType>,
 *   scopes: list<string>,
 *   lastUsedAt?: \DateTimeInterface|null,
 * }
 */
final class OAuthGrant implements BaseModel
{
    /** @use SdkModel<OAuthGrantShape> */
    use SdkModel;

    /**
     * Unique identifier for the OAuth grant.
     */
    #[Required]
    public string $id;

    /**
     * OAuth client identifier.
     */
    #[Required('client_id')]
    public string $clientID;

    /**
     * Timestamp when the grant was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * List of granted OAuth scopes.
     *
     * @var list<string> $scopes
     */
    #[Required(list: 'string')]
    public array $scopes;

    /**
     * Timestamp when the grant was last used.
     */
    #[Optional('last_used_at', nullable: true)]
    public ?\DateTimeInterface $lastUsedAt;

    /**
     * `new OAuthGrant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrant::with(
     *   id: ..., clientID: ..., createdAt: ..., recordType: ..., scopes: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthGrant)
     *   ->withID(...)
     *   ->withClientID(...)
     *   ->withCreatedAt(...)
     *   ->withRecordType(...)
     *   ->withScopes(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $scopes
     */
    public static function with(
        string $id,
        string $clientID,
        \DateTimeInterface $createdAt,
        RecordType|string $recordType,
        array $scopes,
        ?\DateTimeInterface $lastUsedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['clientID'] = $clientID;
        $self['createdAt'] = $createdAt;
        $self['recordType'] = $recordType;
        $self['scopes'] = $scopes;

        null !== $lastUsedAt && $self['lastUsedAt'] = $lastUsedAt;

        return $self;
    }

    /**
     * Unique identifier for the OAuth grant.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * Timestamp when the grant was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Record type identifier.
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
     * List of granted OAuth scopes.
     *
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $self = clone $this;
        $self['scopes'] = $scopes;

        return $self;
    }

    /**
     * Timestamp when the grant was last used.
     */
    public function withLastUsedAt(?\DateTimeInterface $lastUsedAt): self
    {
        $self = clone $this;
        $self['lastUsedAt'] = $lastUsedAt;

        return $self;
    }
}
