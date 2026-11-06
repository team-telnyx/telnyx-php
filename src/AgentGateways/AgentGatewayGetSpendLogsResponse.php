<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse\Data;
use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse\Meta
 *
 * @phpstan-type AgentGatewayGetSpendLogsResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class AgentGatewayGetSpendLogsResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayGetSpendLogsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new AgentGatewayGetSpendLogsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayGetSpendLogsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayGetSpendLogsResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
