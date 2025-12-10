<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\Language;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\Region;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\TranscriptionEngine;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionEngineAzureConfigShape = array{
 *   region: value-of<Region>,
 *   transcriptionEngine: value-of<TranscriptionEngine>,
 *   apiKeyRef?: string|null,
 *   language?: value-of<Language>|null,
 * }
 */
final class TranscriptionEngineAzureConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionEngineAzureConfigShape> */
    use SdkModel;

    /**
     * Azure region to use for speech recognition.
     *
     * @var value-of<Region> $region
     */
    #[Required(enum: Region::class)]
    public string $region;

    /**
     * Engine identifier for Azure transcription service.
     *
     * @var value-of<TranscriptionEngine> $transcriptionEngine
     */
    #[Required('transcription_engine', enum: TranscriptionEngine::class)]
    public string $transcriptionEngine;

    /**
     * Reference to the API key for authentication. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. The parameter is optional as defaults are available for some regions.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * `new TranscriptionEngineAzureConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptionEngineAzureConfig::with(region: ..., transcriptionEngine: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptionEngineAzureConfig)
     *   ->withRegion(...)
     *   ->withTranscriptionEngine(...)
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
     * @param Region|value-of<Region> $region
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param Language|value-of<Language> $language
     */
    public static function with(
        Region|string $region,
        TranscriptionEngine|string $transcriptionEngine,
        ?string $apiKeyRef = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['region'] = $region;
        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * Azure region to use for speech recognition.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Engine identifier for Azure transcription service.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * Reference to the API key for authentication. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. The parameter is optional as defaults are available for some regions.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
