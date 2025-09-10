<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   billingBundle: BillingBundleSummary, userBundleIDs: list<string>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('billing_bundle')]
    public BillingBundleSummary $billingBundle;

    /**
     * List of user bundle IDs for given bundle.
     *
     * @var list<string> $userBundleIDs
     */
    #[Api('user_bundle_ids', list: 'string')]
    public array $userBundleIDs;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(billingBundle: ..., userBundleIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBillingBundle(...)->withUserBundleIDs(...)
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
     * @param list<string> $userBundleIDs
     */
    public static function with(
        BillingBundleSummary $billingBundle,
        array $userBundleIDs
    ): self {
        $obj = new self;

        $obj->billingBundle = $billingBundle;
        $obj->userBundleIDs = $userBundleIDs;

        return $obj;
    }

    public function withBillingBundle(BillingBundleSummary $billingBundle): self
    {
        $obj = clone $this;
        $obj->billingBundle = $billingBundle;

        return $obj;
    }

    /**
     * List of user bundle IDs for given bundle.
     *
     * @param list<string> $userBundleIDs
     */
    public function withUserBundleIDs(array $userBundleIDs): self
    {
        $obj = clone $this;
        $obj->userBundleIDs = $userBundleIDs;

        return $obj;
    }
}
