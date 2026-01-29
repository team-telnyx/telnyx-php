<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Email;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\OrganizationName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq].
 *
 * @phpstan-import-type EmailShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Email
 * @phpstan-import-type OrganizationNameShape from \Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\OrganizationName
 *
 * @phpstan-type FilterShape = array{
 *   email?: null|Email|EmailShape,
 *   organizationName?: null|OrganizationName|OrganizationNameShape,
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
     */
    public static function with(
        Email|array|null $email = null,
        OrganizationName|array|null $organizationName = null
    ): self {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $organizationName && $self['organizationName'] = $organizationName;

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
}
