<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\CalendarConnections\CalendarConnection\AutoJoinPolicy;
use Telnyx\CalendarConnections\CalendarConnection\Platform;
use Telnyx\CalendarConnections\CalendarConnection\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;

/**
 * @phpstan-import-type MeetingSessionAssistantShape from \Telnyx\CalendarConnections\MeetingSessionAssistant
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 *
 * @phpstan-type CalendarConnectionShape = array{
 *   id: string,
 *   autoJoinPolicy: AutoJoinPolicy|value-of<AutoJoinPolicy>,
 *   botName: string|null,
 *   createdAt: \DateTimeInterface,
 *   defaultAssistant: null|MeetingSessionAssistant|MeetingSessionAssistantShape,
 *   defaultBargeIn: bool|null,
 *   defaultRecording: bool|null,
 *   defaultRecordingExport: null|MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape,
 *   defaultSummarizeOnEnd: bool|null,
 *   defaultVoice: string|null,
 *   defaultWebhookURL: string|null,
 *   platform: Platform|value-of<Platform>,
 *   platformEmail: string|null,
 *   status: Status|value-of<Status>,
 *   statusDetail: string|null,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class CalendarConnection implements BaseModel
{
    /** @use SdkModel<CalendarConnectionShape> */
    use SdkModel;

    /**
     * Calendar connection ID.
     */
    #[Required]
    public string $id;

    /**
     * all_meetings joins eligible events; external_organizer_excluded requires the connected user to be the organizer; per_meeting requires an explicit opt-in.
     *
     * @var value-of<AutoJoinPolicy> $autoJoinPolicy
     */
    #[Required('auto_join_policy', enum: AutoJoinPolicy::class)]
    public string $autoJoinPolicy;

    /**
     * Bot display name; null clears the override.
     */
    #[Required('bot_name')]
    public ?string $botName;

    /**
     * Creation time.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('default_assistant')]
    public ?MeetingSessionAssistant $defaultAssistant;

    /**
     * Default manual speech interruption. Cannot be true with default_assistant.
     */
    #[Required('default_barge_in')]
    public ?bool $defaultBargeIn;

    /**
     * Google Meet and Teams recording intent. When null, recording is enabled only if a destination is set. True requires default_recording_export; false cannot be combined with a destination.
     */
    #[Required('default_recording')]
    public ?bool $defaultRecording;

    /**
     * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     */
    #[Required('default_recording_export')]
    public ?MeetingSessionRecordingDestination $defaultRecordingExport;

    /**
     * Generate a summary when each future session transcript finalizes.
     */
    #[Required('default_summarize_on_end')]
    public ?bool $defaultSummarizeOnEnd;

    /**
     * Manual-speech voice; must be null when default_assistant is set.
     */
    #[Required('default_voice')]
    public ?string $defaultVoice;

    /**
     * HTTPS destination for future session webhooks. Null clears the default. A non-null update returns webhook_secret once; save it to verify signatures for sessions created with this default. Existing sessions retain their original signing secret.
     */
    #[Required('default_webhook_url')]
    public ?string $defaultWebhookURL;

    /**
     * Calendar provider: Google Calendar or Microsoft Outlook.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * Connected calendar email address.
     */
    #[Required('platform_email')]
    public ?string $platformEmail;

    /**
     * Connection status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Additional connection status detail.
     */
    #[Required('status_detail')]
    public ?string $statusDetail;

    /**
     * Last update time.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new CalendarConnection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarConnection::with(
     *   id: ...,
     *   autoJoinPolicy: ...,
     *   botName: ...,
     *   createdAt: ...,
     *   defaultAssistant: ...,
     *   defaultBargeIn: ...,
     *   defaultRecording: ...,
     *   defaultRecordingExport: ...,
     *   defaultSummarizeOnEnd: ...,
     *   defaultVoice: ...,
     *   defaultWebhookURL: ...,
     *   platform: ...,
     *   platformEmail: ...,
     *   status: ...,
     *   statusDetail: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarConnection)
     *   ->withID(...)
     *   ->withAutoJoinPolicy(...)
     *   ->withBotName(...)
     *   ->withCreatedAt(...)
     *   ->withDefaultAssistant(...)
     *   ->withDefaultBargeIn(...)
     *   ->withDefaultRecording(...)
     *   ->withDefaultRecordingExport(...)
     *   ->withDefaultSummarizeOnEnd(...)
     *   ->withDefaultVoice(...)
     *   ->withDefaultWebhookURL(...)
     *   ->withPlatform(...)
     *   ->withPlatformEmail(...)
     *   ->withStatus(...)
     *   ->withStatusDetail(...)
     *   ->withUpdatedAt(...)
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
     * @param AutoJoinPolicy|value-of<AutoJoinPolicy> $autoJoinPolicy
     * @param MeetingSessionAssistant|MeetingSessionAssistantShape|null $defaultAssistant
     * @param MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null $defaultRecordingExport
     * @param Platform|value-of<Platform> $platform
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        AutoJoinPolicy|string $autoJoinPolicy,
        ?string $botName,
        \DateTimeInterface $createdAt,
        MeetingSessionAssistant|array|null $defaultAssistant,
        ?bool $defaultBargeIn,
        ?bool $defaultRecording,
        MeetingSessionRecordingDestination|array|null $defaultRecordingExport,
        ?bool $defaultSummarizeOnEnd,
        ?string $defaultVoice,
        ?string $defaultWebhookURL,
        Platform|string $platform,
        ?string $platformEmail,
        Status|string $status,
        ?string $statusDetail,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['autoJoinPolicy'] = $autoJoinPolicy;
        $self['botName'] = $botName;
        $self['createdAt'] = $createdAt;
        $self['defaultAssistant'] = $defaultAssistant;
        $self['defaultBargeIn'] = $defaultBargeIn;
        $self['defaultRecording'] = $defaultRecording;
        $self['defaultRecordingExport'] = $defaultRecordingExport;
        $self['defaultSummarizeOnEnd'] = $defaultSummarizeOnEnd;
        $self['defaultVoice'] = $defaultVoice;
        $self['defaultWebhookURL'] = $defaultWebhookURL;
        $self['platform'] = $platform;
        $self['platformEmail'] = $platformEmail;
        $self['status'] = $status;
        $self['statusDetail'] = $statusDetail;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Calendar connection ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * Creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param MeetingSessionAssistant|MeetingSessionAssistantShape|null $defaultAssistant
     */
    public function withDefaultAssistant(
        MeetingSessionAssistant|array|null $defaultAssistant
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

    /**
     * Calendar provider: Google Calendar or Microsoft Outlook.
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * Connected calendar email address.
     */
    public function withPlatformEmail(?string $platformEmail): self
    {
        $self = clone $this;
        $self['platformEmail'] = $platformEmail;

        return $self;
    }

    /**
     * Connection status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Additional connection status detail.
     */
    public function withStatusDetail(?string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    /**
     * Last update time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
