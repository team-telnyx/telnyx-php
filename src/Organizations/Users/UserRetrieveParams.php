<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a user in your organization.
 *
 * @see Telnyx\Services\Organizations\UsersService::retrieve()
 *
 * @phpstan-type UserRetrieveParamsShape = array{includeGroups?: bool|null}
 */
final class UserRetrieveParams implements BaseModel
{
    /** @use SdkModel<UserRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When set to true, includes the groups array for each user in the response. The groups array contains objects with id and name for each group the user belongs to.
     */
    #[Optional]
    public ?bool $includeGroups;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includeGroups = null): self
    {
        $self = new self;

        null !== $includeGroups && $self['includeGroups'] = $includeGroups;

        return $self;
    }

    /**
     * When set to true, includes the groups array for each user in the response. The groups array contains objects with id and name for each group the user belongs to.
     */
    public function withIncludeGroups(bool $includeGroups): self
    {
        $self = clone $this;
        $self['includeGroups'] = $includeGroups;

        return $self;
    }
}
