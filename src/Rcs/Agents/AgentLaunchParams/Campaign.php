<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentLaunchParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentConsentConfiguration;
use Telnyx\Rcs\Agents\AgentInteraction;

/**
 * @phpstan-import-type AgentConsentConfigurationShape from \Telnyx\Rcs\Agents\AgentConsentConfiguration
 * @phpstan-import-type AgentInteractionShape from \Telnyx\Rcs\Agents\AgentInteraction
 *
 * @phpstan-type CampaignShape = array{
 *   companyOverview: string,
 *   additionalInformation?: string|null,
 *   agentOverview?: string|null,
 *   consentSettings?: null|AgentConsentConfiguration|AgentConsentConfigurationShape,
 *   interactions?: list<AgentInteraction|AgentInteractionShape>|null,
 *   messageExamples?: list<string>|null,
 * }
 */
final class Campaign implements BaseModel
{
    /** @use SdkModel<CampaignShape> */
    use SdkModel;

    #[Required('company_overview')]
    public string $companyOverview;

    #[Optional('additional_information', nullable: true)]
    public ?string $additionalInformation;

    #[Optional('agent_overview', nullable: true)]
    public ?string $agentOverview;

    #[Optional('consent_settings')]
    public ?AgentConsentConfiguration $consentSettings;

    /** @var list<AgentInteraction>|null $interactions */
    #[Optional(list: AgentInteraction::class)]
    public ?array $interactions;

    /** @var list<string>|null $messageExamples */
    #[Optional('message_examples', list: 'string')]
    public ?array $messageExamples;

    /**
     * `new Campaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Campaign::with(companyOverview: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Campaign)->withCompanyOverview(...)
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
     * @param AgentConsentConfiguration|AgentConsentConfigurationShape|null $consentSettings
     * @param list<AgentInteraction|AgentInteractionShape>|null $interactions
     * @param list<string>|null $messageExamples
     */
    public static function with(
        string $companyOverview,
        ?string $additionalInformation = null,
        ?string $agentOverview = null,
        AgentConsentConfiguration|array|null $consentSettings = null,
        ?array $interactions = null,
        ?array $messageExamples = null,
    ): self {
        $self = new self;

        $self['companyOverview'] = $companyOverview;

        null !== $additionalInformation && $self['additionalInformation'] = $additionalInformation;
        null !== $agentOverview && $self['agentOverview'] = $agentOverview;
        null !== $consentSettings && $self['consentSettings'] = $consentSettings;
        null !== $interactions && $self['interactions'] = $interactions;
        null !== $messageExamples && $self['messageExamples'] = $messageExamples;

        return $self;
    }

    public function withCompanyOverview(string $companyOverview): self
    {
        $self = clone $this;
        $self['companyOverview'] = $companyOverview;

        return $self;
    }

    public function withAdditionalInformation(
        ?string $additionalInformation
    ): self {
        $self = clone $this;
        $self['additionalInformation'] = $additionalInformation;

        return $self;
    }

    public function withAgentOverview(?string $agentOverview): self
    {
        $self = clone $this;
        $self['agentOverview'] = $agentOverview;

        return $self;
    }

    /**
     * @param AgentConsentConfiguration|AgentConsentConfigurationShape $consentSettings
     */
    public function withConsentSettings(
        AgentConsentConfiguration|array $consentSettings
    ): self {
        $self = clone $this;
        $self['consentSettings'] = $consentSettings;

        return $self;
    }

    /**
     * @param list<AgentInteraction|AgentInteractionShape> $interactions
     */
    public function withInteractions(array $interactions): self
    {
        $self = clone $this;
        $self['interactions'] = $interactions;

        return $self;
    }

    /**
     * @param list<string> $messageExamples
     */
    public function withMessageExamples(array $messageExamples): self
    {
        $self = clone $this;
        $self['messageExamples'] = $messageExamples;

        return $self;
    }
}
