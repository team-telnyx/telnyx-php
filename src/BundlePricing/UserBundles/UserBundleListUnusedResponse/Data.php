<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   billingBundle: BillingBundleSummary, userBundleIDs: list<string>
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
     * @param BillingBundleSummary|array{
     *   id: string,
     *   costCode: string,
     *   createdAt: \DateTimeInterface,
     *   isPublic: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrcPrice?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * } $billingBundle
     * @param list<string> $userBundleIDs
     */
    public static function with(
        BillingBundleSummary|array $billingBundle,
        array $userBundleIDs
    ): self {
        $obj = new self;

        $obj['billingBundle'] = $billingBundle;
        $obj['userBundleIDs'] = $userBundleIDs;

        return $obj;
    }

    /**
     * @param BillingBundleSummary|array{
     *   id: string,
     *   costCode: string,
     *   createdAt: \DateTimeInterface,
     *   isPublic: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrcPrice?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * } $billingBundle
     */
    public function withBillingBundle(
        BillingBundleSummary|array $billingBundle
    ): self {
        $obj = clone $this;
        $obj['billingBundle'] = $billingBundle;

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
        $obj['userBundleIDs'] = $userBundleIDs;

        return $obj;
    }
}
