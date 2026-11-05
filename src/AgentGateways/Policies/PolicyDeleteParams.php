<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a policy and every version of it, and returns it as it was. A policy that an attachment names, or that another policy builds on, cannot be deleted.
 *
 * @see Telnyx\Services\AgentGateways\PoliciesService::delete()
 *
 * @phpstan-type PolicyDeleteParamsShape = array{instanceID: string}
 */
final class PolicyDeleteParams implements BaseModel
{
    /** @use SdkModel<PolicyDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new PolicyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyDeleteParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyDeleteParams)->withInstanceID(...)
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
