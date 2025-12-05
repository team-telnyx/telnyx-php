<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   creator_call_session_id?: string|null,
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
    #[Api(optional: true)]
    public ?string $conference_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * ID that is unique to the call session that started the conference.
     */
    #[Api(optional: true)]
    public ?string $creator_call_session_id;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api(optional: true)]
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
        ?\DateTimeInterface $occurred_at = null,
    ): self {
        $obj = new self;

        null !== $conference_id && $obj['conference_id'] = $conference_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $creator_call_session_id && $obj['creator_call_session_id'] = $creator_call_session_id;
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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurred_at'] = $occurredAt;

        return $obj;
    }
}
