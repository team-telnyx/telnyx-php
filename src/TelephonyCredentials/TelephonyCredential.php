<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephonyCredentialShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   expired?: bool|null,
 *   expiresAt?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   resourceID?: string|null,
 *   sipPassword?: string|null,
 *   sipUsername?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class TelephonyCredential implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Defaults to false.
     */
    #[Optional]
    public ?bool $expired;

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    #[Optional('expires_at')]
    public ?string $expiresAt;

    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identifies the resource this credential is associated with.
     */
    #[Optional('resource_id')]
    public ?string $resourceID;

    /**
     * The randomly generated SIP password for the credential.
     */
    #[Optional('sip_password')]
    public ?string $sipPassword;

    /**
     * The randomly generated SIP username for the credential.
     */
    #[Optional('sip_username')]
    public ?string $sipUsername;

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?bool $expired = null,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $recordType = null,
        ?string $resourceID = null,
        ?string $sipPassword = null,
        ?string $sipUsername = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expired && $self['expired'] = $expired;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $resourceID && $self['resourceID'] = $resourceID;
        null !== $sipPassword && $self['sipPassword'] = $sipPassword;
        null !== $sipUsername && $self['sipUsername'] = $sipUsername;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Defaults to false.
     */
    public function withExpired(bool $expired): self
    {
        $self = clone $this;
        $self['expired'] = $expired;

        return $self;
    }

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identifies the resource this credential is associated with.
     */
    public function withResourceID(string $resourceID): self
    {
        $self = clone $this;
        $self['resourceID'] = $resourceID;

        return $self;
    }

    /**
     * The randomly generated SIP password for the credential.
     */
    public function withSipPassword(string $sipPassword): self
    {
        $self = clone $this;
        $self['sipPassword'] = $sipPassword;

        return $self;
    }

    /**
     * The randomly generated SIP username for the credential.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $self = clone $this;
        $self['sipUsername'] = $sipUsername;

        return $self;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
