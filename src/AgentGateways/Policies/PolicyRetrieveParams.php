<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns one policy, in its current version.
 *
 * @see Telnyx\Services\AgentGateways\PoliciesService::retrieve()
 *
 * @phpstan-type PolicyRetrieveParamsShape = array{instanceID: string}
 */
final class PolicyRetrieveParams implements BaseModel
{
    /** @use SdkModel<PolicyRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new PolicyRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyRetrieveParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyRetrieveParams)->withInstanceID(...)
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
    public static function with(string $instanceID): self
    {
        $self = new self;

        $self['instanceID'] = $instanceID;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

        return $self;
    }
}
