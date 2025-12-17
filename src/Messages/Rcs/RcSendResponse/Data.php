<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs\RcSendResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\Rcs\RcSendResponse\Data\From;
use Telnyx\Messages\Rcs\RcSendResponse\Data\To;
use Telnyx\Messsages\RcsAgentMessage;

/**
 * @phpstan-import-type RcsAgentMessageShape from \Telnyx\Messsages\RcsAgentMessage
 * @phpstan-import-type FromShape from \Telnyx\Messages\Rcs\RcSendResponse\Data\From
 * @phpstan-import-type ToShape from \Telnyx\Messages\Rcs\RcSendResponse\Data\To
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: null|RcsAgentMessage|RcsAgentMessageShape,
 *   direction?: string|null,
 *   encoding?: string|null,
 *   from?: null|From|FromShape,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   receivedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   to?: list<ToShape>|null,
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
     * @param RcsAgentMessageShape $body
     * @param FromShape $from
     * @param list<ToShape> $to
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $direction && $self['direction'] = $direction;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $from && $self['from'] = $from;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $receivedAt && $self['receivedAt'] = $receivedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $to && $self['to'] = $to;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * message ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param RcsAgentMessageShape $body
     */
    public function withBody(RcsAgentMessage|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    public function withDirection(string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * @param FromShape $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<ToShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
