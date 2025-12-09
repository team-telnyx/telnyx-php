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
     *   bundleLimits: list<BundleLimit>,
     *   costCode: string,
     *   createdAt: \DateTimeInterface,
     *   isPublic: bool,
     *   name: string,
     *   slug?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id: string,
     *   active: bool,
     *   bundleLimits: list<BundleLimit>,
     *   costCode: string,
     *   createdAt: \DateTimeInterface,
     *   isPublic: bool,
     *   name: string,
     *   slug?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
