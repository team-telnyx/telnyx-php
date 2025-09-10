<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type billing_bundle_list_response = array{
 *   data: list<BillingBundleSummary>, meta: PaginationResponse
 * }
 */
final class BillingBundleListResponse implements BaseModel
{
    /** @use SdkModel<billing_bundle_list_response> */
    use SdkModel;

    /** @var list<BillingBundleSummary> $data */
    #[Api(list: BillingBundleSummary::class)]
    public array $data;

    #[Api]
    public PaginationResponse $meta;

    /**
     * `new BillingBundleListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BillingBundleListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BillingBundleListResponse)->withData(...)->withMeta(...)
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
     * @param list<BillingBundleSummary> $data
     */
    public static function with(array $data, PaginationResponse $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<BillingBundleSummary> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationResponse $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
