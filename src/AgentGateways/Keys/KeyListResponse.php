<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayKeyShape from \Telnyx\AgentGateways\Keys\AgentGatewayKey
 *
 * @phpstan-type KeyListResponseShape = array{
 *   data: list<AgentGatewayKey|AgentGatewayKeyShape>
 * }
 */
final class KeyListResponse implements BaseModel
{
    /** @use SdkModel<KeyListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayKey> $data */
    #[Required(list: AgentGatewayKey::class)]
    public array $data;

    /**
     * `new KeyListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyListResponse)->withData(...)
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
     * @param list<AgentGatewayKey|AgentGatewayKeyShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayKey|AgentGatewayKeyShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
