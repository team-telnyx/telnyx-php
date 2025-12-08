<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional configuration parameters to modify 'answering_machine_detection' performance.
 *
 * @phpstan-type AnsweringMachineDetectionConfigShape = array{
 *   after_greeting_silence_millis?: int|null,
 *   between_words_silence_millis?: int|null,
 *   greeting_duration_millis?: int|null,
 *   greeting_silence_duration_millis?: int|null,
 *   greeting_total_analysis_time_millis?: int|null,
 *   initial_silence_millis?: int|null,
 *   maximum_number_of_words?: int|null,
 *   maximum_word_length_millis?: int|null,
 *   silence_threshold?: int|null,
 *   total_analysis_time_millis?: int|null,
 * }
 */
final class AnsweringMachineDetectionConfig implements BaseModel
{
    /** @use SdkModel<AnsweringMachineDetectionConfigShape> */
    use SdkModel;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human.
     */
    #[Optional]
    public ?int $after_greeting_silence_millis;

    /**
     * Maximum threshold for silence between words.
     */
    #[Optional]
    public ?int $between_words_silence_millis;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine.
     */
    #[Optional]
    public ?int $greeting_duration_millis;

    /**
     * If machine already detected, maximum threshold for silence between words. If exceeded, the greeting is considered ended.
     */
    #[Optional]
    public ?int $greeting_silence_duration_millis;

    /**
     * If machine already detected, maximum timeout threshold to determine the end of the machine greeting.
     */
    #[Optional]
    public ?int $greeting_total_analysis_time_millis;

    /**
     * If initial silence duration is greater than this value, consider it a machine.
     */
    #[Optional]
    public ?int $initial_silence_millis;

    /**
     * If number of detected words is greater than this value, consder it a machine.
     */
    #[Optional]
    public ?int $maximum_number_of_words;

    /**
     * If a single word lasts longer than this threshold, consider it a machine.
     */
    #[Optional]
    public ?int $maximum_word_length_millis;

    /**
     * Minimum noise threshold for any analysis.
     */
    #[Optional]
    public ?int $silence_threshold;

    /**
     * Maximum timeout threshold for overall detection.
     */
    #[Optional]
    public ?int $total_analysis_time_millis;

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
        ?int $after_greeting_silence_millis = null,
        ?int $between_words_silence_millis = null,
        ?int $greeting_duration_millis = null,
        ?int $greeting_silence_duration_millis = null,
        ?int $greeting_total_analysis_time_millis = null,
        ?int $initial_silence_millis = null,
        ?int $maximum_number_of_words = null,
        ?int $maximum_word_length_millis = null,
        ?int $silence_threshold = null,
        ?int $total_analysis_time_millis = null,
    ): self {
        $obj = new self;

        null !== $after_greeting_silence_millis && $obj['after_greeting_silence_millis'] = $after_greeting_silence_millis;
        null !== $between_words_silence_millis && $obj['between_words_silence_millis'] = $between_words_silence_millis;
        null !== $greeting_duration_millis && $obj['greeting_duration_millis'] = $greeting_duration_millis;
        null !== $greeting_silence_duration_millis && $obj['greeting_silence_duration_millis'] = $greeting_silence_duration_millis;
        null !== $greeting_total_analysis_time_millis && $obj['greeting_total_analysis_time_millis'] = $greeting_total_analysis_time_millis;
        null !== $initial_silence_millis && $obj['initial_silence_millis'] = $initial_silence_millis;
        null !== $maximum_number_of_words && $obj['maximum_number_of_words'] = $maximum_number_of_words;
        null !== $maximum_word_length_millis && $obj['maximum_word_length_millis'] = $maximum_word_length_millis;
        null !== $silence_threshold && $obj['silence_threshold'] = $silence_threshold;
        null !== $total_analysis_time_millis && $obj['total_analysis_time_millis'] = $total_analysis_time_millis;

        return $obj;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human.
     */
    public function withAfterGreetingSilenceMillis(
        int $afterGreetingSilenceMillis
    ): self {
        $obj = clone $this;
        $obj['after_greeting_silence_millis'] = $afterGreetingSilenceMillis;

        return $obj;
    }

    /**
     * Maximum threshold for silence between words.
     */
    public function withBetweenWordsSilenceMillis(
        int $betweenWordsSilenceMillis
    ): self {
        $obj = clone $this;
        $obj['between_words_silence_millis'] = $betweenWordsSilenceMillis;

        return $obj;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine.
     */
    public function withGreetingDurationMillis(
        int $greetingDurationMillis
    ): self {
        $obj = clone $this;
        $obj['greeting_duration_millis'] = $greetingDurationMillis;

        return $obj;
    }

    /**
     * If machine already detected, maximum threshold for silence between words. If exceeded, the greeting is considered ended.
     */
    public function withGreetingSilenceDurationMillis(
        int $greetingSilenceDurationMillis
    ): self {
        $obj = clone $this;
        $obj['greeting_silence_duration_millis'] = $greetingSilenceDurationMillis;

        return $obj;
    }

    /**
     * If machine already detected, maximum timeout threshold to determine the end of the machine greeting.
     */
    public function withGreetingTotalAnalysisTimeMillis(
        int $greetingTotalAnalysisTimeMillis
    ): self {
        $obj = clone $this;
        $obj['greeting_total_analysis_time_millis'] = $greetingTotalAnalysisTimeMillis;

        return $obj;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine.
     */
    public function withInitialSilenceMillis(int $initialSilenceMillis): self
    {
        $obj = clone $this;
        $obj['initial_silence_millis'] = $initialSilenceMillis;

        return $obj;
    }

    /**
     * If number of detected words is greater than this value, consder it a machine.
     */
    public function withMaximumNumberOfWords(int $maximumNumberOfWords): self
    {
        $obj = clone $this;
        $obj['maximum_number_of_words'] = $maximumNumberOfWords;

        return $obj;
    }

    /**
     * If a single word lasts longer than this threshold, consider it a machine.
     */
    public function withMaximumWordLengthMillis(
        int $maximumWordLengthMillis
    ): self {
        $obj = clone $this;
        $obj['maximum_word_length_millis'] = $maximumWordLengthMillis;

        return $obj;
    }

    /**
     * Minimum noise threshold for any analysis.
     */
    public function withSilenceThreshold(int $silenceThreshold): self
    {
        $obj = clone $this;
        $obj['silence_threshold'] = $silenceThreshold;

        return $obj;
    }

    /**
     * Maximum timeout threshold for overall detection.
     */
    public function withTotalAnalysisTimeMillis(
        int $totalAnalysisTimeMillis
    ): self {
        $obj = clone $this;
        $obj['total_analysis_time_millis'] = $totalAnalysisTimeMillis;

        return $obj;
    }
}
