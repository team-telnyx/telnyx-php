<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type telephony_credential = array{
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
    /** @use SdkModel<telephony_credential> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $expired;

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Identifies the resource this credential is associated with.
     */
    #[Api('resource_id', optional: true)]
    public ?string $resourceID;

    /**
     * The randomly generated SIP password for the credential.
     */
    #[Api('sip_password', optional: true)]
    public ?string $sipPassword;

    /**
     * The randomly generated SIP username for the credential.
     */
    #[Api('sip_username', optional: true)]
    public ?string $sipUsername;

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $expired && $obj->expired = $expired;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $resourceID && $obj->resourceID = $resourceID;
        null !== $sipPassword && $obj->sipPassword = $sipPassword;
        null !== $sipUsername && $obj->sipUsername = $sipUsername;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Defaults to false.
     */
    public function withExpired(bool $expired): self
    {
        $obj = clone $this;
        $obj->expired = $expired;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Identifies the resource this credential is associated with.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj->resourceID = $resourceID;

        return $obj;
    }

    /**
     * The randomly generated SIP password for the credential.
     */
    public function withSipPassword(string $sipPassword): self
    {
        $obj = clone $this;
        $obj->sipPassword = $sipPassword;

        return $obj;
    }

    /**
     * The randomly generated SIP username for the credential.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj->sipUsername = $sipUsername;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
