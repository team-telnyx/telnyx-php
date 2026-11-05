<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayTeamShape from \Telnyx\AgentGateways\Teams\AgentGatewayTeam
 *
 * @phpstan-type TeamListResponseShape = array{
 *   data: list<AgentGatewayTeam|AgentGatewayTeamShape>
 * }
 */
final class TeamListResponse implements BaseModel
{
    /** @use SdkModel<TeamListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayTeam> $data */
    #[Required(list: AgentGatewayTeam::class)]
    public array $data;

    /**
     * `new TeamListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TeamListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TeamListResponse)->withData(...)
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
     * @param list<AgentGatewayTeam|AgentGatewayTeamShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayTeam|AgentGatewayTeamShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
