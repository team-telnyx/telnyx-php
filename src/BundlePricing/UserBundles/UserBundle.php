<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleShape = array{
 *   id: string,
 *   active: bool,
 *   billingBundle: BillingBundleSummary,
 *   createdAt: \DateTimeInterface,
 *   resources: list<UserBundleResource>,
 *   userID: string,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class UserBundle implements BaseModel
{
    /** @use SdkModel<UserBundleShape> */
    use SdkModel;

    /**
     * User bundle's ID, this is used to identify the user bundle in the API.
     */
    #[Api]
    public string $id;

    /**
     * Status of the user bundle.
     */
    #[Api]
    public bool $active;

    #[Api('billing_bundle')]
    public BillingBundleSummary $billingBundle;

    /**
     * Date the user bundle was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<UserBundleResource> $resources */
    #[Api(list: UserBundleResource::class)]
    public array $resources;

    /**
     * The customer's ID that owns this user bundle.
     */
    #[Api('user_id')]
    public string $userID;

    /**
     * Date the user bundle was last updated.
     */
    #[Api('updated_at', nullable: true, optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new UserBundle()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundle::with(
     *   id: ...,
     *   active: ...,
     *   billingBundle: ...,
     *   createdAt: ...,
     *   resources: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundle)
     *   ->withID(...)
     *   ->withActive(...)
     *   ->withBillingBundle(...)
     *   ->withCreatedAt(...)
     *   ->withResources(...)
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
     * @param list<UserBundleResource> $resources
     */
    public static function with(
        string $id,
        bool $active,
        BillingBundleSummary $billingBundle,
        \DateTimeInterface $createdAt,
        array $resources,
        string $userID,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->active = $active;
        $obj->billingBundle = $billingBundle;
        $obj->createdAt = $createdAt;
        $obj->resources = $resources;
        $obj->userID = $userID;

        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * User bundle's ID, this is used to identify the user bundle in the API.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Status of the user bundle.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withBillingBundle(BillingBundleSummary $billingBundle): self
    {
        $obj = clone $this;
        $obj->billingBundle = $billingBundle;

        return $obj;
    }

    /**
     * Date the user bundle was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param list<UserBundleResource> $resources
     */
    public function withResources(array $resources): self
    {
        $obj = clone $this;
        $obj->resources = $resources;

        return $obj;
    }

    /**
     * The customer's ID that owns this user bundle.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Date the user bundle was last updated.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
