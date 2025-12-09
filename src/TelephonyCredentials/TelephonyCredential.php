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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $expired && $obj['expired'] = $expired;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $name && $obj['name'] = $name;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $resourceID && $obj['resourceID'] = $resourceID;
        null !== $sipPassword && $obj['sipPassword'] = $sipPassword;
        null !== $sipUsername && $obj['sipUsername'] = $sipUsername;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Defaults to false.
     */
    public function withExpired(bool $expired): self
    {
        $obj = clone $this;
        $obj['expired'] = $expired;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the resource this credential is associated with.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj['resourceID'] = $resourceID;

        return $obj;
    }

    /**
     * The randomly generated SIP password for the credential.
     */
    public function withSipPassword(string $sipPassword): self
    {
        $obj = clone $this;
        $obj['sipPassword'] = $sipPassword;

        return $obj;
    }

    /**
     * The randomly generated SIP username for the credential.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj['sipUsername'] = $sipUsername;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
