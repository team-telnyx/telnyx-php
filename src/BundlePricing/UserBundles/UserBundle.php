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
 *   billing_bundle: BillingBundleSummary,
 *   created_at: \DateTimeInterface,
 *   resources: list<UserBundleResource>,
 *   user_id: string,
 *   updated_at?: \DateTimeInterface|null,
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

    #[Api]
    public BillingBundleSummary $billing_bundle;

    /**
     * Date the user bundle was created.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /** @var list<UserBundleResource> $resources */
    #[Api(list: UserBundleResource::class)]
    public array $resources;

    /**
     * The customer's ID that owns this user bundle.
     */
    #[Api]
    public string $user_id;

    /**
     * Date the user bundle was last updated.
     */
    #[Api(nullable: true, optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new UserBundle()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundle::with(
     *   id: ...,
     *   active: ...,
     *   billing_bundle: ...,
     *   created_at: ...,
     *   resources: ...,
     *   user_id: ...,
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
        BillingBundleSummary $billing_bundle,
        \DateTimeInterface $created_at,
        array $resources,
        string $user_id,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->active = $active;
        $obj->billing_bundle = $billing_bundle;
        $obj->created_at = $created_at;
        $obj->resources = $resources;
        $obj->user_id = $user_id;

        null !== $updated_at && $obj->updated_at = $updated_at;

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
        $obj->billing_bundle = $billingBundle;

        return $obj;
    }

    /**
     * Date the user bundle was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj->user_id = $userID;

        return $obj;
    }

    /**
     * Date the user bundle was last updated.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
