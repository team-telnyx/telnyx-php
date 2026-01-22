<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\AudioVisualizerConfig;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\DefaultState;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\Position;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\Theme;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration settings for the assistant's web widget.
 *
 * @phpstan-import-type AudioVisualizerConfigShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\WidgetSettings\AudioVisualizerConfig
 *
 * @phpstan-type WidgetSettingsShape = array{
 *   agentThinkingText?: string|null,
 *   audioVisualizerConfig?: null|AudioVisualizerConfig|AudioVisualizerConfigShape,
 *   defaultState?: null|DefaultState|value-of<DefaultState>,
 *   giveFeedbackURL?: string|null,
 *   logoIconURL?: string|null,
 *   position?: null|Position|value-of<Position>,
 *   reportIssueURL?: string|null,
 *   speakToInterruptText?: string|null,
 *   startCallText?: string|null,
 *   theme?: null|Theme|value-of<Theme>,
 *   viewHistoryURL?: string|null,
 * }
 */
final class WidgetSettings implements BaseModel
{
    /** @use SdkModel<WidgetSettingsShape> */
    use SdkModel;

    /**
     * Text displayed while the agent is processing.
     */
    #[Optional('agent_thinking_text')]
    public ?string $agentThinkingText;

    #[Optional('audio_visualizer_config')]
    public ?AudioVisualizerConfig $audioVisualizerConfig;

    /**
     * The default state of the widget.
     *
     * @var value-of<DefaultState>|null $defaultState
     */
    #[Optional('default_state', enum: DefaultState::class)]
    public ?string $defaultState;

    /**
     * URL for users to give feedback.
     */
    #[Optional('give_feedback_url', nullable: true)]
    public ?string $giveFeedbackURL;

    /**
     * URL to a custom logo icon for the widget.
     */
    #[Optional('logo_icon_url', nullable: true)]
    public ?string $logoIconURL;

    /**
     * The positioning style for the widget.
     *
     * @var value-of<Position>|null $position
     */
    #[Optional(enum: Position::class)]
    public ?string $position;

    /**
     * URL for users to report issues.
     */
    #[Optional('report_issue_url', nullable: true)]
    public ?string $reportIssueURL;

    /**
     * Text prompting users to speak to interrupt.
     */
    #[Optional('speak_to_interrupt_text')]
    public ?string $speakToInterruptText;

    /**
     * Custom text displayed on the start call button.
     */
    #[Optional('start_call_text')]
    public ?string $startCallText;

    /**
     * The visual theme for the widget.
     *
     * @var value-of<Theme>|null $theme
     */
    #[Optional(enum: Theme::class)]
    public ?string $theme;

    /**
     * URL to view conversation history.
     */
    #[Optional('view_history_url', nullable: true)]
    public ?string $viewHistoryURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AudioVisualizerConfig|AudioVisualizerConfigShape|null $audioVisualizerConfig
     * @param DefaultState|value-of<DefaultState>|null $defaultState
     * @param Position|value-of<Position>|null $position
     * @param Theme|value-of<Theme>|null $theme
     */
    public static function with(
        ?string $agentThinkingText = null,
        AudioVisualizerConfig|array|null $audioVisualizerConfig = null,
        DefaultState|string|null $defaultState = null,
        ?string $giveFeedbackURL = null,
        ?string $logoIconURL = null,
        Position|string|null $position = null,
        ?string $reportIssueURL = null,
        ?string $speakToInterruptText = null,
        ?string $startCallText = null,
        Theme|string|null $theme = null,
        ?string $viewHistoryURL = null,
    ): self {
        $self = new self;

        null !== $agentThinkingText && $self['agentThinkingText'] = $agentThinkingText;
        null !== $audioVisualizerConfig && $self['audioVisualizerConfig'] = $audioVisualizerConfig;
        null !== $defaultState && $self['defaultState'] = $defaultState;
        null !== $giveFeedbackURL && $self['giveFeedbackURL'] = $giveFeedbackURL;
        null !== $logoIconURL && $self['logoIconURL'] = $logoIconURL;
        null !== $position && $self['position'] = $position;
        null !== $reportIssueURL && $self['reportIssueURL'] = $reportIssueURL;
        null !== $speakToInterruptText && $self['speakToInterruptText'] = $speakToInterruptText;
        null !== $startCallText && $self['startCallText'] = $startCallText;
        null !== $theme && $self['theme'] = $theme;
        null !== $viewHistoryURL && $self['viewHistoryURL'] = $viewHistoryURL;

        return $self;
    }

    /**
     * Text displayed while the agent is processing.
     */
    public function withAgentThinkingText(string $agentThinkingText): self
    {
        $self = clone $this;
        $self['agentThinkingText'] = $agentThinkingText;

        return $self;
    }

    /**
     * @param AudioVisualizerConfig|AudioVisualizerConfigShape $audioVisualizerConfig
     */
    public function withAudioVisualizerConfig(
        AudioVisualizerConfig|array $audioVisualizerConfig
    ): self {
        $self = clone $this;
        $self['audioVisualizerConfig'] = $audioVisualizerConfig;

        return $self;
    }

    /**
     * The default state of the widget.
     *
     * @param DefaultState|value-of<DefaultState> $defaultState
     */
    public function withDefaultState(DefaultState|string $defaultState): self
    {
        $self = clone $this;
        $self['defaultState'] = $defaultState;

        return $self;
    }

    /**
     * URL for users to give feedback.
     */
    public function withGiveFeedbackURL(?string $giveFeedbackURL): self
    {
        $self = clone $this;
        $self['giveFeedbackURL'] = $giveFeedbackURL;

        return $self;
    }

    /**
     * URL to a custom logo icon for the widget.
     */
    public function withLogoIconURL(?string $logoIconURL): self
    {
        $self = clone $this;
        $self['logoIconURL'] = $logoIconURL;

        return $self;
    }

    /**
     * The positioning style for the widget.
     *
     * @param Position|value-of<Position> $position
     */
    public function withPosition(Position|string $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }

    /**
     * URL for users to report issues.
     */
    public function withReportIssueURL(?string $reportIssueURL): self
    {
        $self = clone $this;
        $self['reportIssueURL'] = $reportIssueURL;

        return $self;
    }

    /**
     * Text prompting users to speak to interrupt.
     */
    public function withSpeakToInterruptText(string $speakToInterruptText): self
    {
        $self = clone $this;
        $self['speakToInterruptText'] = $speakToInterruptText;

        return $self;
    }

    /**
     * Custom text displayed on the start call button.
     */
    public function withStartCallText(string $startCallText): self
    {
        $self = clone $this;
        $self['startCallText'] = $startCallText;

        return $self;
    }

    /**
     * The visual theme for the widget.
     *
     * @param Theme|value-of<Theme> $theme
     */
    public function withTheme(Theme|string $theme): self
    {
        $self = clone $this;
        $self['theme'] = $theme;

        return $self;
    }

    /**
     * URL to view conversation history.
     */
    public function withViewHistoryURL(?string $viewHistoryURL): self
    {
        $self = clone $this;
        $self['viewHistoryURL'] = $viewHistoryURL;

        return $self;
    }
}
