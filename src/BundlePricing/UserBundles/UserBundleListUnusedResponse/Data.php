<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   billing_bundle: BillingBundleSummary, user_bundle_ids: list<string>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public BillingBundleSummary $billing_bundle;

    /**
     * List of user bundle IDs for given bundle.
     *
     * @var list<string> $user_bundle_ids
     */
    #[Api(list: 'string')]
    public array $user_bundle_ids;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(billing_bundle: ..., user_bundle_ids: ...)
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
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrc_price?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * } $billing_bundle
     * @param list<string> $user_bundle_ids
     */
    public static function with(
        BillingBundleSummary|array $billing_bundle,
        array $user_bundle_ids
    ): self {
        $obj = new self;

        $obj['billing_bundle'] = $billing_bundle;
        $obj['user_bundle_ids'] = $user_bundle_ids;

        return $obj;
    }

    /**
     * @param BillingBundleSummary|array{
     *   id: string,
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrc_price?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * } $billingBundle
     */
    public function withBillingBundle(
        BillingBundleSummary|array $billingBundle
    ): self {
        $obj = clone $this;
        $obj['billing_bundle'] = $billingBundle;

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
        $obj['user_bundle_ids'] = $userBundleIDs;

        return $obj;
    }
}
