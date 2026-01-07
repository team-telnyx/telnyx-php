<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserBundleShape from \Telnyx\BundlePricing\UserBundles\UserBundle
 *
 * @phpstan-type UserBundleNewResponseShape = array{
 *   data: list<UserBundle|UserBundleShape>
 * }
 */
final class UserBundleNewResponse implements BaseModel
{
    /** @use SdkModel<UserBundleNewResponseShape> */
    use SdkModel;

    /** @var list<UserBundle> $data */
    #[Required(list: UserBundle::class)]
    public array $data;

    /**
     * `new UserBundleNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleNewResponse)->withData(...)
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
     * @param list<UserBundle|UserBundleShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<UserBundle|UserBundleShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
