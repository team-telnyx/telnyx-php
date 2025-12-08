<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephonyCredentialShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   expired?: bool|null,
 *   expires_at?: string|null,
 *   name?: string|null,
 *   record_type?: string|null,
 *   resource_id?: string|null,
 *   sip_password?: string|null,
 *   sip_username?: string|null,
 *   updated_at?: string|null,
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
    #[Optional]
    public ?string $created_at;

    /**
     * Defaults to false.
     */
    #[Optional]
    public ?bool $expired;

    /**
     * ISO-8601 formatted date indicating when the resource will expire.
     */
    #[Optional]
    public ?string $expires_at;

    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Identifies the resource this credential is associated with.
     */
    #[Optional]
    public ?string $resource_id;

    /**
     * The randomly generated SIP password for the credential.
     */
    #[Optional]
    public ?string $sip_password;

    /**
     * The randomly generated SIP username for the credential.
     */
    #[Optional]
    public ?string $sip_username;

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

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
        ?string $created_at = null,
        ?bool $expired = null,
        ?string $expires_at = null,
        ?string $name = null,
        ?string $record_type = null,
        ?string $resource_id = null,
        ?string $sip_password = null,
        ?string $sip_username = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $expired && $obj['expired'] = $expired;
        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $name && $obj['name'] = $name;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $resource_id && $obj['resource_id'] = $resource_id;
        null !== $sip_password && $obj['sip_password'] = $sip_password;
        null !== $sip_username && $obj['sip_username'] = $sip_username;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['created_at'] = $createdAt;

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
        $obj['expires_at'] = $expiresAt;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the resource this credential is associated with.
     */
    public function withResourceID(string $resourceID): self
    {
        $obj = clone $this;
        $obj['resource_id'] = $resourceID;

        return $obj;
    }

    /**
     * The randomly generated SIP password for the credential.
     */
    public function withSipPassword(string $sipPassword): self
    {
        $obj = clone $this;
        $obj['sip_password'] = $sipPassword;

        return $obj;
    }

    /**
     * The randomly generated SIP username for the credential.
     */
    public function withSipUsername(string $sipUsername): self
    {
        $obj = clone $this;
        $obj['sip_username'] = $sipUsername;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
