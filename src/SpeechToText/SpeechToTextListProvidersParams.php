<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\ServiceType;

/**
 * Retrieve the canonical list of supported speech-to-text providers, models, accepted language codes, and the service types each model supports.
 *
 * Service types:
 *   * `streaming` — standalone WebSocket transcription via `/speech-to-text/transcription`.
 *   * `file_transcription` — file-based transcription via `/ai/audio/transcriptions`.
 *   * `in_call_transcription` — live call transcription via Call Control `transcription_start`.
 *
 * Use this endpoint to discover which (provider, model) combinations are available for the surface you need, and which language codes each accepts. `auto` in a `languages` array indicates the provider performs language detection.
 *
 * @see Telnyx\Services\SpeechToTextService::listProviders()
 *
 * @phpstan-type SpeechToTextListProvidersParamsShape = array{
 *   provider?: null|Provider|value-of<Provider>,
 *   serviceType?: null|ServiceType|value-of<ServiceType>,
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
     * Filter to entries that support the given service type.
     *
     * @var value-of<ServiceType>|null $serviceType
     */
    #[Optional(enum: ServiceType::class)]
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
     * @param ServiceType|value-of<ServiceType>|null $serviceType
     */
    public static function with(
        Provider|string|null $provider = null,
        ServiceType|string|null $serviceType = null
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
     * Filter to entries that support the given service type.
     *
     * @param ServiceType|value-of<ServiceType> $serviceType
     */
    public function withServiceType(ServiceType|string $serviceType): self
    {
        $self = clone $this;
        $self['serviceType'] = $serviceType;

        return $self;
    }
}
