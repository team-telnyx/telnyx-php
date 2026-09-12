<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Messages\MessagingError0b38e7044b;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Body;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Cost;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Direction;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\From;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Origin;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\RecordType;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Type;

/**
 * @phpstan-import-type BodyShape from \Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Body
 * @phpstan-import-type CostShape from \Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\Cost
 * @phpstan-import-type MessagingError0b38e7044bShape from \Telnyx\Messages\MessagingError0b38e7044b
 * @phpstan-import-type FromShape from \Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\From
 *
 * @phpstan-type PayloadShape = array{
 *   id: string,
 *   body: Body|BodyShape,
 *   cost: Cost|CostShape,
 *   direction: Direction|value-of<Direction>,
 *   errors: list<MessagingError0b38e7044b|MessagingError0b38e7044bShape>,
 *   from: From|FromShape,
 *   messagingProfileID: string,
 *   organizationID: string,
 *   origin: Origin|value-of<Origin>,
 *   recordType: \Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload\RecordType>,
 *   to: string,
 *   type: Type|value-of<Type>,
 *   receivedAt?: \DateTimeInterface|null,
 *   tags?: list<string>|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Telnyx identifier for the mirrored message.
     */
    #[Required]
    public string $id;

    /**
     * Mirrored WhatsApp message content. The content property matches the value of `type`.
     */
    #[Required]
    public Body $body;

    /**
     * No charge is created for a Business app message echo.
     */
    #[Required]
    public Cost $cost;

    /**
     * Indicates that the business sent the message to the WhatsApp user.
     *
     * @var value-of<Direction> $direction
     */
    #[Required(enum: Direction::class)]
    public string $direction;

    /** @var list<MessagingError0b38e7044b> $errors */
    #[Required(list: MessagingError0b38e7044b::class)]
    public array $errors;

    #[Required]
    public From $from;

    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    #[Required('organization_id')]
    public string $organizationID;

    /**
     * Identifies the WhatsApp Business app as the source of the message.
     *
     * @var value-of<Origin> $origin
     */
    #[Required(enum: Origin::class)]
    public string $origin;

    /**
     * @var value-of<RecordType> $recordType
     */
    #[Required(
        'record_type',
        enum: RecordType::class,
    )]
    public string $recordType;

    /**
     * WhatsApp user who received the Business app message.
     */
    #[Required]
    public string $to;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('received_at')]
    public ?\DateTimeInterface $receivedAt;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('webhook_failover_url', nullable: true)]
    public ?string $webhookFailoverURL;

    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(
     *   id: ...,
     *   body: ...,
     *   cost: ...,
     *   direction: ...,
     *   errors: ...,
     *   from: ...,
     *   messagingProfileID: ...,
     *   organizationID: ...,
     *   origin: ...,
     *   recordType: ...,
     *   to: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)
     *   ->withID(...)
     *   ->withBody(...)
     *   ->withCost(...)
     *   ->withDirection(...)
     *   ->withErrors(...)
     *   ->withFrom(...)
     *   ->withMessagingProfileID(...)
     *   ->withOrganizationID(...)
     *   ->withOrigin(...)
     *   ->withRecordType(...)
     *   ->withTo(...)
     *   ->withType(...)
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
     * @param Body|BodyShape $body
     * @param Cost|CostShape $cost
     * @param Direction|value-of<Direction> $direction
     * @param list<MessagingError0b38e7044b|MessagingError0b38e7044bShape> $errors
     * @param From|FromShape $from
     * @param Origin|value-of<Origin> $origin
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
     * @param list<string>|null $tags
     */
    public static function with(
        string $id,
        Body|array $body,
        Cost|array $cost,
        Direction|string $direction,
        array $errors,
        From|array $from,
        string $messagingProfileID,
        string $organizationID,
        Origin|string $origin,
        RecordType|string $recordType,
        string $to,
        Type|string $type,
        string|Omitted|null $webhookFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookURL = Omitted::VALUE,
        ?\DateTimeInterface $receivedAt = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['body'] = $body;
        $self['cost'] = $cost;
        $self['direction'] = $direction;
        $self['errors'] = $errors;
        $self['from'] = $from;
        $self['messagingProfileID'] = $messagingProfileID;
        $self['organizationID'] = $organizationID;
        $self['origin'] = $origin;
        $self['recordType'] = $recordType;
        $self['to'] = $to;
        $self['type'] = $type;

        null !== $receivedAt && $self['receivedAt'] = $receivedAt;
        null !== $tags && $self['tags'] = $tags;
        Omitted::VALUE !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        Omitted::VALUE !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Telnyx identifier for the mirrored message.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Mirrored WhatsApp message content. The content property matches the value of `type`.
     *
     * @param Body|BodyShape $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * No charge is created for a Business app message echo.
     *
     * @param Cost|CostShape $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Indicates that the business sent the message to the WhatsApp user.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * @param list<MessagingError0b38e7044b|MessagingError0b38e7044bShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * @param From|FromShape $from
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

    /**
     * Identifies the WhatsApp Business app as the source of the message.
     *
     * @param Origin|value-of<Origin> $origin
     */
    public function withOrigin(Origin|string $origin): self
    {
        $self = clone $this;
        $self['origin'] = $origin;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(
        RecordType|string $recordType,
    ): self {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * WhatsApp user who received the Business app message.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
