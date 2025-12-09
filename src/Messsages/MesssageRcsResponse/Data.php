<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageRcsResponse\Data\From;
use Telnyx\Messsages\MesssageRcsResponse\Data\To;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: RcsAgentMessage|null,
 *   direction?: string|null,
 *   encoding?: string|null,
 *   from?: From|null,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   to?: list<To>|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * message ID.
     */
    #[Optional]
    public ?string $id;

    #[Optional]
    public ?RcsAgentMessage $body;

    #[Optional]
    public ?string $direction;

    #[Optional]
    public ?string $encoding;

    #[Optional]
    public ?From $from;

    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    #[Optional('organization_id')]
    public ?string $organizationID;

    #[Optional('received_at')]
    public ?\DateTimeInterface $receivedAt;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<To>|null $to */
    #[Optional(list: To::class)]
    public ?array $to;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsAgentMessage|array{
     *   contentMessage?: ContentMessage|null,
     *   event?: Event|null,
     *   expireTime?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $body
     * @param From|array{
     *   agentID?: string|null, agentName?: string|null, carrier?: string|null
     * } $from
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: string|null,
     *   phoneNumber?: string|null,
     *   status?: string|null,
     * }> $to
     */
    public static function with(
        ?string $id = null,
        RcsAgentMessage|array|null $body = null,
        ?string $direction = null,
        ?string $encoding = null,
        From|array|null $from = null,
        ?string $messagingProfileID = null,
        ?string $organizationID = null,
        ?\DateTimeInterface $receivedAt = null,
        ?string $recordType = null,
        ?array $to = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $body && $obj['body'] = $body;
        null !== $direction && $obj['direction'] = $direction;
        null !== $encoding && $obj['encoding'] = $encoding;
        null !== $from && $obj['from'] = $from;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $obj['organizationID'] = $organizationID;
        null !== $receivedAt && $obj['receivedAt'] = $receivedAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $to && $obj['to'] = $to;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * message ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param RcsAgentMessage|array{
     *   contentMessage?: ContentMessage|null,
     *   event?: Event|null,
     *   expireTime?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $body
     */
    public function withBody(RcsAgentMessage|array $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }

    public function withDirection(string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj['encoding'] = $encoding;

        return $obj;
    }

    /**
     * @param From|array{
     *   agentID?: string|null, agentName?: string|null, carrier?: string|null
     * } $from
     */
    public function withFrom(From|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organizationID'] = $organizationID;

        return $obj;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $obj = clone $this;
        $obj['receivedAt'] = $receivedAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param list<To|array{
     *   carrier?: string|null,
     *   lineType?: string|null,
     *   phoneNumber?: string|null,
     *   status?: string|null,
     * }> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
