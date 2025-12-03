<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\Language;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\Region;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig\TranscriptionEngine;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionEngineAzureConfigShape = array{
 *   region: value-of<Region>,
 *   transcription_engine: value-of<TranscriptionEngine>,
 *   api_key_ref?: string|null,
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
    #[Api(enum: Region::class)]
    public string $region;

    /**
     * Engine identifier for Azure transcription service.
     *
     * @var value-of<TranscriptionEngine> $transcription_engine
     */
    #[Api(enum: TranscriptionEngine::class)]
    public string $transcription_engine;

    /**
     * Reference to the API key for authentication. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. The parameter is optional as defaults are available for some regions.
     */
    #[Api(optional: true)]
    public ?string $api_key_ref;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * `new TranscriptionEngineAzureConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptionEngineAzureConfig::with(region: ..., transcription_engine: ...)
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
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcription_engine
     * @param Language|value-of<Language> $language
     */
    public static function with(
        Region|string $region,
        TranscriptionEngine|string $transcription_engine,
        ?string $api_key_ref = null,
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['region'] = $region;
        $obj['transcription_engine'] = $transcription_engine;

        null !== $api_key_ref && $obj->api_key_ref = $api_key_ref;
        null !== $language && $obj['language'] = $language;

        return $obj;
    }

    /**
     * Azure region to use for speech recognition.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Engine identifier for Azure transcription service.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $obj = clone $this;
        $obj['transcription_engine'] = $transcriptionEngine;

        return $obj;
    }

    /**
     * Reference to the API key for authentication. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. The parameter is optional as defaults are available for some regions.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }
}
