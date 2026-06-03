<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws\TextType;

/**
 * AWS Polly provider-specific parameters.
 *
 * @phpstan-type AwsShape = array{
 *   languageCode?: string|null,
 *   lexiconNames?: list<string>|null,
 *   outputFormat?: string|null,
 *   sampleRate?: string|null,
 *   textType?: null|\Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws\TextType|value-of<\Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws\TextType>,
 * }
 */
final class Aws implements BaseModel
{
    /** @use SdkModel<AwsShape> */
    use SdkModel;

    /**
     * Language code (e.g. `en-US`, `es-ES`).
     */
    #[Optional('language_code')]
    public ?string $languageCode;

    /**
     * List of lexicon names to apply.
     *
     * @var list<string>|null $lexiconNames
     */
    #[Optional('lexicon_names', list: 'string')]
    public ?array $lexiconNames;

    /**
     * Audio output format.
     */
    #[Optional('output_format')]
    public ?string $outputFormat;

    /**
     * Audio sample rate.
     */
    #[Optional('sample_rate')]
    public ?string $sampleRate;

    /**
     * Input text type.
     *
     * @var value-of<TextType>|null $textType
     */
    #[Optional(
        'text_type',
        enum: TextType::class,
    )]
    public ?string $textType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $lexiconNames
     * @param TextType|value-of<TextType>|null $textType
     */
    public static function with(
        ?string $languageCode = null,
        ?array $lexiconNames = null,
        ?string $outputFormat = null,
        ?string $sampleRate = null,
        TextType|string|null $textType = null,
    ): self {
        $self = new self;

        null !== $languageCode && $self['languageCode'] = $languageCode;
        null !== $lexiconNames && $self['lexiconNames'] = $lexiconNames;
        null !== $outputFormat && $self['outputFormat'] = $outputFormat;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;
        null !== $textType && $self['textType'] = $textType;

        return $self;
    }

    /**
     * Language code (e.g. `en-US`, `es-ES`).
     */
    public function withLanguageCode(string $languageCode): self
    {
        $self = clone $this;
        $self['languageCode'] = $languageCode;

        return $self;
    }

    /**
     * List of lexicon names to apply.
     *
     * @param list<string> $lexiconNames
     */
    public function withLexiconNames(array $lexiconNames): self
    {
        $self = clone $this;
        $self['lexiconNames'] = $lexiconNames;

        return $self;
    }

    /**
     * Audio output format.
     */
    public function withOutputFormat(string $outputFormat): self
    {
        $self = clone $this;
        $self['outputFormat'] = $outputFormat;

        return $self;
    }

    /**
     * Audio sample rate.
     */
    public function withSampleRate(string $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * Input text type.
     *
     * @param TextType|value-of<TextType> $textType
     */
    public function withTextType(
        TextType|string $textType,
    ): self {
        $self = clone $this;
        $self['textType'] = $textType;

        return $self;
    }
}
