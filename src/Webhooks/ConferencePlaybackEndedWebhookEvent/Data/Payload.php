<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferencePlaybackEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   creator_call_session_id?: string|null,
 *   media_name?: string|null,
 *   media_url?: string|null,
 *   occurred_at?: \DateTimeInterface|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * ID of the conference the text was spoken in.
     */
    #[Optional]
    public ?string $conference_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * ID that is unique to the call session that started the conference.
     */
    #[Optional]
    public ?string $creator_call_session_id;

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    #[Optional]
    public ?string $media_name;

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    #[Optional]
    public ?string $media_url;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Optional]
    public ?\DateTimeInterface $occurred_at;

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
        ?string $conference_id = null,
        ?string $connection_id = null,
        ?string $creator_call_session_id = null,
        ?string $media_name = null,
        ?string $media_url = null,
        ?\DateTimeInterface $occurred_at = null,
    ): self {
        $obj = new self;

        null !== $conference_id && $obj['conference_id'] = $conference_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $creator_call_session_id && $obj['creator_call_session_id'] = $creator_call_session_id;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $media_url && $obj['media_url'] = $media_url;
        null !== $occurred_at && $obj['occurred_at'] = $occurred_at;

        return $obj;
    }

    /**
     * ID of the conference the text was spoken in.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conference_id'] = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the call session that started the conference.
     */
    public function withCreatorCallSessionID(string $creatorCallSessionID): self
    {
        $obj = clone $this;
        $obj['creator_call_session_id'] = $creatorCallSessionID;

        return $obj;
    }

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['media_name'] = $mediaName;

        return $obj;
    }

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['media_url'] = $mediaURL;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurred_at'] = $occurredAt;

        return $obj;
    }
}
