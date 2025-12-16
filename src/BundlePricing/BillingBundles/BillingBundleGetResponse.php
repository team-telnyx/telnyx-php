<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data
 *
 * @phpstan-type BillingBundleGetResponseShape = array{data: Data|DataShape}
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
     * @param DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
