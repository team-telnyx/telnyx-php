<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type push_credential = array{
 *   id: string,
 *   alias: string,
 *   certificate: string,
 *   createdAt: \DateTimeInterface,
 *   privateKey: string,
 *   projectAccountJsonFile: array<string, mixed>,
 *   recordType: string,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PushCredential implements BaseModel
{
    /** @use SdkModel<push_credential> */
    use SdkModel;

    /**
     * Unique identifier of a push credential.
     */
    #[Api]
    public string $id;

    /**
     * Alias to uniquely identify a credential.
     */
    #[Api]
    public string $alias;

    /**
     * Apple certificate for sending push notifications. For iOS only.
     */
    #[Api]
    public string $certificate;

    /**
     * ISO 8601 timestamp when the room was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    #[Api('private_key')]
    public string $privateKey;

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @var array<string, mixed> $projectAccountJsonFile
     */
    #[Api('project_account_json_file', map: 'mixed')]
    public array $projectAccountJsonFile;

    #[Api('record_type')]
    public string $recordType;

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    #[Api]
    public string $type;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Api('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PushCredential()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PushCredential::with(
     *   id: ...,
     *   alias: ...,
     *   certificate: ...,
     *   createdAt: ...,
     *   privateKey: ...,
     *   projectAccountJsonFile: ...,
     *   recordType: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PushCredential)
     *   ->withID(...)
     *   ->withAlias(...)
     *   ->withCertificate(...)
     *   ->withCreatedAt(...)
     *   ->withPrivateKey(...)
     *   ->withProjectAccountJsonFile(...)
     *   ->withRecordType(...)
     *   ->withType(...)
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
     * @param array<string, mixed> $projectAccountJsonFile
     */
    public static function with(
        string $id,
        string $alias,
        string $certificate,
        \DateTimeInterface $createdAt,
        string $privateKey,
        array $projectAccountJsonFile,
        string $recordType,
        string $type,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->alias = $alias;
        $obj->certificate = $certificate;
        $obj->createdAt = $createdAt;
        $obj->privateKey = $privateKey;
        $obj->projectAccountJsonFile = $projectAccountJsonFile;
        $obj->recordType = $recordType;
        $obj->type = $type;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Unique identifier of a push credential.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Alias to uniquely identify a credential.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj->alias = $alias;

        return $obj;
    }

    /**
     * Apple certificate for sending push notifications. For iOS only.
     */
    public function withCertificate(string $certificate): self
    {
        $obj = clone $this;
        $obj->certificate = $certificate;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj->privateKey = $privateKey;

        return $obj;
    }

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @param array<string, mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $obj = clone $this;
        $obj->projectAccountJsonFile = $projectAccountJsonFile;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
