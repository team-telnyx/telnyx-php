<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionSettingsShape = array{
 *   language?: string|null,
 *   model?: value-of<Model>|null,
 *   region?: string|null,
 *   settings?: TranscriptionSettingsConfig|null,
 * }
 */
final class TranscriptionSettings implements BaseModel
{
    /** @use SdkModel<TranscriptionSettingsShape> */
    use SdkModel;

    /**
     * The language of the audio to be transcribed. If not set, of if set to `auto`, the model will automatically detect the language.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * The speech to text model to be used by the voice assistant. All the deepgram models are run on-premise.
     *
     * - `deepgram/flux` is optimized for turn-taking but is English-only.
     * - `deepgram/nova-3` is multi-lingual with automatic language detection but slightly higher latency.
     *
     * @var value-of<Model>|null $model
     */
    #[Api(enum: Model::class, optional: true)]
    public ?string $model;

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models.
     */
    #[Api(optional: true)]
    public ?string $region;

    #[Api(optional: true)]
    public ?TranscriptionSettingsConfig $settings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Model|value-of<Model> $model
     */
    public static function with(
        ?string $language = null,
        Model|string|null $model = null,
        ?string $region = null,
        ?TranscriptionSettingsConfig $settings = null,
    ): self {
        $obj = new self;

        null !== $language && $obj->language = $language;
        null !== $model && $obj['model'] = $model;
        null !== $region && $obj->region = $region;
        null !== $settings && $obj->settings = $settings;

        return $obj;
    }

    /**
     * The language of the audio to be transcribed. If not set, of if set to `auto`, the model will automatically detect the language.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * The speech to text model to be used by the voice assistant. All the deepgram models are run on-premise.
     *
     * - `deepgram/flux` is optimized for turn-taking but is English-only.
     * - `deepgram/nova-3` is multi-lingual with automatic language detection but slightly higher latency.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    public function withSettings(TranscriptionSettingsConfig $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }
}
