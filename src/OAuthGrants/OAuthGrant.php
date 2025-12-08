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
 *   client_id: string,
 *   created_at: \DateTimeInterface,
 *   record_type: value-of<RecordType>,
 *   scopes: list<string>,
 *   last_used_at?: \DateTimeInterface|null,
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
    #[Required]
    public string $client_id;

    /**
     * Timestamp when the grant was created.
     */
    #[Required]
    public \DateTimeInterface $created_at;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $record_type
     */
    #[Required(enum: RecordType::class)]
    public string $record_type;

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
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $last_used_at;

    /**
     * `new OAuthGrant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrant::with(
     *   id: ..., client_id: ..., created_at: ..., record_type: ..., scopes: ...
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $scopes
     */
    public static function with(
        string $id,
        string $client_id,
        \DateTimeInterface $created_at,
        RecordType|string $record_type,
        array $scopes,
        ?\DateTimeInterface $last_used_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['client_id'] = $client_id;
        $obj['created_at'] = $created_at;
        $obj['record_type'] = $record_type;
        $obj['scopes'] = $scopes;

        null !== $last_used_at && $obj['last_used_at'] = $last_used_at;

        return $obj;
    }

    /**
     * Unique identifier for the OAuth grant.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    /**
     * Timestamp when the grant was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Record type identifier.
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
     * List of granted OAuth scopes.
     *
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $obj = clone $this;
        $obj['scopes'] = $scopes;

        return $obj;
    }

    /**
     * Timestamp when the grant was last used.
     */
    public function withLastUsedAt(?\DateTimeInterface $lastUsedAt): self
    {
        $obj = clone $this;
        $obj['last_used_at'] = $lastUsedAt;

        return $obj;
    }
}
