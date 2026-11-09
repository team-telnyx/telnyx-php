<?php

declare(strict_types=1);

namespace Telnyx\UserProfile;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserProfileShape from \Telnyx\UserProfile\UserProfile
 *
 * @phpstan-type UserProfileListResponseShape = array{
 *   data: UserProfile|UserProfileShape
 * }
 */
final class UserProfileListResponse implements BaseModel
{
    /** @use SdkModel<UserProfileListResponseShape> */
    use SdkModel;

    /**
     * The authenticated user's profile.
     */
    #[Required]
    public UserProfile $data;

    /**
     * `new UserProfileListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserProfileListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserProfileListResponse)->withData(...)
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
     * @param UserProfile|UserProfileShape $data
     */
    public static function with(UserProfile|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * The authenticated user's profile.
     *
     * @param UserProfile|UserProfileShape $data
     */
    public function withData(UserProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
