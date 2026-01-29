<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessIPAddressResponseShape = array{
 *   id: string,
 *   ipAddress: string,
 *   source: string,
 *   status: CloudflareSyncStatus|value-of<CloudflareSyncStatus>,
 *   userID: string,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class AccessIPAddressResponse implements BaseModel
{
    /** @use SdkModel<AccessIPAddressResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('ip_address')]
    public string $ipAddress;

    #[Required]
    public string $source;

    /**
     * An enumeration.
     *
     * @var value-of<CloudflareSyncStatus> $status
     */
    #[Required(enum: CloudflareSyncStatus::class)]
    public string $status;

    #[Required('user_id')]
    public string $userID;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AccessIPAddressResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressResponse::with(
     *   id: ..., ipAddress: ..., source: ..., status: ..., userID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPAddressResponse)
     *   ->withID(...)
     *   ->withIPAddress(...)
     *   ->withSource(...)
     *   ->withStatus(...)
     *   ->withUserID(...)
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
     * @param CloudflareSyncStatus|value-of<CloudflareSyncStatus> $status
     */
    public static function with(
        string $id,
        string $ipAddress,
        string $source,
        CloudflareSyncStatus|string $status,
        string $userID,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['ipAddress'] = $ipAddress;
        $self['source'] = $source;
        $self['status'] = $status;
        $self['userID'] = $userID;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * An enumeration.
     *
     * @param CloudflareSyncStatus|value-of<CloudflareSyncStatus> $status
     */
    public function withStatus(CloudflareSyncStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
