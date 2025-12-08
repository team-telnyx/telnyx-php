<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemShape = array{billing_bundle_id: string, quantity: int}
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Quantity of user bundles to order.
     */
    #[Required]
    public string $billing_bundle_id;

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
     * Item::with(billing_bundle_id: ..., quantity: ...)
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
    public static function with(string $billing_bundle_id, int $quantity): self
    {
        $obj = new self;

        $obj['billing_bundle_id'] = $billing_bundle_id;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withBillingBundleID(string $billingBundleID): self
    {
        $obj = clone $this;
        $obj['billing_bundle_id'] = $billingBundleID;

        return $obj;
    }

    /**
     * Quantity of user bundles to order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }
}
