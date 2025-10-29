<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleResourceShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   resource: string,
 *   resourceType: string,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class UserBundleResource implements BaseModel
{
    /** @use SdkModel<UserBundleResourceShape> */
    use SdkModel;

    /**
     * Resource's ID.
     */
    #[Api]
    public string $id;

    /**
     * Date the resource was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The resource itself (usually a phone number).
     */
    #[Api]
    public string $resource;

    /**
     * The type of the resource (usually 'number').
     */
    #[Api('resource_type')]
    public string $resourceType;

    /**
     * Date the resource was last updated.
     */
    #[Api('updated_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new UserBundleResource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleResource::with(
     *   id: ..., createdAt: ..., resource: ..., resourceType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleResource)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withResource(...)
     *   ->withResourceType(...)
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
        string $resource,
        string $resourceType,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->resource = $resource;
        $obj->resourceType = $resourceType;

        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Resource's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Date the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The resource itself (usually a phone number).
     */
    public function withResource(string $resource): self
    {
        $obj = clone $this;
        $obj->resource = $resource;

        return $obj;
    }

    /**
     * The type of the resource (usually 'number').
     */
    public function withResourceType(string $resourceType): self
    {
        $obj = clone $this;
        $obj->resourceType = $resourceType;

        return $obj;
    }

    /**
     * Date the resource was last updated.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
