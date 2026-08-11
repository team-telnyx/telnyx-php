<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember0;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember1;
use Telnyx\Rcs\Agents\AgentConfiguration\Basics\UnionMember2;

/**
 * @phpstan-import-type BasicsVariants from \Telnyx\Rcs\Agents\AgentConfiguration\Basics
 * @phpstan-import-type BasicsShape from \Telnyx\Rcs\Agents\AgentConfiguration\Basics
 * @phpstan-import-type AgentCampaignConfigurationShape from \Telnyx\Rcs\Agents\AgentCampaignConfiguration
 * @phpstan-import-type AgentTestingConfigurationShape from \Telnyx\Rcs\Agents\AgentTestingConfiguration
 *
 * @phpstan-type AgentConfigurationShape = array{
 *   basics: BasicsShape,
 *   campaign?: null|AgentCampaignConfiguration|AgentCampaignConfigurationShape,
 *   testing?: null|AgentTestingConfiguration|AgentTestingConfigurationShape,
 * }
 */
final class AgentConfiguration implements BaseModel
{
    /** @use SdkModel<AgentConfigurationShape> */
    use SdkModel;

    /**
     * Basic agent identity and contact information. At least one complete phone, website, or email contact is required.
     *
     * @var BasicsVariants $basics
     */
    #[Required]
    public UnionMember0|UnionMember1|UnionMember2 $basics;

    #[Optional(nullable: true)]
    public ?AgentCampaignConfiguration $campaign;

    #[Optional(nullable: true)]
    public ?AgentTestingConfiguration $testing;

    /**
     * `new AgentConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentConfiguration::with(basics: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentConfiguration)->withBasics(...)
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
     * @param BasicsShape $basics
     * @param AgentCampaignConfiguration|AgentCampaignConfigurationShape|null $campaign
     * @param AgentTestingConfiguration|AgentTestingConfigurationShape|null $testing
     */
    public static function with(
        UnionMember0|array|UnionMember1|UnionMember2 $basics,
        AgentCampaignConfiguration|array|null $campaign = null,
        AgentTestingConfiguration|array|null $testing = null,
    ): self {
        $self = new self;

        $self['basics'] = $basics;

        null !== $campaign && $self['campaign'] = $campaign;
        null !== $testing && $self['testing'] = $testing;

        return $self;
    }

    /**
     * Basic agent identity and contact information. At least one complete phone, website, or email contact is required.
     *
     * @param BasicsShape $basics
     */
    public function withBasics(
        UnionMember0|array|UnionMember1|UnionMember2 $basics
    ): self {
        $self = clone $this;
        $self['basics'] = $basics;

        return $self;
    }

    /**
     * @param AgentCampaignConfiguration|AgentCampaignConfigurationShape|null $campaign
     */
    public function withCampaign(
        AgentCampaignConfiguration|array|null $campaign
    ): self {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * @param AgentTestingConfiguration|AgentTestingConfigurationShape|null $testing
     */
    public function withTesting(
        AgentTestingConfiguration|array|null $testing
    ): self {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }
}
