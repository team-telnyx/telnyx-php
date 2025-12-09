<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\Direction;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\MessageType;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\Status;

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
 *   direction?: value-of<Direction>|null,
 *   errors?: list<string>|null,
 *   fteu?: bool|null,
 *   mcc?: string|null,
 *   messageType?: value-of<MessageType>|null,
 *   mnc?: string|null,
 *   onNet?: bool|null,
 *   parts?: int|null,
 *   profileID?: string|null,
 *   profileName?: string|null,
 *   rate?: string|null,
 *   sentAt?: \DateTimeInterface|null,
 *   sourceCountryCode?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param Direction|value-of<Direction> $direction
     * @param list<string> $errors
     * @param MessageType|value-of<MessageType> $messageType
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        $obj['recordType'] = $recordType;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $carrierFee && $obj['carrierFee'] = $carrierFee;
        null !== $cld && $obj['cld'] = $cld;
        null !== $cli && $obj['cli'] = $cli;
        null !== $completedAt && $obj['completedAt'] = $completedAt;
        null !== $cost && $obj['cost'] = $cost;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $currency && $obj['currency'] = $currency;
        null !== $deliveryStatus && $obj['deliveryStatus'] = $deliveryStatus;
        null !== $deliveryStatusFailoverURL && $obj['deliveryStatusFailoverURL'] = $deliveryStatusFailoverURL;
        null !== $deliveryStatusWebhookURL && $obj['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;
        null !== $direction && $obj['direction'] = $direction;
        null !== $errors && $obj['errors'] = $errors;
        null !== $fteu && $obj['fteu'] = $fteu;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $messageType && $obj['messageType'] = $messageType;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $onNet && $obj['onNet'] = $onNet;
        null !== $parts && $obj['parts'] = $parts;
        null !== $profileID && $obj['profileID'] = $profileID;
        null !== $profileName && $obj['profileName'] = $profileName;
        null !== $rate && $obj['rate'] = $rate;
        null !== $sentAt && $obj['sentAt'] = $sentAt;
        null !== $sourceCountryCode && $obj['sourceCountryCode'] = $sourceCountryCode;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userID && $obj['userID'] = $userID;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    /**
     * Identifies the record schema.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Country-specific carrier used to send or receive the message.
     */
    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj['carrier'] = $carrier;

        return $obj;
    }

    /**
     * Fee charged by certain carriers in order to deliver certain message types. Telnyx passes this fee on to the customer according to our pricing table.
     */
    public function withCarrierFee(string $carrierFee): self
    {
        $obj = clone $this;
        $obj['carrierFee'] = $carrierFee;

        return $obj;
    }

    /**
     * The recipient of the message (to parameter in the Messaging API).
     */
    public function withCld(string $cld): self
    {
        $obj = clone $this;
        $obj['cld'] = $cld;

        return $obj;
    }

    /**
     * The sender of the message (from parameter in the Messaging API). For Alphanumeric ID messages, this is the sender ID value.
     */
    public function withCli(string $cli): self
    {
        $obj = clone $this;
        $obj['cli'] = $cli;

        return $obj;
    }

    /**
     * Message completion time.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * Amount, in the user currency, for the Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Two-letter representation of the country of the cld property using the ISO 3166-1 alpha-2 format.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * Message creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Final webhook delivery status.
     */
    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $obj = clone $this;
        $obj['deliveryStatus'] = $deliveryStatus;

        return $obj;
    }

    /**
     * Failover customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusFailoverURL(
        string $deliveryStatusFailoverURL
    ): self {
        $obj = clone $this;
        $obj['deliveryStatusFailoverURL'] = $deliveryStatusFailoverURL;

        return $obj;
    }

    /**
     * Primary customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $obj = clone $this;
        $obj['deliveryStatusWebhookURL'] = $deliveryStatusWebhookURL;

        return $obj;
    }

    /**
     * Logical direction of the message from the Telnyx customer's perspective. It's inbound when the Telnyx customer receives the message, or outbound otherwise.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * Telnyx API error codes returned by the Telnyx gateway.
     *
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * Indicates whether this is a Free-To-End-User (FTEU) short code message.
     */
    public function withFteu(bool $fteu): self
    {
        $obj = clone $this;
        $obj['fteu'] = $fteu;

        return $obj;
    }

    /**
     * Mobile country code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj['mcc'] = $mcc;

        return $obj;
    }

    /**
     * Describes the Messaging service used to send the message. Available services are: Short Message Service (SMS), Multimedia Messaging Service (MMS), and Rich Communication Services (RCS).
     *
     * @param MessageType|value-of<MessageType> $messageType
     */
    public function withMessageType(MessageType|string $messageType): self
    {
        $obj = clone $this;
        $obj['messageType'] = $messageType;

        return $obj;
    }

    /**
     * Mobile network code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj['mnc'] = $mnc;

        return $obj;
    }

    /**
     * Indicates whether both sender and recipient numbers are Telnyx-managed.
     */
    public function withOnNet(bool $onNet): self
    {
        $obj = clone $this;
        $obj['onNet'] = $onNet;

        return $obj;
    }

    /**
     * Number of message parts. The message is broken down in multiple parts when its length surpasses the limit of 160 characters.
     */
    public function withParts(int $parts): self
    {
        $obj = clone $this;
        $obj['parts'] = $parts;

        return $obj;
    }

    /**
     * Unique identifier of the Messaging Profile used to send or receive the message.
     */
    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj['profileID'] = $profileID;

        return $obj;
    }

    /**
     * Name of the Messaging Profile used to send or receive the message.
     */
    public function withProfileName(string $profileName): self
    {
        $obj = clone $this;
        $obj['profileName'] = $profileName;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * Time when the message was sent.
     */
    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj['sentAt'] = $sentAt;

        return $obj;
    }

    /**
     * Two-letter representation of the country of the cli property using the ISO 3166-1 alpha-2 format.
     */
    public function withSourceCountryCode(string $sourceCountryCode): self
    {
        $obj = clone $this;
        $obj['sourceCountryCode'] = $sourceCountryCode;

        return $obj;
    }

    /**
     * Final status of the message after the delivery attempt.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Comma-separated tags assigned to the Telnyx number associated with the message.
     */
    public function withTags(string $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Message updated time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifier of the Telnyx account who owns the message.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Unique identifier of the message.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj['uuid'] = $uuid;

        return $obj;
    }
}
