<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PushCredentialShape = array{
 *   id: string,
 *   alias: string,
 *   certificate: string,
 *   createdAt: \DateTimeInterface,
 *   privateKey: string,
 *   projectAccountJsonFile: array<string,mixed>,
 *   recordType: string,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PushCredential implements BaseModel
{
    /** @use SdkModel<PushCredentialShape> */
    use SdkModel;

    /**
     * Unique identifier of a push credential.
     */
    #[Required]
    public string $id;

    /**
     * Alias to uniquely identify a credential.
     */
    #[Required]
    public string $alias;

    /**
     * Apple certificate for sending push notifications. For iOS only.
     */
    #[Required]
    public string $certificate;

    /**
     * ISO 8601 timestamp when the room was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    #[Required('private_key')]
    public string $privateKey;

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @var array<string,mixed> $projectAccountJsonFile
     */
    #[Required('project_account_json_file', map: 'mixed')]
    public array $projectAccountJsonFile;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    #[Required]
    public string $type;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Required('updated_at')]
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
     * @param array<string,mixed> $projectAccountJsonFile
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
        $self = new self;

        $self['id'] = $id;
        $self['alias'] = $alias;
        $self['certificate'] = $certificate;
        $self['createdAt'] = $createdAt;
        $self['privateKey'] = $privateKey;
        $self['projectAccountJsonFile'] = $projectAccountJsonFile;
        $self['recordType'] = $recordType;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Unique identifier of a push credential.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Alias to uniquely identify a credential.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * Apple certificate for sending push notifications. For iOS only.
     */
    public function withCertificate(string $certificate): self
    {
        $self = clone $this;
        $self['certificate'] = $certificate;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Apple private key for a given certificate for sending push notifications. For iOS only.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $self = clone $this;
        $self['privateKey'] = $privateKey;

        return $self;
    }

    /**
     * Google server key for sending push notifications. For Android only.
     *
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $self = clone $this;
        $self['projectAccountJsonFile'] = $projectAccountJsonFile;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Type of mobile push credential. Either <code>ios</code> or <code>android</code>.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
