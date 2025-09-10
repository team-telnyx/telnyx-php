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
 * @phpstan-type filter_alias = array{
 *   email?: Email|null, organizationName?: OrganizationName|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Email $email;

    #[Api('organization_name', optional: true)]
    public ?OrganizationName $organizationName;

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
        ?OrganizationName $organizationName = null
    ): self {
        $obj = new self;

        null !== $email && $obj->email = $email;
        null !== $organizationName && $obj->organizationName = $organizationName;

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
        $obj->organizationName = $organizationName;

        return $obj;
    }
}
