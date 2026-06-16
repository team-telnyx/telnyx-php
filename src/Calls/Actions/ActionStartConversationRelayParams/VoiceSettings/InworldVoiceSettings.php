<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings;

use Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings\InworldVoiceSettings\DeliveryMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InworldVoiceSettingsShape = array{
 *   type: 'inworld', deliveryMode?: null|DeliveryMode|value-of<DeliveryMode>
 * }
 */
final class InworldVoiceSettings implements BaseModel
{
    /** @use SdkModel<InworldVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'inworld' $type
     */
    #[Required]
    public string $type = 'inworld';

    /**
     * Controls the expressiveness and consistency of the Inworld `TTS2` model's speech synthesis. `STABLE` favors consistent, predictable output, `CREATIVE` allows more expressive variation, and `BALANCED` sits in between. Optional and only supported by `TTS2`; when omitted, the provider default applies.
     *
     * @var value-of<DeliveryMode>|null $deliveryMode
     */
    #[Optional('delivery_mode', enum: DeliveryMode::class)]
    public ?string $deliveryMode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DeliveryMode|value-of<DeliveryMode>|null $deliveryMode
     */
    public static function with(DeliveryMode|string|null $deliveryMode = null): self
    {
        $self = new self;

        null !== $deliveryMode && $self['deliveryMode'] = $deliveryMode;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'inworld' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Controls the expressiveness and consistency of the Inworld `TTS2` model's speech synthesis. `STABLE` favors consistent, predictable output, `CREATIVE` allows more expressive variation, and `BALANCED` sits in between. Optional and only supported by `TTS2`; when omitted, the provider default applies.
     *
     * @param DeliveryMode|value-of<DeliveryMode> $deliveryMode
     */
    public function withDeliveryMode(DeliveryMode|string $deliveryMode): self
    {
        $self = clone $this;
        $self['deliveryMode'] = $deliveryMode;

        return $self;
    }
}
