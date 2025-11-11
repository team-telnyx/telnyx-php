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
     */
    public static function with(
        ?Email $email = null,
        ?OrganizationName $organization_name = null
    ): self {
        $obj = new self;

        null !== $email && $obj->email = $email;
        null !== $organization_name && $obj->organization_name = $organization_name;

        return $obj;
    }

    public function withEmail(Email $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withOrganizationName(
        OrganizationName $organizationName
    ): self {
        $obj = clone $this;
        $obj->organization_name = $organizationName;

        return $obj;
    }
}
