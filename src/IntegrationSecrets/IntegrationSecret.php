<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationSecretShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   identifier: string,
 *   recordType: string,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class IntegrationSecret implements BaseModel
{
    /** @use SdkModel<IntegrationSecretShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $identifier;

    #[Required('record_type')]
    public string $recordType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new IntegrationSecret()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecret::with(
     *   id: ..., createdAt: ..., identifier: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecret)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withIdentifier(...)
     *   ->withRecordType(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $identifier,
        string $recordType,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['identifier'] = $identifier;
        $self['recordType'] = $recordType;

        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withIdentifier(string $identifier): self
    {
        $self = clone $this;
        $self['identifier'] = $identifier;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
