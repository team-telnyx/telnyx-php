<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemShape = array{billingBundleID: string, quantity: int}
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Quantity of user bundles to order.
     */
    #[Required('billing_bundle_id')]
    public string $billingBundleID;

    /**
     * Quantity of user bundles to order.
     */
    #[Required]
    public int $quantity;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(billingBundleID: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)->withBillingBundleID(...)->withQuantity(...)
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
    public static function with(string $billingBundleID, int $quantity): self
    {
        $self = new self;

        $self['billingBundleID'] = $billingBundleID;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withBillingBundleID(string $billingBundleID): self
    {
        $self = clone $this;
        $self['billingBundleID'] = $billingBundleID;

        return $self;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }
}
