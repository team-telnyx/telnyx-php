<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingBundleListResponseShape = array{
 *   data: list<BillingBundleSummary>, meta: PaginationResponse
 * }
 */
final class BillingBundleListResponse implements BaseModel
{
    /** @use SdkModel<BillingBundleListResponseShape> */
    use SdkModel;

    /** @var list<BillingBundleSummary> $data */
    #[Required(list: BillingBundleSummary::class)]
    public array $data;

    #[Required]
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
     * @param list<BillingBundleSummary|array{
     *   id: string,
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrc_price?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * }> $data
     * @param PaginationResponse|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(
        array $data,
        PaginationResponse|array $meta
    ): self {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<BillingBundleSummary|array{
     *   id: string,
     *   cost_code: string,
     *   created_at: \DateTimeInterface,
     *   is_public: bool,
     *   name: string,
     *   currency?: string|null,
     *   mrc_price?: float|null,
     *   slug?: string|null,
     *   specs?: list<string>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationResponse|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(PaginationResponse|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
