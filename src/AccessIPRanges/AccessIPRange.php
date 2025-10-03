<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPAddress\CloudflareSyncStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type access_ip_range = array{
 *   id: string,
 *   cidrBlock: string,
 *   status: value-of<CloudflareSyncStatus>,
 *   userID: string,
 *   createdAt?: \DateTimeInterface,
 *   description?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class AccessIPRange implements BaseModel, ResponseConverter
{
    /** @use SdkModel<access_ip_range> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api('cidr_block')]
    public string $cidrBlock;

    /**
     * An enumeration.
     *
     * @var value-of<CloudflareSyncStatus> $status
     */
    #[Api(enum: CloudflareSyncStatus::class)]
    public string $status;

    #[Api('user_id')]
    public string $userID;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $description;

    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->cidrBlock = $cidrBlock;
        $obj['status'] = $status;
        $obj->userID = $userID;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $description && $obj->description = $description;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCidrBlock(string $cidrBlock): self
    {
        $obj = clone $this;
        $obj->cidrBlock = $cidrBlock;

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
        $obj->userID = $userID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
