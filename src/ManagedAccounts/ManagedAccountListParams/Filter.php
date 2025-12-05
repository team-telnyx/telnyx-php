<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\Email;
use Telnyx\ManagedAccounts\ManagedAccountListParams\Filter\OrganizationName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[email][contains], filter[email][eq], filter[organization_name][contains], filter[organization_name][eq].
 *
 * @phpstan-type FilterShape = array{
 *   email?: Email|null, organization_name?: OrganizationName|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Email $email;

    #[Api(optional: true)]
    public ?OrganizationName $organization_name;

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
     * } $organization_name
     */
    public static function with(
        Email|array|null $email = null,
        OrganizationName|array|null $organization_name = null
    ): self {
        $obj = new self;

        null !== $email && $obj['email'] = $email;
        null !== $organization_name && $obj['organization_name'] = $organization_name;

        return $obj;
    }

    /**
     * @param Email|array{contains?: string|null, eq?: string|null} $email
     */
    public function withEmail(Email|array $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * @param OrganizationName|array{
     *   contains?: string|null, eq?: string|null
     * } $organizationName
     */
    public function withOrganizationName(
        OrganizationName|array $organizationName
    ): self {
        $obj = clone $this;
        $obj['organization_name'] = $organizationName;

        return $obj;
    }
}
