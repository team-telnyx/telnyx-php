<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type issued_to = array{
 *   commonName?: string, organization?: string, organizationUnit?: string
 * }
 */
final class IssuedTo implements BaseModel
{
    /** @use SdkModel<issued_to> */
    use SdkModel;

    /**
     * The common name of the entity the certificate was issued to.
     */
    #[Api('common_name', optional: true)]
    public ?string $commonName;

    /**
     * The organization the certificate was issued to.
     */
    #[Api(optional: true)]
    public ?string $organization;

    /**
     * The organizational unit the certificate was issued to.
     */
    #[Api('organization_unit', optional: true)]
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

        null !== $commonName && $obj->commonName = $commonName;
        null !== $organization && $obj->organization = $organization;
        null !== $organizationUnit && $obj->organizationUnit = $organizationUnit;

        return $obj;
    }

    /**
     * The common name of the entity the certificate was issued to.
     */
    public function withCommonName(string $commonName): self
    {
        $obj = clone $this;
        $obj->commonName = $commonName;

        return $obj;
    }

    /**
     * The organization the certificate was issued to.
     */
    public function withOrganization(string $organization): self
    {
        $obj = clone $this;
        $obj->organization = $organization;

        return $obj;
    }

    /**
     * The organizational unit the certificate was issued to.
     */
    public function withOrganizationUnit(string $organizationUnit): self
    {
        $obj = clone $this;
        $obj->organizationUnit = $organizationUnit;

        return $obj;
    }
}
