<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data;
use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data\BundleLimit;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingBundleGetResponseShape = array{data: Data}
 */
final class BillingBundleGetResponse implements BaseModel
{
    /** @use SdkModel<BillingBundleGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new BillingBundleGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BillingBundleGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BillingBundleGetResponse)->withData(...)
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
     * @param Data|array{
     *   id: string,
     *   active: bool,
     *   bundle_limits: list<BundleLimit>,
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   slug?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id: string,
     *   active: bool,
     *   bundle_limits: list<BundleLimit>,
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   slug?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
