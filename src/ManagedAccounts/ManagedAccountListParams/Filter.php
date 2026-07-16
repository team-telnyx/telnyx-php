<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Email;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\OrganizationName;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq], filter[status][eq].
 *
 * @phpstan-import-type EmailShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Email
 * @phpstan-import-type OrganizationNameShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\OrganizationName
 * @phpstan-import-type StatusShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Status
 *
 * @phpstan-type FilterShape = array{
 *   email?: null|Email|EmailShape,
 *   organizationName?: null|OrganizationName|OrganizationNameShape,
 *   status?: null|Status|StatusShape,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?Email $email;

    #[Optional('organization_name')]
    public ?OrganizationName $organizationName;

    #[Optional]
    public ?Status $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Email|EmailShape|null $email
     * @param OrganizationName|OrganizationNameShape|null $organizationName
     * @param Status|StatusShape|null $status
     */
    public static function with(
        Email|array|null $email = null,
        OrganizationName|array|null $organizationName = null,
        Status|array|null $status = null,
    ): self {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $organizationName && $self['organizationName'] = $organizationName;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param Email|EmailShape $email
     */
    public function withEmail(Email|array $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * @param OrganizationName|OrganizationNameShape $organizationName
     */
    public function withOrganizationName(
        OrganizationName|array $organizationName
    ): self {
        $self = clone $this;
        $self['organizationName'] = $organizationName;

        return $self;
    }

    /**
     * @param Status|StatusShape $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
