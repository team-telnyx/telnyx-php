<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Organizations\Users\UserListParams\FilterUserStatus;

/**
 * Returns a list of the users in your organization.
 *
 * @see Telnyx\Services\Organizations\UsersService::list()
 *
 * @phpstan-type UserListParamsShape = array{
 *   filterEmail?: string|null,
 *   filterUserStatus?: null|FilterUserStatus|value-of<FilterUserStatus>,
 *   includeGroups?: bool|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class UserListParams implements BaseModel
{
    /** @use SdkModel<UserListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by email address (partial match).
     */
    #[Optional]
    public ?string $filterEmail;

    /**
     * Filter by user status.
     *
     * @var value-of<FilterUserStatus>|null $filterUserStatus
     */
    #[Optional(enum: FilterUserStatus::class)]
    public ?string $filterUserStatus;

    /**
     * When set to true, includes the groups array for each user in the response. The groups array contains objects with id and name for each group the user belongs to.
     */
    #[Optional]
    public ?bool $includeGroups;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterUserStatus|value-of<FilterUserStatus>|null $filterUserStatus
     */
    public static function with(
        ?string $filterEmail = null,
        FilterUserStatus|string|null $filterUserStatus = null,
        ?bool $includeGroups = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterEmail && $self['filterEmail'] = $filterEmail;
        null !== $filterUserStatus && $self['filterUserStatus'] = $filterUserStatus;
        null !== $includeGroups && $self['includeGroups'] = $includeGroups;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by email address (partial match).
     */
    public function withFilterEmail(string $filterEmail): self
    {
        $self = clone $this;
        $self['filterEmail'] = $filterEmail;

        return $self;
    }

    /**
     * Filter by user status.
     *
     * @param FilterUserStatus|value-of<FilterUserStatus> $filterUserStatus
     */
    public function withFilterUserStatus(
        FilterUserStatus|string $filterUserStatus
    ): self {
        $self = clone $this;
        $self['filterUserStatus'] = $filterUserStatus;

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

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
