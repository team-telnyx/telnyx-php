<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IssuedByShape = array{
 *   common_name?: string|null,
 *   organization?: string|null,
 *   organization_unit?: string|null,
 * }
 */
final class IssuedBy implements BaseModel
{
    /** @use SdkModel<IssuedByShape> */
    use SdkModel;

    /**
     * The common name of the entity the certificate was issued by.
     */
    #[Optional]
    public ?string $common_name;

    /**
     * The organization the certificate was issued by.
     */
    #[Optional]
    public ?string $organization;

    /**
     * The organizational unit the certificate was issued by.
     */
    #[Optional]
    public ?string $organization_unit;

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
        ?string $common_name = null,
        ?string $organization = null,
        ?string $organization_unit = null,
    ): self {
        $obj = new self;

        null !== $common_name && $obj['common_name'] = $common_name;
        null !== $organization && $obj['organization'] = $organization;
        null !== $organization_unit && $obj['organization_unit'] = $organization_unit;

        return $obj;
    }

    /**
     * The common name of the entity the certificate was issued by.
     */
    public function withCommonName(string $commonName): self
    {
        $obj = clone $this;
        $obj['common_name'] = $commonName;

        return $obj;
    }

    /**
     * The organization the certificate was issued by.
     */
    public function withOrganization(string $organization): self
    {
        $obj = clone $this;
        $obj['organization'] = $organization;

        return $obj;
    }

    /**
     * The organizational unit the certificate was issued by.
     */
    public function withOrganizationUnit(string $organizationUnit): self
    {
        $obj = clone $this;
        $obj['organization_unit'] = $organizationUnit;

        return $obj;
    }
}
