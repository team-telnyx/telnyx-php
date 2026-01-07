<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserBundleResourceShape from \Telnyx\BundlePricing\UserBundles\UserBundleResource
 *
 * @phpstan-type UserBundleListResourcesResponseShape = array{
 *   data: list<UserBundleResource|UserBundleResourceShape>
 * }
 */
final class UserBundleListResourcesResponse implements BaseModel
{
    /** @use SdkModel<UserBundleListResourcesResponseShape> */
    use SdkModel;

    /** @var list<UserBundleResource> $data */
    #[Required(list: UserBundleResource::class)]
    public array $data;

    /**
     * `new UserBundleListResourcesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleListResourcesResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleListResourcesResponse)->withData(...)
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
     * @param list<UserBundleResource|UserBundleResourceShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<UserBundleResource|UserBundleResourceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
