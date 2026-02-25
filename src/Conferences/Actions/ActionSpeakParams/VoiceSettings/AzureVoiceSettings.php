<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings;

use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\AzureVoiceSettings\Effect;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\AzureVoiceSettings\Gender;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AzureVoiceSettingsShape = array{
 *   type: 'azure',
 *   apiKeyRef?: string|null,
 *   deploymentID?: string|null,
 *   effect?: null|Effect|value-of<Effect>,
 *   gender?: null|Gender|value-of<Gender>,
 *   region?: string|null,
 * }
 */
final class AzureVoiceSettings implements BaseModel
{
    /** @use SdkModel<AzureVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'azure' $type
     */
    #[Required]
    public string $type = 'azure';

    /**
     * The `identifier` for an integration secret that refers to your Azure Speech API key.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * The deployment ID for a custom Azure neural voice.
     */
    #[Optional('deployment_id')]
    public ?string $deploymentID;

    /**
     * Audio effect to apply.
     *
     * @var value-of<Effect>|null $effect
     */
    #[Optional(enum: Effect::class)]
    public ?string $effect;

    /**
     * Voice gender filter.
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    /**
     * The Azure region for the Speech service (e.g., `eastus`, `westeurope`). Required when using a custom API key.
     */
    #[Optional]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Effect|value-of<Effect>|null $effect
     * @param Gender|value-of<Gender>|null $gender
     */
    public static function with(
        ?string $apiKeyRef = null,
        ?string $deploymentID = null,
        Effect|string|null $effect = null,
        Gender|string|null $gender = null,
        ?string $region = null,
    ): self {
        $self = new self;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $deploymentID && $self['deploymentID'] = $deploymentID;
        null !== $effect && $self['effect'] = $effect;
        null !== $gender && $self['gender'] = $gender;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'azure' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The `identifier` for an integration secret that refers to your Azure Speech API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The deployment ID for a custom Azure neural voice.
     */
    public function withDeploymentID(string $deploymentID): self
    {
        $self = clone $this;
        $self['deploymentID'] = $deploymentID;

        return $self;
    }

    /**
     * Audio effect to apply.
     *
     * @param Effect|value-of<Effect> $effect
     */
    public function withEffect(Effect|string $effect): self
    {
        $self = clone $this;
        $self['effect'] = $effect;

        return $self;
    }

    /**
     * Voice gender filter.
     *
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * The Azure region for the Speech service (e.g., `eastus`, `westeurope`). Required when using a custom API key.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
