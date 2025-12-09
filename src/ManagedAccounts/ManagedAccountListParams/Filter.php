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
 * @phpstan-type FilterShape = array{
 *   email?: Email|null, organizationName?: OrganizationName|null
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
     * @param Email|array{contains?: string|null, eq?: string|null} $email
     * @param OrganizationName|array{
     *   contains?: string|null, eq?: string|null
     * } $organizationName
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
     * @param Email|array{contains?: string|null, eq?: string|null} $email
     */
    public function withEmail(Email|array $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * @param OrganizationName|array{
     *   contains?: string|null, eq?: string|null
     * } $organizationName
     */
    public function withOrganizationName(
        OrganizationName|array $organizationName
    ): self {
        $self = clone $this;
        $self['organizationName'] = $organizationName;

        return $self;
    }
}
