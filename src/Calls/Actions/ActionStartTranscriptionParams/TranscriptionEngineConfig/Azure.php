<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Azure\Language;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Azure\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AzureShape = array{
 *   region: value-of<Region>,
 *   transcriptionEngine?: 'Azure',
 *   apiKeyRef?: string|null,
 *   language?: value-of<Language>|null,
 * }
 */
final class Azure implements BaseModel
{
    /** @use SdkModel<AzureShape> */
    use SdkModel;

    /**
     * Engine identifier for Azure transcription service.
     *
     * @var 'Azure' $transcriptionEngine
     */
    #[Required('transcription_engine')]
    public string $transcriptionEngine = 'Azure';

    /**
     * Azure region to use for speech recognition.
     *
     * @var value-of<Region> $region
     */
    #[Required(enum: Region::class)]
    public string $region;

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
     * `new Azure()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Azure::with(region: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Azure)->withRegion(...)
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
     * @param Language|value-of<Language> $language
     */
    public static function with(
        Region|string $region,
        ?string $apiKeyRef = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['region'] = $region;

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
