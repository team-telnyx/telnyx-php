<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type user_bundle_list_resources_response = array{
 *   data: list<UserBundleResource>
 * }
 */
final class UserBundleListResourcesResponse implements BaseModel
{
    /** @use SdkModel<user_bundle_list_resources_response> */
    use SdkModel;

    /** @var list<UserBundleResource> $data */
    #[Api(list: UserBundleResource::class)]
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
     * @param list<UserBundleResource> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<UserBundleResource> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
