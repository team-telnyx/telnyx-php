<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig\BeepDetectionProfile;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional configuration parameters to modify 'answering_machine_detection' performance. Only `total_analysis_time_millis` and `greeting_duration_millis` parameters are applicable when `premium` is selected as answering_machine_detection.
 *
 * @phpstan-type AnsweringMachineDetectionConfigShape = array{
 *   afterGreetingSilenceMillis?: int|null,
 *   beepDetectionProfile?: null|BeepDetectionProfile|value-of<BeepDetectionProfile>,
 *   beepMaxFrequencyHz?: int|null,
 *   beepMinFrequencyHz?: int|null,
 *   beepMinToneDurationMillis?: int|null,
 *   beepSpectralConfirmation?: bool|null,
 *   beepSpectralMinPurity?: float|null,
 *   beepSpectralRejectFaxCng?: bool|null,
 *   beepSpectralWindowMillis?: int|null,
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
     * Selects which detectors must validate a beep. `both` requires the amplitude and frequency detectors to agree. `freq_only` uses the frequency detector alone, for beeps whose volume is too unsteady for the default profile.
     *
     * @var value-of<BeepDetectionProfile>|null $beepDetectionProfile
     */
    #[Optional('beep_detection_profile', enum: BeepDetectionProfile::class)]
    public ?string $beepDetectionProfile;

    /**
     * Highest frequency, in Hz, that a tone can reach and still be treated as a beep. Only used when beep detection is active.
     */
    #[Optional('beep_max_frequency_hz')]
    public ?int $beepMaxFrequencyHz;

    /**
     * Lowest frequency, in Hz, that a tone must reach to be treated as a beep. Raising it above 480 excludes North American ringback (440 + 480 Hz), which can otherwise be reported as a beep when the `freq_only` profile is in use. Only used when beep detection is active.
     */
    #[Optional('beep_min_frequency_hz')]
    public ?int $beepMinFrequencyHz;

    /**
     * Shortest tone, in milliseconds, that can be treated as a beep. Raising it rejects brief tones such as call-progress blips. Only used when beep detection is active.
     */
    #[Optional('beep_min_tone_duration_millis')]
    public ?int $beepMinToneDurationMillis;

    /**
     * When enabled, a candidate beep must pass an additional spectral check before it is reported. Only used when beep detection is active.
     */
    #[Optional('beep_spectral_confirmation')]
    public ?bool $beepSpectralConfirmation;

    /**
     * Minimum spectral purity, from 0 to 1, for a tone to be treated as a beep. Raising it rejects mixed tones such as ringback, which combines two frequencies. Only used when beep detection is active.
     */
    #[Optional('beep_spectral_min_purity')]
    public ?float $beepSpectralMinPurity;

    /**
     * When enabled, the fax CNG tone is rejected rather than reported as a beep. Only used when beep detection is active.
     */
    #[Optional('beep_spectral_reject_fax_cng')]
    public ?bool $beepSpectralRejectFaxCng;

    /**
     * Length of the spectral confirmation window, in milliseconds. Only used when beep detection is active.
     */
    #[Optional('beep_spectral_window_millis')]
    public ?int $beepSpectralWindowMillis;

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
     *
     * @param BeepDetectionProfile|value-of<BeepDetectionProfile>|null $beepDetectionProfile
     */
    public static function with(
        ?int $afterGreetingSilenceMillis = null,
        BeepDetectionProfile|string|null $beepDetectionProfile = null,
        ?int $beepMaxFrequencyHz = null,
        ?int $beepMinFrequencyHz = null,
        ?int $beepMinToneDurationMillis = null,
        ?bool $beepSpectralConfirmation = null,
        ?float $beepSpectralMinPurity = null,
        ?bool $beepSpectralRejectFaxCng = null,
        ?int $beepSpectralWindowMillis = null,
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
        null !== $beepDetectionProfile && $self['beepDetectionProfile'] = $beepDetectionProfile;
        null !== $beepMaxFrequencyHz && $self['beepMaxFrequencyHz'] = $beepMaxFrequencyHz;
        null !== $beepMinFrequencyHz && $self['beepMinFrequencyHz'] = $beepMinFrequencyHz;
        null !== $beepMinToneDurationMillis && $self['beepMinToneDurationMillis'] = $beepMinToneDurationMillis;
        null !== $beepSpectralConfirmation && $self['beepSpectralConfirmation'] = $beepSpectralConfirmation;
        null !== $beepSpectralMinPurity && $self['beepSpectralMinPurity'] = $beepSpectralMinPurity;
        null !== $beepSpectralRejectFaxCng && $self['beepSpectralRejectFaxCng'] = $beepSpectralRejectFaxCng;
        null !== $beepSpectralWindowMillis && $self['beepSpectralWindowMillis'] = $beepSpectralWindowMillis;
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
     * Selects which detectors must validate a beep. `both` requires the amplitude and frequency detectors to agree. `freq_only` uses the frequency detector alone, for beeps whose volume is too unsteady for the default profile.
     *
     * @param BeepDetectionProfile|value-of<BeepDetectionProfile> $beepDetectionProfile
     */
    public function withBeepDetectionProfile(
        BeepDetectionProfile|string $beepDetectionProfile
    ): self {
        $self = clone $this;
        $self['beepDetectionProfile'] = $beepDetectionProfile;

        return $self;
    }

    /**
     * Highest frequency, in Hz, that a tone can reach and still be treated as a beep. Only used when beep detection is active.
     */
    public function withBeepMaxFrequencyHz(int $beepMaxFrequencyHz): self
    {
        $self = clone $this;
        $self['beepMaxFrequencyHz'] = $beepMaxFrequencyHz;

        return $self;
    }

    /**
     * Lowest frequency, in Hz, that a tone must reach to be treated as a beep. Raising it above 480 excludes North American ringback (440 + 480 Hz), which can otherwise be reported as a beep when the `freq_only` profile is in use. Only used when beep detection is active.
     */
    public function withBeepMinFrequencyHz(int $beepMinFrequencyHz): self
    {
        $self = clone $this;
        $self['beepMinFrequencyHz'] = $beepMinFrequencyHz;

        return $self;
    }

    /**
     * Shortest tone, in milliseconds, that can be treated as a beep. Raising it rejects brief tones such as call-progress blips. Only used when beep detection is active.
     */
    public function withBeepMinToneDurationMillis(
        int $beepMinToneDurationMillis
    ): self {
        $self = clone $this;
        $self['beepMinToneDurationMillis'] = $beepMinToneDurationMillis;

        return $self;
    }

    /**
     * When enabled, a candidate beep must pass an additional spectral check before it is reported. Only used when beep detection is active.
     */
    public function withBeepSpectralConfirmation(
        bool $beepSpectralConfirmation
    ): self {
        $self = clone $this;
        $self['beepSpectralConfirmation'] = $beepSpectralConfirmation;

        return $self;
    }

    /**
     * Minimum spectral purity, from 0 to 1, for a tone to be treated as a beep. Raising it rejects mixed tones such as ringback, which combines two frequencies. Only used when beep detection is active.
     */
    public function withBeepSpectralMinPurity(
        float $beepSpectralMinPurity
    ): self {
        $self = clone $this;
        $self['beepSpectralMinPurity'] = $beepSpectralMinPurity;

        return $self;
    }

    /**
     * When enabled, the fax CNG tone is rejected rather than reported as a beep. Only used when beep detection is active.
     */
    public function withBeepSpectralRejectFaxCng(
        bool $beepSpectralRejectFaxCng
    ): self {
        $self = clone $this;
        $self['beepSpectralRejectFaxCng'] = $beepSpectralRejectFaxCng;

        return $self;
    }

    /**
     * Length of the spectral confirmation window, in milliseconds. Only used when beep detection is active.
     */
    public function withBeepSpectralWindowMillis(
        int $beepSpectralWindowMillis
    ): self {
        $self = clone $this;
        $self['beepSpectralWindowMillis'] = $beepSpectralWindowMillis;

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
