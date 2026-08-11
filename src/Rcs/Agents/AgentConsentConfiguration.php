<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentConsentConfiguration\OptInMethod;

/**
 * @phpstan-import-type OptInMethodShape from \Telnyx\Rcs\Agents\AgentConsentConfiguration\OptInMethod
 *
 * @phpstan-type AgentConsentConfigurationShape = array{
 *   callToAction: string,
 *   doubleOptIn: bool,
 *   helpResponse: string,
 *   optInMessage: string,
 *   optInMethods: list<OptInMethod|OptInMethodShape>,
 *   optOutResponse: string,
 *   callToActionMediaURL?: string|null,
 *   callToActionURL?: string|null,
 *   doubleOptInMessage?: string|null,
 * }
 */
final class AgentConsentConfiguration implements BaseModel
{
    /** @use SdkModel<AgentConsentConfigurationShape> */
    use SdkModel;

    #[Required('call_to_action')]
    public string $callToAction;

    #[Required('double_opt_in')]
    public bool $doubleOptIn;

    #[Required('help_response')]
    public string $helpResponse;

    #[Required('opt_in_message')]
    public string $optInMessage;

    /** @var list<OptInMethod> $optInMethods */
    #[Required('opt_in_methods', list: OptInMethod::class)]
    public array $optInMethods;

    #[Required('opt_out_response')]
    public string $optOutResponse;

    /**
     * Required when an opt-in method is `WEBSITE` or `MOBILE_APP`.
     */
    #[Optional('call_to_action_media_url', nullable: true)]
    public ?string $callToActionMediaURL;

    /**
     * Required when an opt-in method is `WEBSITE`.
     */
    #[Optional('call_to_action_url', nullable: true)]
    public ?string $callToActionURL;

    /**
     * Required when double_opt_in is true.
     */
    #[Optional('double_opt_in_message', nullable: true)]
    public ?string $doubleOptInMessage;

    /**
     * `new AgentConsentConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentConsentConfiguration::with(
     *   callToAction: ...,
     *   doubleOptIn: ...,
     *   helpResponse: ...,
     *   optInMessage: ...,
     *   optInMethods: ...,
     *   optOutResponse: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentConsentConfiguration)
     *   ->withCallToAction(...)
     *   ->withDoubleOptIn(...)
     *   ->withHelpResponse(...)
     *   ->withOptInMessage(...)
     *   ->withOptInMethods(...)
     *   ->withOptOutResponse(...)
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
     * @param list<OptInMethod|OptInMethodShape> $optInMethods
     */
    public static function with(
        string $callToAction,
        bool $doubleOptIn,
        string $helpResponse,
        string $optInMessage,
        array $optInMethods,
        string $optOutResponse,
        ?string $callToActionMediaURL = null,
        ?string $callToActionURL = null,
        ?string $doubleOptInMessage = null,
    ): self {
        $self = new self;

        $self['callToAction'] = $callToAction;
        $self['doubleOptIn'] = $doubleOptIn;
        $self['helpResponse'] = $helpResponse;
        $self['optInMessage'] = $optInMessage;
        $self['optInMethods'] = $optInMethods;
        $self['optOutResponse'] = $optOutResponse;

        null !== $callToActionMediaURL && $self['callToActionMediaURL'] = $callToActionMediaURL;
        null !== $callToActionURL && $self['callToActionURL'] = $callToActionURL;
        null !== $doubleOptInMessage && $self['doubleOptInMessage'] = $doubleOptInMessage;

        return $self;
    }

    public function withCallToAction(string $callToAction): self
    {
        $self = clone $this;
        $self['callToAction'] = $callToAction;

        return $self;
    }

    public function withDoubleOptIn(bool $doubleOptIn): self
    {
        $self = clone $this;
        $self['doubleOptIn'] = $doubleOptIn;

        return $self;
    }

    public function withHelpResponse(string $helpResponse): self
    {
        $self = clone $this;
        $self['helpResponse'] = $helpResponse;

        return $self;
    }

    public function withOptInMessage(string $optInMessage): self
    {
        $self = clone $this;
        $self['optInMessage'] = $optInMessage;

        return $self;
    }

    /**
     * @param list<OptInMethod|OptInMethodShape> $optInMethods
     */
    public function withOptInMethods(array $optInMethods): self
    {
        $self = clone $this;
        $self['optInMethods'] = $optInMethods;

        return $self;
    }

    public function withOptOutResponse(string $optOutResponse): self
    {
        $self = clone $this;
        $self['optOutResponse'] = $optOutResponse;

        return $self;
    }

    /**
     * Required when an opt-in method is `WEBSITE` or `MOBILE_APP`.
     */
    public function withCallToActionMediaURL(
        ?string $callToActionMediaURL
    ): self {
        $self = clone $this;
        $self['callToActionMediaURL'] = $callToActionMediaURL;

        return $self;
    }

    /**
     * Required when an opt-in method is `WEBSITE`.
     */
    public function withCallToActionURL(?string $callToActionURL): self
    {
        $self = clone $this;
        $self['callToActionURL'] = $callToActionURL;

        return $self;
    }

    /**
     * Required when double_opt_in is true.
     */
    public function withDoubleOptInMessage(?string $doubleOptInMessage): self
    {
        $self = clone $this;
        $self['doubleOptInMessage'] = $doubleOptInMessage;

        return $self;
    }
}
