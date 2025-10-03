<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type billing_bundle_get_response = array{data: Data}
 */
final class BillingBundleGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<billing_bundle_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
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
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
