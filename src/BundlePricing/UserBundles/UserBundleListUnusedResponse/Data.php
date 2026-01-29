<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BillingBundleSummaryShape from \Telnyx\BundlePricing\BillingBundles\BillingBundleSummary
 *
 * @phpstan-type DataShape = array{
 *   billingBundle: BillingBundleSummary|BillingBundleSummaryShape,
 *   userBundleIDs: list<string>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('billing_bundle')]
    public BillingBundleSummary $billingBundle;

    /**
     * List of user bundle IDs for given bundle.
     *
     * @var list<string> $userBundleIDs
     */
    #[Required('user_bundle_ids', list: 'string')]
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
     * @param BillingBundleSummary|BillingBundleSummaryShape $billingBundle
     * @param list<string> $userBundleIDs
     */
    public static function with(
        BillingBundleSummary|array $billingBundle,
        array $userBundleIDs
    ): self {
        $self = new self;

        $self['billingBundle'] = $billingBundle;
        $self['userBundleIDs'] = $userBundleIDs;

        return $self;
    }

    /**
     * @param BillingBundleSummary|BillingBundleSummaryShape $billingBundle
     */
    public function withBillingBundle(
        BillingBundleSummary|array $billingBundle
    ): self {
        $self = clone $this;
        $self['billingBundle'] = $billingBundle;

        return $self;
    }

    /**
     * List of user bundle IDs for given bundle.
     *
     * @param list<string> $userBundleIDs
     */
    public function withUserBundleIDs(array $userBundleIDs): self
    {
        $self = clone $this;
        $self['userBundleIDs'] = $userBundleIDs;

        return $self;
    }
}
