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
 *   ip_address: string,
 *   source: string,
 *   status: value-of<CloudflareSyncStatus>,
 *   user_id: string,
 *   created_at?: \DateTimeInterface|null,
 *   description?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class AccessIPAddressResponse implements BaseModel
{
    /** @use SdkModel<AccessIPAddressResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $ip_address;

    #[Required]
    public string $source;

    /**
     * An enumeration.
     *
     * @var value-of<CloudflareSyncStatus> $status
     */
    #[Required(enum: CloudflareSyncStatus::class)]
    public string $status;

    #[Required]
    public string $user_id;

    #[Optional]
    public ?\DateTimeInterface $created_at;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new AccessIPAddressResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressResponse::with(
     *   id: ..., ip_address: ..., source: ..., status: ..., user_id: ...
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
        string $ip_address,
        string $source,
        CloudflareSyncStatus|string $status,
        string $user_id,
        ?\DateTimeInterface $created_at = null,
        ?string $description = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['ip_address'] = $ip_address;
        $obj['source'] = $source;
        $obj['status'] = $status;
        $obj['user_id'] = $user_id;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $description && $obj['description'] = $description;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['ip_address'] = $ipAddress;

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
        $obj['user_id'] = $userID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
