<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Deepgram\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Deepgram\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type deepgram_alias = array{
 *   transcriptionEngine: string,
 *   transcriptionModel: value-of<TranscriptionModel>,
 *   language?: value-of<Language>,
 * }
 */
final class Deepgram implements BaseModel
{
    /** @use SdkModel<deepgram_alias> */
    use SdkModel;

    /**
     * Engine identifier for Deepgram transcription service.
     */
    #[Api('transcription_engine')]
    public string $transcriptionEngine = 'Deepgram';

    /**
     * The model to use for transcription.
     *
     * @var value-of<TranscriptionModel> $transcriptionModel
     */
    #[Api('transcription_model', enum: TranscriptionModel::class)]
    public string $transcriptionModel;

    /**
     * Language to use for speech recognition. Available languages depend on the selected model.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * `new Deepgram()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Deepgram::with(transcriptionModel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Deepgram)->withTranscriptionModel(...)
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
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     * @param Language|value-of<Language> $language
     */
    public static function with(
        TranscriptionModel|string $transcriptionModel = 'deepgram/nova-2',
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['transcriptionModel'] = $transcriptionModel;

        null !== $language && $obj['language'] = $language;

        return $obj;
    }

    /**
     * The model to use for transcription.
     *
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public function withTranscriptionModel(
        TranscriptionModel|string $transcriptionModel
    ): self {
        $obj = clone $this;
        $obj['transcriptionModel'] = $transcriptionModel;

        return $obj;
    }

    /**
     * Language to use for speech recognition. Available languages depend on the selected model.
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
