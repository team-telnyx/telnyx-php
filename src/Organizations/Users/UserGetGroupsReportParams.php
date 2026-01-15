<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Organizations\Users\UserGetGroupsReportParams\Accept;

/**
 * Returns a report of all users in your organization with their group memberships. This endpoint returns all users without pagination and always includes group information. The report can be retrieved in JSON or CSV format by sending specific content-type headers.
 *
 * @see Telnyx\Services\Organizations\UsersService::getGroupsReport()
 *
 * @phpstan-type UserGetGroupsReportParamsShape = array{
 *   accept?: null|Accept|value-of<Accept>
 * }
 */
final class UserGetGroupsReportParams implements BaseModel
{
    /** @use SdkModel<UserGetGroupsReportParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Accept>|null $accept */
    #[Optional(enum: Accept::class)]
    public ?string $accept;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Accept|value-of<Accept>|null $accept
     */
    public static function with(Accept|string|null $accept = null): self
    {
        $self = new self;

        null !== $accept && $self['accept'] = $accept;

        return $self;
    }

    /**
     * @param Accept|value-of<Accept> $accept
     */
    public function withAccept(Accept|string $accept): self
    {
        $self = clone $this;
        $self['accept'] = $accept;

        return $self;
    }
}
