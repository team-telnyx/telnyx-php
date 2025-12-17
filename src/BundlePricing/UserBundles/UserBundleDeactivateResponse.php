<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserBundleShape from \Telnyx\BundlePricing\UserBundles\UserBundle
 *
 * @phpstan-type UserBundleDeactivateResponseShape = array{
 *   data: UserBundle|UserBundleShape
 * }
 */
final class UserBundleDeactivateResponse implements BaseModel
{
    /** @use SdkModel<UserBundleDeactivateResponseShape> */
    use SdkModel;

    #[Required]
    public UserBundle $data;

    /**
     * `new UserBundleDeactivateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleDeactivateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleDeactivateResponse)->withData(...)
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
     * @param UserBundle|UserBundleShape $data
     */
    public static function with(UserBundle|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param UserBundle|UserBundleShape $data
     */
    public function withData(UserBundle|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
