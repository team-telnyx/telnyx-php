<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleResourceShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   resource: string,
 *   resource_type: string,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class UserBundleResource implements BaseModel
{
    /** @use SdkModel<UserBundleResourceShape> */
    use SdkModel;

    /**
     * Resource's ID.
     */
    #[Required]
    public string $id;

    /**
     * Date the resource was created.
     */
    #[Required]
    public \DateTimeInterface $created_at;

    /**
     * The resource itself (usually a phone number).
     */
    #[Required]
    public string $resource;

    /**
     * The type of the resource (usually 'number').
     */
    #[Required]
    public string $resource_type;

    /**
     * Date the resource was last updated.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new UserBundleResource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleResource::with(
     *   id: ..., created_at: ..., resource: ..., resource_type: ...
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
        \DateTimeInterface $created_at,
        string $resource,
        string $resource_type,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['resource'] = $resource;
        $obj['resource_type'] = $resource_type;

        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Resource's ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Date the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The resource itself (usually a phone number).
     */
    public function withResource(string $resource): self
    {
        $obj = clone $this;
        $obj['resource'] = $resource;

        return $obj;
    }

    /**
     * The type of the resource (usually 'number').
     */
    public function withResourceType(string $resourceType): self
    {
        $obj = clone $this;
        $obj['resource_type'] = $resourceType;

        return $obj;
    }

    /**
     * Date the resource was last updated.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
