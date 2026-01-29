<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional configuration parameters to modify 'answering_machine_detection' performance.
 *
 * @phpstan-type AnsweringMachineDetectionConfigShape = array{
 *   afterGreetingSilenceMillis?: int|null,
 *   betweenWordsSilenceMillis?: int|null,
 *   greetingDurationMillis?: int|null,
 *   greetingSilenceDurationMillis?: int|null,
 *   greetingTotalAnalysisTimeMillis?: int|null,
 *   initialSilenceMillis?: int|null,
 *   maximumNumberOfWords?: int|null,
 *   maximumWordLengthMillis?: int|null,
 *   silenceThreshold?: int|null,
 *   totalAnalysisTimeMillis?: int|null,
 * }
 */
final class AnsweringMachineDetectionConfig implements BaseModel
{
    /** @use SdkModel<AnsweringMachineDetectionConfigShape> */
    use SdkModel;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human.
     */
    #[Optional('after_greeting_silence_millis')]
    public ?int $afterGreetingSilenceMillis;

    /**
     * Maximum threshold for silence between words.
     */
    #[Optional('between_words_silence_millis')]
    public ?int $betweenWordsSilenceMillis;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine.
     */
    #[Optional('greeting_duration_millis')]
    public ?int $greetingDurationMillis;

    /**
     * If machine already detected, maximum threshold for silence between words. If exceeded, the greeting is considered ended.
     */
    #[Optional('greeting_silence_duration_millis')]
    public ?int $greetingSilenceDurationMillis;

    /**
     * If machine already detected, maximum timeout threshold to determine the end of the machine greeting.
     */
    #[Optional('greeting_total_analysis_time_millis')]
    public ?int $greetingTotalAnalysisTimeMillis;

    /**
     * If initial silence duration is greater than this value, consider it a machine.
     */
    #[Optional('initial_silence_millis')]
    public ?int $initialSilenceMillis;

    /**
     * If number of detected words is greater than this value, consder it a machine.
     */
    #[Optional('maximum_number_of_words')]
    public ?int $maximumNumberOfWords;

    /**
     * If a single word lasts longer than this threshold, consider it a machine.
     */
    #[Optional('maximum_word_length_millis')]
    public ?int $maximumWordLengthMillis;

    /**
     * Minimum noise threshold for any analysis.
     */
    #[Optional('silence_threshold')]
    public ?int $silenceThreshold;

    /**
     * Maximum timeout threshold for overall detection.
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
        null !== $silenceThreshold && $self['silenceThreshold'] = $silenceThreshold;
        null !== $totalAnalysisTimeMillis && $self['totalAnalysisTimeMillis'] = $totalAnalysisTimeMillis;

        return $self;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human.
     */
    public function withAfterGreetingSilenceMillis(
        int $afterGreetingSilenceMillis
    ): self {
        $self = clone $this;
        $self['afterGreetingSilenceMillis'] = $afterGreetingSilenceMillis;

        return $self;
    }

    /**
     * Maximum threshold for silence between words.
     */
    public function withBetweenWordsSilenceMillis(
        int $betweenWordsSilenceMillis
    ): self {
        $self = clone $this;
        $self['betweenWordsSilenceMillis'] = $betweenWordsSilenceMillis;

        return $self;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine.
     */
    public function withGreetingDurationMillis(
        int $greetingDurationMillis
    ): self {
        $self = clone $this;
        $self['greetingDurationMillis'] = $greetingDurationMillis;

        return $self;
    }

    /**
     * If machine already detected, maximum threshold for silence between words. If exceeded, the greeting is considered ended.
     */
    public function withGreetingSilenceDurationMillis(
        int $greetingSilenceDurationMillis
    ): self {
        $self = clone $this;
        $self['greetingSilenceDurationMillis'] = $greetingSilenceDurationMillis;

        return $self;
    }

    /**
     * If machine already detected, maximum timeout threshold to determine the end of the machine greeting.
     */
    public function withGreetingTotalAnalysisTimeMillis(
        int $greetingTotalAnalysisTimeMillis
    ): self {
        $self = clone $this;
        $self['greetingTotalAnalysisTimeMillis'] = $greetingTotalAnalysisTimeMillis;

        return $self;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine.
     */
    public function withInitialSilenceMillis(int $initialSilenceMillis): self
    {
        $self = clone $this;
        $self['initialSilenceMillis'] = $initialSilenceMillis;

        return $self;
    }

    /**
     * If number of detected words is greater than this value, consder it a machine.
     */
    public function withMaximumNumberOfWords(int $maximumNumberOfWords): self
    {
        $self = clone $this;
        $self['maximumNumberOfWords'] = $maximumNumberOfWords;

        return $self;
    }

    /**
     * If a single word lasts longer than this threshold, consider it a machine.
     */
    public function withMaximumWordLengthMillis(
        int $maximumWordLengthMillis
    ): self {
        $self = clone $this;
        $self['maximumWordLengthMillis'] = $maximumWordLengthMillis;

        return $self;
    }

    /**
     * Minimum noise threshold for any analysis.
     */
    public function withSilenceThreshold(int $silenceThreshold): self
    {
        $self = clone $this;
        $self['silenceThreshold'] = $silenceThreshold;

        return $self;
    }

    /**
     * Maximum timeout threshold for overall detection.
     */
    public function withTotalAnalysisTimeMillis(
        int $totalAnalysisTimeMillis
    ): self {
        $self = clone $this;
        $self['totalAnalysisTimeMillis'] = $totalAnalysisTimeMillis;

        return $self;
    }
}
