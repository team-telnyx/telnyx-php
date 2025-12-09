<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleListResourcesResponseShape = array{
 *   data: list<UserBundleResource>
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
     * @param list<UserBundleResource|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   resource: string,
     *   resourceType: string,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<UserBundleResource|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   resource: string,
     *   resourceType: string,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
