<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\PolicyAttachments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayPolicyAttachmentShape from \Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachment
 *
 * @phpstan-type AgentGatewayPolicyAttachmentResponseShape = array{
 *   data: AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape
 * }
 */
final class AgentGatewayPolicyAttachmentResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyAttachmentResponseShape> */
    use SdkModel;

    /**
     * Where an instance applies a policy.
     */
    #[Required]
    public AgentGatewayPolicyAttachment $data;

    /**
     * `new AgentGatewayPolicyAttachmentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicyAttachmentResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicyAttachmentResponse)->withData(...)
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
     *
     * @param AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape $data
     */
    public static function with(AgentGatewayPolicyAttachment|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Where an instance applies a policy.
     *
     * @param AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape $data
     */
    public function withData(AgentGatewayPolicyAttachment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
