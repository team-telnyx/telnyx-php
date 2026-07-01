<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;

/**
 * Retrieve the canonical list of supported speech-to-text providers, models, accepted language codes, and the service types each model supports.
 *
 * Service types:
 *   * `streaming` — standalone WebSocket transcription via `/speech-to-text/transcription`.
 *   * `file_based` — file-based transcription via `/ai/audio/transcriptions`.
 *   * `in_call` — live call transcription via Call Control `transcription_start`.
 *   * `ai_assistant` — STT configured on a Call Control AI Assistant via voice-assistant `TranscriptionConfig` (covers both live-streaming and non-streaming/batch models).
 *
 * Use this endpoint to discover which (provider, model) combinations are available for the surface you need, and which language codes each accepts. `auto` in a `languages` array indicates the provider performs language detection.
 *
 * @see Telnyx\Services\SpeechToTextService::listProviders()
 *
 * @phpstan-type SpeechToTextListProvidersParamsShape = array{
 *   provider?: null|Provider|value-of<Provider>,
 *   serviceType?: null|SttServiceType|value-of<SttServiceType>,
 * }
 */
final class SpeechToTextListProvidersParams implements BaseModel
{
    /** @use SdkModel<SpeechToTextListProvidersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
     *
     * @var value-of<SttServiceType>|null $serviceType
     */
    #[Optional(enum: SttServiceType::class)]
    public ?string $serviceType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Provider|value-of<Provider>|null $provider
     * @param SttServiceType|value-of<SttServiceType>|null $serviceType
     */
    public static function with(
        Provider|string|null $provider = null,
        SttServiceType|string|null $serviceType = null
    ): self {
        $self = new self;

        null !== $provider && $self['provider'] = $provider;
        null !== $serviceType && $self['serviceType'] = $serviceType;

        return $self;
    }

    /**
     * Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
     *
     * @param SttServiceType|value-of<SttServiceType> $serviceType
     */
    public function withServiceType(SttServiceType|string $serviceType): self
    {
        $self = clone $this;
        $self['serviceType'] = $serviceType;

        return $self;
    }
}
