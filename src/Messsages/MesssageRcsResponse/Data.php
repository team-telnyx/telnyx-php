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
 *   id?: string|null,
 *   body?: RcsAgentMessage|null,
 *   direction?: string|null,
 *   encoding?: string|null,
 *   from?: From|null,
 *   messaging_profile_id?: string|null,
 *   organization_id?: string|null,
 *   received_at?: \DateTimeInterface|null,
 *   record_type?: string|null,
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

    #[Api(optional: true)]
    public ?string $messaging_profile_id;

    #[Api(optional: true)]
    public ?string $organization_id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $received_at;

    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $messaging_profile_id = null,
        ?string $organization_id = null,
        ?\DateTimeInterface $received_at = null,
        ?string $record_type = null,
        ?array $to = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $direction && $obj->direction = $direction;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $from && $obj->from = $from;
        null !== $messaging_profile_id && $obj->messaging_profile_id = $messaging_profile_id;
        null !== $organization_id && $obj->organization_id = $organization_id;
        null !== $received_at && $obj->received_at = $received_at;
        null !== $record_type && $obj->record_type = $record_type;
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
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organization_id = $organizationID;

        return $obj;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $obj = clone $this;
        $obj->received_at = $receivedAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
