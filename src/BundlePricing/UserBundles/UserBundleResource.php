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
 *   createdAt: string,
 *   resource: string,
 *   resourceType: string,
 *   updatedAt?: string|null,
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
    #[Required('created_at')]
    public string $createdAt;

    /**
     * The resource itself (usually a phone number).
     */
    #[Required]
    public string $resource;

    /**
     * The type of the resource (usually 'number').
     */
    #[Required('resource_type')]
    public string $resourceType;

    /**
     * Date the resource was last updated.
     */
    #[Optional('updated_at', nullable: true)]
    public ?string $updatedAt;

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
        string $createdAt,
        string $resource,
        string $resourceType,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['resource'] = $resource;
        $self['resourceType'] = $resourceType;

        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Resource's ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Date the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The resource itself (usually a phone number).
     */
    public function withResource(string $resource): self
    {
        $self = clone $this;
        $self['resource'] = $resource;

        return $self;
    }

    /**
     * The type of the resource (usually 'number').
     */
    public function withResourceType(string $resourceType): self
    {
        $self = clone $this;
        $self['resourceType'] = $resourceType;

        return $self;
    }

    /**
     * Date the resource was last updated.
     */
    public function withUpdatedAt(?string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
