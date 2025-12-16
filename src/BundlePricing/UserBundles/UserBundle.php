<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BillingBundleSummaryShape from \Telnyx\BundlePricing\BillingBundles\BillingBundleSummary
 * @phpstan-import-type UserBundleResourceShape from \Telnyx\BundlePricing\UserBundles\UserBundleResource
 *
 * @phpstan-type UserBundleShape = array{
 *   id: string,
 *   active: bool,
 *   billingBundle: BillingBundleSummary|BillingBundleSummaryShape,
 *   createdAt: string,
 *   resources: list<UserBundleResourceShape>,
 *   userID: string,
 *   updatedAt?: string|null,
 * }
 */
final class UserBundle implements BaseModel
{
    /** @use SdkModel<UserBundleShape> */
    use SdkModel;

    /**
     * User bundle's ID, this is used to identify the user bundle in the API.
     */
    #[Required]
    public string $id;

    /**
     * Status of the user bundle.
     */
    #[Required]
    public bool $active;

    #[Required('billing_bundle')]
    public BillingBundleSummary $billingBundle;

    /**
     * Date the user bundle was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /** @var list<UserBundleResource> $resources */
    #[Required(list: UserBundleResource::class)]
    public array $resources;

    /**
     * The customer's ID that owns this user bundle.
     */
    #[Required('user_id')]
    public string $userID;

    /**
     * Date the user bundle was last updated.
     */
    #[Optional('updated_at', nullable: true)]
    public ?string $updatedAt;

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
     * @param BillingBundleSummaryShape $billingBundle
     * @param list<UserBundleResourceShape> $resources
     */
    public static function with(
        string $id,
        bool $active,
        BillingBundleSummary|array $billingBundle,
        string $createdAt,
        array $resources,
        string $userID,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['billingBundle'] = $billingBundle;
        $self['createdAt'] = $createdAt;
        $self['resources'] = $resources;
        $self['userID'] = $userID;

        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * User bundle's ID, this is used to identify the user bundle in the API.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Status of the user bundle.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * @param BillingBundleSummaryShape $billingBundle
     */
    public function withBillingBundle(
        BillingBundleSummary|array $billingBundle
    ): self {
        $self = clone $this;
        $self['billingBundle'] = $billingBundle;

        return $self;
    }

    /**
     * Date the user bundle was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<UserBundleResourceShape> $resources
     */
    public function withResources(array $resources): self
    {
        $self = clone $this;
        $self['resources'] = $resources;

        return $self;
    }

    /**
     * The customer's ID that owns this user bundle.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Date the user bundle was last updated.
     */
    public function withUpdatedAt(?string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
