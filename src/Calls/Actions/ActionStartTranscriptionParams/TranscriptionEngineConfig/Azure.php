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
 *   transcription_engine: 'Azure',
 *   api_key_ref?: string|null,
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
     * @var 'Azure' $transcription_engine
     */
    #[Required]
    public string $transcription_engine = 'Azure';

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
    #[Optional]
    public ?string $api_key_ref;

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
        ?string $api_key_ref = null,
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['region'] = $region;

        null !== $api_key_ref && $obj['api_key_ref'] = $api_key_ref;
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
     * Reference to the API key for authentication. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. The parameter is optional as defaults are available for some regions.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['api_key_ref'] = $apiKeyRef;

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
