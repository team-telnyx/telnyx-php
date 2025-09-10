<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type item_alias = array{billingBundleID: string, quantity: int}
 */
final class Item implements BaseModel
{
    /** @use SdkModel<item_alias> */
    use SdkModel;

    /**
     * Quantity of user bundles to order.
     */
    #[Api('billing_bundle_id')]
    public string $billingBundleID;

    /**
     * Quantity of user bundles to order.
     */
    #[Api]
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
        $obj = new self;

        $obj->billingBundleID = $billingBundleID;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withBillingBundleID(string $billingBundleID): self
    {
        $obj = clone $this;
        $obj->billingBundleID = $billingBundleID;

        return $obj;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
