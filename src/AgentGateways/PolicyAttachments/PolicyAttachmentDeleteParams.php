<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\PolicyAttachments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes an attachment and returns it as it was. The policy stays.
 *
 * @see Telnyx\Services\AgentGateways\PolicyAttachmentsService::delete()
 *
 * @phpstan-type PolicyAttachmentDeleteParamsShape = array{instanceID: string}
 */
final class PolicyAttachmentDeleteParams implements BaseModel
{
    /** @use SdkModel<PolicyAttachmentDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new PolicyAttachmentDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyAttachmentDeleteParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyAttachmentDeleteParams)->withInstanceID(...)
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
