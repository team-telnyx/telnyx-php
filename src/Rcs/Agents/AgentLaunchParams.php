<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentLaunchParams\Campaign;

/**
 * Adds the campaign and testing configuration, then starts asynchronous carrier launch. Agent basics must already be submitted. Repeating a launch that is already in progress returns the current agent without creating new work.
 *
 * @see Telnyx\Services\Rcs\AgentsService::launch()
 *
 * @phpstan-import-type CampaignShape from \Telnyx\Rcs\Agents\AgentLaunchParams\Campaign
 * @phpstan-import-type AgentTestingConfigurationShape from \Telnyx\Rcs\Agents\AgentTestingConfiguration
 *
 * @phpstan-type AgentLaunchParamsShape = array{
 *   campaign: Campaign|CampaignShape,
 *   testing: AgentTestingConfiguration|AgentTestingConfigurationShape,
 * }
 */
final class AgentLaunchParams implements BaseModel
{
    /** @use SdkModel<AgentLaunchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Campaign $campaign;

    #[Required]
    public AgentTestingConfiguration $testing;

    /**
     * `new AgentLaunchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentLaunchParams::with(campaign: ..., testing: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentLaunchParams)->withCampaign(...)->withTesting(...)
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
     * @param Campaign|CampaignShape $campaign
     * @param AgentTestingConfiguration|AgentTestingConfigurationShape $testing
     */
    public static function with(
        Campaign|array $campaign,
        AgentTestingConfiguration|array $testing
    ): self {
        $self = new self;

        $self['campaign'] = $campaign;
        $self['testing'] = $testing;

        return $self;
    }

    /**
     * @param Campaign|CampaignShape $campaign
     */
    public function withCampaign(Campaign|array $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * @param AgentTestingConfiguration|AgentTestingConfigurationShape $testing
     */
    public function withTesting(AgentTestingConfiguration|array $testing): self
    {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }
}
