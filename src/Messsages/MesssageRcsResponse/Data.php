<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageRcsResponse\Data\From;
use Telnyx\Messsages\MesssageRcsResponse\Data\To;
use Telnyx\Messsages\RcsAgentMessage;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   body?: RcsAgentMessage,
 *   direction?: string,
 *   encoding?: string,
 *   from?: From,
 *   messagingProfileID?: string,
 *   organizationID?: string,
 *   receivedAt?: \DateTimeInterface,
 *   recordType?: string,
 *   to?: list<To>,
 *   type?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * message ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?RcsAgentMessage $body;

    #[Api(optional: true)]
    public ?string $direction;

    #[Api(optional: true)]
    public ?string $encoding;

    #[Api(optional: true)]
    public ?From $from;

    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    #[Api('organization_id', optional: true)]
    public ?string $organizationID;

    #[Api('received_at', optional: true)]
    public ?\DateTimeInterface $receivedAt;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /** @var list<To>|null $to */
    #[Api(list: To::class, optional: true)]
    public ?array $to;

    #[Api(optional: true)]
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
     * @param list<To> $to
     */
    public static function with(
        ?string $id = null,
        ?RcsAgentMessage $body = null,
        ?string $direction = null,
        ?string $encoding = null,
        ?From $from = null,
        ?string $messagingProfileID = null,
        ?string $organizationID = null,
        ?\DateTimeInterface $receivedAt = null,
        ?string $recordType = null,
        ?array $to = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $direction && $obj->direction = $direction;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $from && $obj->from = $from;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $organizationID && $obj->organizationID = $organizationID;
        null !== $receivedAt && $obj->receivedAt = $receivedAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $to && $obj->to = $to;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    /**
     * message ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withBody(RcsAgentMessage $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    public function withDirection(string $direction): self
    {
        $obj = clone $this;
        $obj->direction = $direction;

        return $obj;
    }

    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    public function withFrom(From $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organizationID = $organizationID;

        return $obj;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $obj = clone $this;
        $obj->receivedAt = $receivedAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<To> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
