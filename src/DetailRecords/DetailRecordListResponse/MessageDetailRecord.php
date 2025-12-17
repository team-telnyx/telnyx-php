<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord\Direction;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord\MessageType;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord\Status;

/**
 * @phpstan-type MessageDetailRecordShape = array{
 *   recordType: string,
 *   carrier?: string|null,
 *   carrierFee?: string|null,
 *   cld?: string|null,
 *   cli?: string|null,
 *   completedAt?: \DateTimeInterface|null,
 *   cost?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   deliveryStatus?: string|null,
 *   deliveryStatusFailoverURL?: string|null,
 *   deliveryStatusWebhookURL?: string|null,
 *   direction?: null|Direction|value-of<Direction>,
 *   errors?: list<string>|null,
 *   fteu?: bool|null,
 *   mcc?: string|null,
 *   messageType?: null|MessageType|value-of<MessageType>,
 *   mnc?: string|null,
 *   onNet?: bool|null,
 *   parts?: int|null,
 *   profileID?: string|null,
 *   profileName?: string|null,
 *   rate?: string|null,
 *   sentAt?: \DateTimeInterface|null,
 *   sourceCountryCode?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   tags?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   uuid?: string|null,
 * }
 */
final class MessageDetailRecord implements BaseModel
{
    /** @use SdkModel<MessageDetailRecordShape> */
    use SdkModel;

    /**
     * Identifies the record schema.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * Country-specific carrier used to send or receive the message.
     */
    #[Optional]
    public ?string $carrier;

    /**
     * Fee charged by certain carriers in order to deliver certain message types. Telnyx passes this fee on to the customer according to our pricing table.
     */
    #[Optional('carrier_fee')]
    public ?string $carrierFee;

    /**
     * The recipient of the message (to parameter in the Messaging API).
     */
    #[Optional]
    public ?string $cld;

    /**
     * The sender of the message (from parameter in the Messaging API). For Alphanumeric ID messages, this is the sender ID value.
     */
    #[Optional]
    public ?string $cli;

    /**
     * Message completion time.
     */
    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * Amount, in the user currency, for the Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Two-letter representation of the country of the cld property using the ISO 3166-1 alpha-2 format.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Message creation time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Final webhook delivery status.
     */
    #[Optional('delivery_status')]
    public ?string $deliveryStatus;

    /**
     * Failover customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    #[Optional('delivery_status_failover_url')]
    public ?string $deliveryStatusFailoverURL;

    /**
     * Primary customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    #[Optional('delivery_status_webhook_url')]
    public ?string $deliveryStatusWebhookURL;

    /**
     * Logical direction of the message from the Telnyx customer's perspective. It's inbound when the Telnyx customer receives the message, or outbound otherwise.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * Telnyx API error codes returned by the Telnyx gateway.
     *
     * @var list<string>|null $errors
     */
    #[Optional(list: 'string')]
    public ?array $errors;

    /**
     * Indicates whether this is a Free-To-End-User (FTEU) short code message.
     */
    #[Optional]
    public ?bool $fteu;

    /**
     * Mobile country code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Describes the Messaging service used to send the message. Available services are: Short Message Service (SMS), Multimedia Messaging Service (MMS), and Rich Communication Services (RCS).
     *
     * @var value-of<MessageType>|null $messageType
     */
    #[Optional('message_type', enum: MessageType::class)]
    public ?string $messageType;

    /**
     * Mobile network code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    #[Optional]
    public ?string $mnc;

    /**
     * Indicates whether both sender and recipient numbers are Telnyx-managed.
     */
    #[Optional('on_net')]
    public ?bool $onNet;

    /**
     * Number of message parts. The message is broken down in multiple parts when its length surpasses the limit of 160 characters.
     */
    #[Optional]
    public ?int $parts;

    /**
     * Unique identifier of the Messaging Profile used to send or receive the message.
     */
    #[Optional('profile_id')]
    public ?string $profileID;

    /**
     * Name of the Messaging Profile used to send or receive the message.
     */
    #[Optional('profile_name')]
    public ?string $profileName;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Time when the message was sent.
     */
    #[Optional('sent_at')]
    public ?\DateTimeInterface $sentAt;

    /**
     * Two-letter representation of the country of the cli property using the ISO 3166-1 alpha-2 format.
     */
    #[Optional('source_country_code')]
    public ?string $sourceCountryCode;

    /**
     * Final status of the message after the delivery attempt.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Comma-separated tags assigned to the Telnyx number associated with the message.
     */
    #[Optional]
    public ?string $tags;

    /**
     * Message updated time.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identifier of the Telnyx account who owns the message.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Unique identifier of the message.
     */
    #[Optional]
    public ?string $uuid;

    /**
     * `new MessageDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageDetailRecord::with(recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageDetailRecord)->withRecordType(...)
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
     * @param Direction|value-of<Direction>|null $direction
     * @param list<string>|null $errors
     * @param MessageType|value-of<MessageType>|null $messageType
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string $recordType = 'message_detail_record',
        ?string $carrier = null,
        ?string $carrierFee = null,
        ?string $cld = null,
        ?string $cli = null,
        ?\DateTimeInterface $completedAt = null,
        ?string $cost = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $currency = null,
        ?string $deliveryStatus = null,
        ?string $deliveryStatusFailoverURL = null,
        ?string $deliveryStatusWebhookURL = null,
        Direction|string|null $direction = null,
        ?array $errors = null,
        ?bool $fteu = null,
        ?string $mcc = null,
        MessageType|string|null $messageType = null,
        ?string $mnc = null,
        ?bool $onNet = null,
        ?int $parts = null,
        ?string $profileID = null,
        ?string $profileName = null,
        ?string $rate = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $sourceCountryCode = null,
        Status|string|null $status = null,
        ?string $tags = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $carrierFee && $self['carrierFee'] = $carrierFee;
        null !== $cld && $self['cld'] = $cld;
        null !== $cli && $self['cli'] = $cli;
        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $cost && $self['cost'] = $cost;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $deliveryStatus && $self['deliveryStatus'] = $deliveryStatus;
        null !== $deliveryStatusFailoverURL && $self['deliveryStatusFailoverURL'] = $deliveryStatusFailoverURL;
        null !== $deliveryStatusWebhookURL && $self['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;
        null !== $direction && $self['direction'] = $direction;
        null !== $errors && $self['errors'] = $errors;
        null !== $fteu && $self['fteu'] = $fteu;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $messageType && $self['messageType'] = $messageType;
        null !== $mnc && $self['mnc'] = $mnc;
        null !== $onNet && $self['onNet'] = $onNet;
        null !== $parts && $self['parts'] = $parts;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $profileName && $self['profileName'] = $profileName;
        null !== $rate && $self['rate'] = $rate;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $sourceCountryCode && $self['sourceCountryCode'] = $sourceCountryCode;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    /**
     * Identifies the record schema.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Country-specific carrier used to send or receive the message.
     */
    public function withCarrier(string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * Fee charged by certain carriers in order to deliver certain message types. Telnyx passes this fee on to the customer according to our pricing table.
     */
    public function withCarrierFee(string $carrierFee): self
    {
        $self = clone $this;
        $self['carrierFee'] = $carrierFee;

        return $self;
    }

    /**
     * The recipient of the message (to parameter in the Messaging API).
     */
    public function withCld(string $cld): self
    {
        $self = clone $this;
        $self['cld'] = $cld;

        return $self;
    }

    /**
     * The sender of the message (from parameter in the Messaging API). For Alphanumeric ID messages, this is the sender ID value.
     */
    public function withCli(string $cli): self
    {
        $self = clone $this;
        $self['cli'] = $cli;

        return $self;
    }

    /**
     * Message completion time.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Amount, in the user currency, for the Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Two-letter representation of the country of the cld property using the ISO 3166-1 alpha-2 format.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Message creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Final webhook delivery status.
     */
    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $self = clone $this;
        $self['deliveryStatus'] = $deliveryStatus;

        return $self;
    }

    /**
     * Failover customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusFailoverURL(
        string $deliveryStatusFailoverURL
    ): self {
        $self = clone $this;
        $self['deliveryStatusFailoverURL'] = $deliveryStatusFailoverURL;

        return $self;
    }

    /**
     * Primary customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $self = clone $this;
        $self['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;

        return $self;
    }

    /**
     * Logical direction of the message from the Telnyx customer's perspective. It's inbound when the Telnyx customer receives the message, or outbound otherwise.
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
     * Telnyx API error codes returned by the Telnyx gateway.
     *
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Indicates whether this is a Free-To-End-User (FTEU) short code message.
     */
    public function withFteu(bool $fteu): self
    {
        $self = clone $this;
        $self['fteu'] = $fteu;

        return $self;
    }

    /**
     * Mobile country code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Describes the Messaging service used to send the message. Available services are: Short Message Service (SMS), Multimedia Messaging Service (MMS), and Rich Communication Services (RCS).
     *
     * @param MessageType|value-of<MessageType> $messageType
     */
    public function withMessageType(MessageType|string $messageType): self
    {
        $self = clone $this;
        $self['messageType'] = $messageType;

        return $self;
    }

    /**
     * Mobile network code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    public function withMnc(string $mnc): self
    {
        $self = clone $this;
        $self['mnc'] = $mnc;

        return $self;
    }

    /**
     * Indicates whether both sender and recipient numbers are Telnyx-managed.
     */
    public function withOnNet(bool $onNet): self
    {
        $self = clone $this;
        $self['onNet'] = $onNet;

        return $self;
    }

    /**
     * Number of message parts. The message is broken down in multiple parts when its length surpasses the limit of 160 characters.
     */
    public function withParts(int $parts): self
    {
        $self = clone $this;
        $self['parts'] = $parts;

        return $self;
    }

    /**
     * Unique identifier of the Messaging Profile used to send or receive the message.
     */
    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * Name of the Messaging Profile used to send or receive the message.
     */
    public function withProfileName(string $profileName): self
    {
        $self = clone $this;
        $self['profileName'] = $profileName;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Time when the message was sent.
     */
    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * Two-letter representation of the country of the cli property using the ISO 3166-1 alpha-2 format.
     */
    public function withSourceCountryCode(string $sourceCountryCode): self
    {
        $self = clone $this;
        $self['sourceCountryCode'] = $sourceCountryCode;

        return $self;
    }

    /**
     * Final status of the message after the delivery attempt.
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
     * Comma-separated tags assigned to the Telnyx number associated with the message.
     */
    public function withTags(string $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Message updated time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifier of the Telnyx account who owns the message.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Unique identifier of the message.
     */
    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
