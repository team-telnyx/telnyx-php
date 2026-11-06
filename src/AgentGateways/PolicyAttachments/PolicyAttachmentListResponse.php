<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\PolicyAttachments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayPolicyAttachmentShape from \Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachment
 *
 * @phpstan-type PolicyAttachmentListResponseShape = array{
 *   data: list<AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape>
 * }
 */
final class PolicyAttachmentListResponse implements BaseModel
{
    /** @use SdkModel<PolicyAttachmentListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayPolicyAttachment> $data */
    #[Required(list: AgentGatewayPolicyAttachment::class)]
    public array $data;

    /**
     * `new PolicyAttachmentListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyAttachmentListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyAttachmentListResponse)->withData(...)
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
     * @param list<AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayPolicyAttachment|AgentGatewayPolicyAttachmentShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
