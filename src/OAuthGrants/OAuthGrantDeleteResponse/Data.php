<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants\OAuthGrantDeleteResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthGrants\OAuthGrantDeleteResponse\Data\RecordType;

/**
 * @phpstan-type data_alias = array{
 *   id: string,
 *   clientID: string,
 *   createdAt: \DateTimeInterface,
 *   recordType: value-of<RecordType>,
 *   scopes: list<string>,
 *   lastUsedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Unique identifier for the OAuth grant.
     */
    #[Api]
    public string $id;

    /**
     * OAuth client identifier.
     */
    #[Api('client_id')]
    public string $clientID;

    /**
     * Timestamp when the grant was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * List of granted OAuth scopes.
     *
     * @var list<string> $scopes
     */
    #[Api(list: 'string')]
    public array $scopes;

    /**
     * Timestamp when the grant was last used.
     */
    #[Api('last_used_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $lastUsedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., clientID: ..., createdAt: ..., recordType: ..., scopes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
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
        $obj = new self;

        $obj->id = $id;
        $obj->clientID = $clientID;
        $obj->createdAt = $createdAt;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        $obj->scopes = $scopes;

        null !== $lastUsedAt && $obj->lastUsedAt = $lastUsedAt;

        return $obj;
    }

    /**
     * Unique identifier for the OAuth grant.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * Timestamp when the grant was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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
        $obj->scopes = $scopes;

        return $obj;
    }

    /**
     * Timestamp when the grant was last used.
     */
    public function withLastUsedAt(?\DateTimeInterface $lastUsedAt): self
    {
        $obj = clone $this;
        $obj->lastUsedAt = $lastUsedAt;

        return $obj;
    }
}
