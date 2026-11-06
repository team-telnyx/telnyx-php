<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayAPIShape from \Telnyx\AgentGateways\APIs\AgentGatewayAPI
 *
 * @phpstan-type APIListResponseShape = array{
 *   data: list<AgentGatewayAPI|AgentGatewayAPIShape>
 * }
 */
final class APIListResponse implements BaseModel
{
    /** @use SdkModel<APIListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayAPI> $data */
    #[Required(list: AgentGatewayAPI::class)]
    public array $data;

    /**
     * `new APIListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIListResponse)->withData(...)
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
     * @param list<AgentGatewayAPI|AgentGatewayAPIShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayAPI|AgentGatewayAPIShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
