<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve the full detail of a remediation request, including current status, per-number results (once available), and submission metadata.
 *
 * @see Telnyx\Services\Enterprises\Reputation\RemediationService::retrieve()
 *
 * @phpstan-type RemediationRetrieveParamsShape = array{enterpriseID: string}
 */
final class RemediationRetrieveParams implements BaseModel
{
    /** @use SdkModel<RemediationRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * `new RemediationRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationRetrieveParams::with(enterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationRetrieveParams)->withEnterpriseID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $enterpriseID): self
    {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }
}
