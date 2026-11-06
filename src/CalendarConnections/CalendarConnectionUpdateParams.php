<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\AutoJoinPolicy;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;

/**
 * Update policy or defaults for future sessions. Supply at least one field. Existing sessions retain their configuration. Null clears nullable overrides. Assistant, recording, and webhook defaults apply to Google Meet and Teams. Assistant defaults require default_barge_in to be false or null and default_voice to be null. Recording=true requires a destination; false rejects one. A non-null default_webhook_url update returns webhook_secret once; save it to verify future session deliveries.
 *
 * @see Telnyx\Services\CalendarConnectionsService::update()
 *
 * @phpstan-import-type DefaultAssistantShape from \Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 *
 * @phpstan-type CalendarConnectionUpdateParamsShape = array{
 *   autoJoinPolicy?: null|AutoJoinPolicy|value-of<AutoJoinPolicy>,
 *   botName?: string|null,
 *   defaultAssistant?: null|DefaultAssistant|DefaultAssistantShape,
 *   defaultBargeIn?: bool|null,
 *   defaultRecording?: bool|null,
 *   defaultRecordingExport?: null|MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape,
 *   defaultSummarizeOnEnd?: bool|null,
 *   defaultVoice?: string|null,
 *   defaultWebhookURL?: string|null,
 * }
 */
final class CalendarConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<CalendarConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * all_meetings joins eligible events; external_organizer_excluded requires the connected user to be the organizer; per_meeting requires an explicit opt-in.
     *
     * @var value-of<AutoJoinPolicy>|null $autoJoinPolicy
     */
    #[Optional('auto_join_policy', enum: AutoJoinPolicy::class)]
    public ?string $autoJoinPolicy;

    /**
     * Bot display name; null clears the override.
     */
    #[Optional('bot_name', nullable: true)]
    public ?string $botName;

    /**
     * Default assistant for future calendar-scheduled Google Meet and Teams sessions. The saved configuration must fit within 8 KiB. Use id, audio_gate, dynamic_variables, and leave_on_end; avatar is not accepted. audio_gate defaults to full_duplex.
     */
    #[Optional('default_assistant', nullable: true)]
    public ?DefaultAssistant $defaultAssistant;

    /**
     * Default manual speech interruption. Cannot be true with default_assistant.
     */
    #[Optional('default_barge_in', nullable: true)]
    public ?bool $defaultBargeIn;

    /**
     * Google Meet and Teams recording intent. When null, recording is enabled only if a destination is set. True requires default_recording_export; false cannot be combined with a destination.
     */
    #[Optional('default_recording', nullable: true)]
    public ?bool $defaultRecording;

    /**
     * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     */
    #[Optional('default_recording_export', nullable: true)]
    public ?MeetingSessionRecordingDestination $defaultRecordingExport;

    /**
     * Generate a summary when each future session transcript finalizes.
     */
    #[Optional('default_summarize_on_end', nullable: true)]
    public ?bool $defaultSummarizeOnEnd;

    /**
     * Manual-speech voice; must be null when default_assistant is set.
     */
    #[Optional('default_voice', nullable: true)]
    public ?string $defaultVoice;

    /**
     * HTTPS destination for future session webhooks. Null clears the default. A non-null update returns webhook_secret once; save it to verify signatures for sessions created with this default. Existing sessions retain their original signing secret.
     */
    #[Optional('default_webhook_url', nullable: true)]
    public ?string $defaultWebhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|DefaultAssistant|DefaultAssistantShape|null $defaultAssistant
     * @param Omitted|MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null $defaultRecordingExport
     * @param AutoJoinPolicy|value-of<AutoJoinPolicy>|null $autoJoinPolicy
     */
    public static function with(
        string|Omitted|null $botName = Omitted::VALUE,
        Omitted|DefaultAssistant|array|null $defaultAssistant = Omitted::VALUE,
        bool|Omitted|null $defaultBargeIn = Omitted::VALUE,
        bool|Omitted|null $defaultRecording = Omitted::VALUE,
        Omitted|MeetingSessionRecordingDestination|array|null $defaultRecordingExport = Omitted::VALUE,
        bool|Omitted|null $defaultSummarizeOnEnd = Omitted::VALUE,
        string|Omitted|null $defaultVoice = Omitted::VALUE,
        string|Omitted|null $defaultWebhookURL = Omitted::VALUE,
        AutoJoinPolicy|string|null $autoJoinPolicy = null,
    ): self {
        $self = new self;

        null !== $autoJoinPolicy && $self['autoJoinPolicy'] = $autoJoinPolicy;
        Omitted::VALUE !== $botName && $self['botName'] = $botName;
        Omitted::VALUE !== $defaultAssistant && $self['defaultAssistant'] = $defaultAssistant;
        Omitted::VALUE !== $defaultBargeIn && $self['defaultBargeIn'] = $defaultBargeIn;
        Omitted::VALUE !== $defaultRecording && $self['defaultRecording'] = $defaultRecording;
        Omitted::VALUE !== $defaultRecordingExport && $self['defaultRecordingExport'] = $defaultRecordingExport;
        Omitted::VALUE !== $defaultSummarizeOnEnd && $self['defaultSummarizeOnEnd'] = $defaultSummarizeOnEnd;
        Omitted::VALUE !== $defaultVoice && $self['defaultVoice'] = $defaultVoice;
        Omitted::VALUE !== $defaultWebhookURL && $self['defaultWebhookURL'] = $defaultWebhookURL;

        return $self;
    }

    /**
     * all_meetings joins eligible events; external_organizer_excluded requires the connected user to be the organizer; per_meeting requires an explicit opt-in.
     *
     * @param AutoJoinPolicy|value-of<AutoJoinPolicy> $autoJoinPolicy
     */
    public function withAutoJoinPolicy(
        AutoJoinPolicy|string $autoJoinPolicy
    ): self {
        $self = clone $this;
        $self['autoJoinPolicy'] = $autoJoinPolicy;

        return $self;
    }

    /**
     * Bot display name; null clears the override.
     */
    public function withBotName(?string $botName): self
    {
        $self = clone $this;
        $self['botName'] = $botName;

        return $self;
    }

    /**
     * Default assistant for future calendar-scheduled Google Meet and Teams sessions. The saved configuration must fit within 8 KiB. Use id, audio_gate, dynamic_variables, and leave_on_end; avatar is not accepted. audio_gate defaults to full_duplex.
     *
     * @param DefaultAssistant|DefaultAssistantShape|null $defaultAssistant
     */
    public function withDefaultAssistant(
        DefaultAssistant|array|null $defaultAssistant
    ): self {
        $self = clone $this;
        $self['defaultAssistant'] = $defaultAssistant;

        return $self;
    }

    /**
     * Default manual speech interruption. Cannot be true with default_assistant.
     */
    public function withDefaultBargeIn(?bool $defaultBargeIn): self
    {
        $self = clone $this;
        $self['defaultBargeIn'] = $defaultBargeIn;

        return $self;
    }

    /**
     * Google Meet and Teams recording intent. When null, recording is enabled only if a destination is set. True requires default_recording_export; false cannot be combined with a destination.
     */
    public function withDefaultRecording(?bool $defaultRecording): self
    {
        $self = clone $this;
        $self['defaultRecording'] = $defaultRecording;

        return $self;
    }

    /**
     * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     *
     * @param MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null $defaultRecordingExport
     */
    public function withDefaultRecordingExport(
        MeetingSessionRecordingDestination|array|null $defaultRecordingExport
    ): self {
        $self = clone $this;
        $self['defaultRecordingExport'] = $defaultRecordingExport;

        return $self;
    }

    /**
     * Generate a summary when each future session transcript finalizes.
     */
    public function withDefaultSummarizeOnEnd(
        ?bool $defaultSummarizeOnEnd
    ): self {
        $self = clone $this;
        $self['defaultSummarizeOnEnd'] = $defaultSummarizeOnEnd;

        return $self;
    }

    /**
     * Manual-speech voice; must be null when default_assistant is set.
     */
    public function withDefaultVoice(?string $defaultVoice): self
    {
        $self = clone $this;
        $self['defaultVoice'] = $defaultVoice;

        return $self;
    }

    /**
     * HTTPS destination for future session webhooks. Null clears the default. A non-null update returns webhook_secret once; save it to verify signatures for sessions created with this default. Existing sessions retain their original signing secret.
     */
    public function withDefaultWebhookURL(?string $defaultWebhookURL): self
    {
        $self = clone $this;
        $self['defaultWebhookURL'] = $defaultWebhookURL;

        return $self;
    }
}
