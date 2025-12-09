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
 *   status: value-of<CloudflareSyncStatus>,
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['ipAddress'] = $ipAddress;
        $obj['source'] = $source;
        $obj['status'] = $status;
        $obj['userID'] = $userID;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $description && $obj['description'] = $description;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }

    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * An enumeration.
     *
     * @param CloudflareSyncStatus|value-of<CloudflareSyncStatus> $status
     */
    public function withStatus(CloudflareSyncStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
