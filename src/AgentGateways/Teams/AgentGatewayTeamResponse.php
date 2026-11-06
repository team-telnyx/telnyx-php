<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayTeamShape from \Telnyx\AgentGateways\Teams\AgentGatewayTeam
 *
 * @phpstan-type AgentGatewayTeamResponseShape = array{
 *   data: AgentGatewayTeam|AgentGatewayTeamShape
 * }
 */
final class AgentGatewayTeamResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayTeamResponseShape> */
    use SdkModel;

    /**
     * A team on an instance: a model list, a budget, and rate limits that its keys share.
     */
    #[Required]
    public AgentGatewayTeam $data;

    /**
     * `new AgentGatewayTeamResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayTeamResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayTeamResponse)->withData(...)
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
     * @param AgentGatewayTeam|AgentGatewayTeamShape $data
     */
    public static function with(AgentGatewayTeam|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A team on an instance: a model list, a budget, and rate limits that its keys share.
     *
     * @param AgentGatewayTeam|AgentGatewayTeamShape $data
     */
    public function withData(AgentGatewayTeam|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
