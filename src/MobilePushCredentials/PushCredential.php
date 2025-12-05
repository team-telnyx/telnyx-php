<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PushCredentialShape = array{
 *   id: string,
 *   alias: string,
 *   certificate: string,
 *   created_at: \DateTimeInterface,
 *   private_key: string,
 *   project_account_json_file: array<string,mixed>,
 *   record_type: string,
 *   type: string,
 *   updated_at: \DateTimeInterface,
 * }
 */
final class PushCredential implements BaseModel
{
    /** @use SdkModel<PushCredentialShape> */
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
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    #[Api]
    public string $private_key;

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @var array<string,mixed> $project_account_json_file
     */
    #[Api(map: 'mixed')]
    public array $project_account_json_file;

    #[Api]
    public string $record_type;

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    #[Api]
    public string $type;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Api]
    public \DateTimeInterface $updated_at;

    /**
     * `new PushCredential()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PushCredential::with(
     *   id: ...,
     *   alias: ...,
     *   certificate: ...,
     *   created_at: ...,
     *   private_key: ...,
     *   project_account_json_file: ...,
     *   record_type: ...,
     *   type: ...,
     *   updated_at: ...,
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
     * @param array<string,mixed> $project_account_json_file
     */
    public static function with(
        string $id,
        string $alias,
        string $certificate,
        \DateTimeInterface $created_at,
        string $private_key,
        array $project_account_json_file,
        string $record_type,
        string $type,
        \DateTimeInterface $updated_at,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['alias'] = $alias;
        $obj['certificate'] = $certificate;
        $obj['created_at'] = $created_at;
        $obj['private_key'] = $private_key;
        $obj['project_account_json_file'] = $project_account_json_file;
        $obj['record_type'] = $record_type;
        $obj['type'] = $type;
        $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Unique identifier of a push credential.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Alias to uniquely identify a credential.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj['alias'] = $alias;

        return $obj;
    }

    /**
     * Apple certificate for sending push notifications. For iOS only.
     */
    public function withCertificate(string $certificate): self
    {
        $obj = clone $this;
        $obj['certificate'] = $certificate;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj['private_key'] = $privateKey;

        return $obj;
    }

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $obj = clone $this;
        $obj['project_account_json_file'] = $projectAccountJsonFile;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
