<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TranscriptionSettingsConfigShape from \Telnyx\AI\Assistants\TranscriptionSettingsConfig
 *
 * @phpstan-type TranscriptionSettingsShape = array{
 *   language?: string|null,
 *   model?: null|Model|value-of<Model>,
 *   region?: string|null,
 *   settings?: null|TranscriptionSettingsConfig|TranscriptionSettingsConfigShape,
 * }
 */
final class TranscriptionSettings implements BaseModel
{
    /** @use SdkModel<TranscriptionSettingsShape> */
    use SdkModel;

    /**
     * The language of the audio to be transcribed. If not set, of if set to `auto`, the model will automatically detect the language.
     */
    #[Optional]
    public ?string $language;

    /**
     * The speech to text model to be used by the voice assistant. All the deepgram models are run on-premise.
     *
     * - `deepgram/flux` is optimized for turn-taking but is English-only.
     * - `deepgram/nova-3` is multi-lingual with automatic language detection but slightly higher latency.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models.
     */
    #[Optional]
    public ?string $region;

    #[Optional]
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
     * @param TranscriptionSettingsConfigShape $settings
     */
    public static function with(
        ?string $language = null,
        Model|string|null $model = null,
        ?string $region = null,
        TranscriptionSettingsConfig|array|null $settings = null,
    ): self {
        $self = new self;

        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;
        null !== $region && $self['region'] = $region;
        null !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * The language of the audio to be transcribed. If not set, of if set to `auto`, the model will automatically detect the language.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
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
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * @param TranscriptionSettingsConfigShape $settings
     */
    public function withSettings(
        TranscriptionSettingsConfig|array $settings
    ): self {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
