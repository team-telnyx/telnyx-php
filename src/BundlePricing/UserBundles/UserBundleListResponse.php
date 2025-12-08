<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\BundlePricing\BillingBundles\PaginationResponse;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleListResponseShape = array{
 *   data: list<UserBundle>, meta: PaginationResponse
 * }
 */
final class UserBundleListResponse implements BaseModel
{
    /** @use SdkModel<UserBundleListResponseShape> */
    use SdkModel;

    /** @var list<UserBundle> $data */
    #[Required(list: UserBundle::class)]
    public array $data;

    #[Required]
    public PaginationResponse $meta;

    /**
     * `new UserBundleListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleListResponse)->withData(...)->withMeta(...)
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
     * @param list<UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
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
     * @param list<UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
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
