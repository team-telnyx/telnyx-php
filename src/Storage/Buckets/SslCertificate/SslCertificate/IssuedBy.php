<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IssuedByShape = array{
 *   commonName?: string|null,
 *   organization?: string|null,
 *   organizationUnit?: string|null,
 * }
 */
final class IssuedBy implements BaseModel
{
    /** @use SdkModel<IssuedByShape> */
    use SdkModel;

    /**
     * The common name of the entity the certificate was issued by.
     */
    #[Optional('common_name')]
    public ?string $commonName;

    /**
     * The organization the certificate was issued by.
     */
    #[Optional]
    public ?string $organization;

    /**
     * The organizational unit the certificate was issued by.
     */
    #[Optional('organization_unit')]
    public ?string $organizationUnit;

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
        ?string $commonName = null,
        ?string $organization = null,
        ?string $organizationUnit = null,
    ): self {
        $obj = new self;

        null !== $commonName && $obj['commonName'] = $commonName;
        null !== $organization && $obj['organization'] = $organization;
        null !== $organizationUnit && $obj['organizationUnit'] = $organizationUnit;

        return $obj;
    }

    /**
     * The common name of the entity the certificate was issued by.
     */
    public function withCommonName(string $commonName): self
    {
        $obj = clone $this;
        $obj['commonName'] = $commonName;

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
        $obj['organizationUnit'] = $organizationUnit;

        return $obj;
    }
}
