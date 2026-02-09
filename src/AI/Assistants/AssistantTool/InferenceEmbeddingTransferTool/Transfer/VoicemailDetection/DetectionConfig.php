<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Advanced AMD detection configuration parameters. All values are optional - Telnyx will use defaults if not specified.
 *
 * @phpstan-type DetectionConfigShape = array{
 *   afterGreetingSilenceMillis?: int|null,
 *   betweenWordsSilenceMillis?: int|null,
 *   greetingDurationMillis?: int|null,
 *   greetingSilenceDurationMillis?: int|null,
 *   greetingTotalAnalysisTimeMillis?: int|null,
 *   initialSilenceMillis?: int|null,
 *   maximumNumberOfWords?: int|null,
 *   maximumWordLengthMillis?: int|null,
 *   minWordLengthMillis?: int|null,
 *   silenceThreshold?: int|null,
 *   totalAnalysisTimeMillis?: int|null,
 * }
 */
final class DetectionConfig implements BaseModel
{
    /** @use SdkModel<DetectionConfigShape> */
    use SdkModel;

    /**
     * Duration of silence after greeting detection before finalizing the result.
     */
    #[Optional('after_greeting_silence_millis')]
    public ?int $afterGreetingSilenceMillis;

    /**
     * Maximum silence duration between words during greeting.
     */
    #[Optional('between_words_silence_millis')]
    public ?int $betweenWordsSilenceMillis;

    /**
     * Expected duration of greeting speech.
     */
    #[Optional('greeting_duration_millis')]
    public ?int $greetingDurationMillis;

    /**
     * Duration of silence after the greeting to wait before considering the greeting complete.
     */
    #[Optional('greeting_silence_duration_millis')]
    public ?int $greetingSilenceDurationMillis;

    /**
     * Maximum time to spend analyzing the greeting.
     */
    #[Optional('greeting_total_analysis_time_millis')]
    public ?int $greetingTotalAnalysisTimeMillis;

    /**
     * Maximum silence duration at the start of the call before speech.
     */
    #[Optional('initial_silence_millis')]
    public ?int $initialSilenceMillis;

    /**
     * Maximum number of words expected in a human greeting.
     */
    #[Optional('maximum_number_of_words')]
    public ?int $maximumNumberOfWords;

    /**
     * Maximum duration of a single word.
     */
    #[Optional('maximum_word_length_millis')]
    public ?int $maximumWordLengthMillis;

    /**
     * Minimum duration for audio to be considered a word.
     */
    #[Optional('min_word_length_millis')]
    public ?int $minWordLengthMillis;

    /**
     * Audio level threshold for silence detection.
     */
    #[Optional('silence_threshold')]
    public ?int $silenceThreshold;

    /**
     * Total time allowed for AMD analysis.
     */
    #[Optional('total_analysis_time_millis')]
    public ?int $totalAnalysisTimeMillis;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $afterGreetingSilenceMillis = null,
        ?int $betweenWordsSilenceMillis = null,
        ?int $greetingDurationMillis = null,
        ?int $greetingSilenceDurationMillis = null,
        ?int $greetingTotalAnalysisTimeMillis = null,
        ?int $initialSilenceMillis = null,
        ?int $maximumNumberOfWords = null,
        ?int $maximumWordLengthMillis = null,
        ?int $minWordLengthMillis = null,
        ?int $silenceThreshold = null,
        ?int $totalAnalysisTimeMillis = null,
    ): self {
        $self = new self;

        null !== $afterGreetingSilenceMillis && $self['afterGreetingSilenceMillis'] = $afterGreetingSilenceMillis;
        null !== $betweenWordsSilenceMillis && $self['betweenWordsSilenceMillis'] = $betweenWordsSilenceMillis;
        null !== $greetingDurationMillis && $self['greetingDurationMillis'] = $greetingDurationMillis;
        null !== $greetingSilenceDurationMillis && $self['greetingSilenceDurationMillis'] = $greetingSilenceDurationMillis;
        null !== $greetingTotalAnalysisTimeMillis && $self['greetingTotalAnalysisTimeMillis'] = $greetingTotalAnalysisTimeMillis;
        null !== $initialSilenceMillis && $self['initialSilenceMillis'] = $initialSilenceMillis;
        null !== $maximumNumberOfWords && $self['maximumNumberOfWords'] = $maximumNumberOfWords;
        null !== $maximumWordLengthMillis && $self['maximumWordLengthMillis'] = $maximumWordLengthMillis;
        null !== $minWordLengthMillis && $self['minWordLengthMillis'] = $minWordLengthMillis;
        null !== $silenceThreshold && $self['silenceThreshold'] = $silenceThreshold;
        null !== $totalAnalysisTimeMillis && $self['totalAnalysisTimeMillis'] = $totalAnalysisTimeMillis;

        return $self;
    }

    /**
     * Duration of silence after greeting detection before finalizing the result.
     */
    public function withAfterGreetingSilenceMillis(
        int $afterGreetingSilenceMillis
    ): self {
        $self = clone $this;
        $self['afterGreetingSilenceMillis'] = $afterGreetingSilenceMillis;

        return $self;
    }

    /**
     * Maximum silence duration between words during greeting.
     */
    public function withBetweenWordsSilenceMillis(
        int $betweenWordsSilenceMillis
    ): self {
        $self = clone $this;
        $self['betweenWordsSilenceMillis'] = $betweenWordsSilenceMillis;

        return $self;
    }

    /**
     * Expected duration of greeting speech.
     */
    public function withGreetingDurationMillis(
        int $greetingDurationMillis
    ): self {
        $self = clone $this;
        $self['greetingDurationMillis'] = $greetingDurationMillis;

        return $self;
    }

    /**
     * Duration of silence after the greeting to wait before considering the greeting complete.
     */
    public function withGreetingSilenceDurationMillis(
        int $greetingSilenceDurationMillis
    ): self {
        $self = clone $this;
        $self['greetingSilenceDurationMillis'] = $greetingSilenceDurationMillis;

        return $self;
    }

    /**
     * Maximum time to spend analyzing the greeting.
     */
    public function withGreetingTotalAnalysisTimeMillis(
        int $greetingTotalAnalysisTimeMillis
    ): self {
        $self = clone $this;
        $self['greetingTotalAnalysisTimeMillis'] = $greetingTotalAnalysisTimeMillis;

        return $self;
    }

    /**
     * Maximum silence duration at the start of the call before speech.
     */
    public function withInitialSilenceMillis(int $initialSilenceMillis): self
    {
        $self = clone $this;
        $self['initialSilenceMillis'] = $initialSilenceMillis;

        return $self;
    }

    /**
     * Maximum number of words expected in a human greeting.
     */
    public function withMaximumNumberOfWords(int $maximumNumberOfWords): self
    {
        $self = clone $this;
        $self['maximumNumberOfWords'] = $maximumNumberOfWords;

        return $self;
    }

    /**
     * Maximum duration of a single word.
     */
    public function withMaximumWordLengthMillis(
        int $maximumWordLengthMillis
    ): self {
        $self = clone $this;
        $self['maximumWordLengthMillis'] = $maximumWordLengthMillis;

        return $self;
    }

    /**
     * Minimum duration for audio to be considered a word.
     */
    public function withMinWordLengthMillis(int $minWordLengthMillis): self
    {
        $self = clone $this;
        $self['minWordLengthMillis'] = $minWordLengthMillis;

        return $self;
    }

    /**
     * Audio level threshold for silence detection.
     */
    public function withSilenceThreshold(int $silenceThreshold): self
    {
        $self = clone $this;
        $self['silenceThreshold'] = $silenceThreshold;

        return $self;
    }

    /**
     * Total time allowed for AMD analysis.
     */
    public function withTotalAnalysisTimeMillis(
        int $totalAnalysisTimeMillis
    ): self {
        $self = clone $this;
        $self['totalAnalysisTimeMillis'] = $totalAnalysisTimeMillis;

        return $self;
    }
}
