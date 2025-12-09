<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPAddress\CloudflareSyncStatus;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessIPRangeShape = array{
 *   id: string,
 *   cidrBlock: string,
 *   status: value-of<CloudflareSyncStatus>,
 *   userID: string,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class AccessIPRange implements BaseModel
{
    /** @use SdkModel<AccessIPRangeShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('cidr_block')]
    public string $cidrBlock;

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
     * `new AccessIPRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPRange::with(id: ..., cidrBlock: ..., status: ..., userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPRange)
     *   ->withID(...)
     *   ->withCidrBlock(...)
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
        string $cidrBlock,
        CloudflareSyncStatus|string $status,
        string $userID,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['cidrBlock'] = $cidrBlock;
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

    public function withCidrBlock(string $cidrBlock): self
    {
        $self = clone $this;
        $self['cidrBlock'] = $cidrBlock;

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
