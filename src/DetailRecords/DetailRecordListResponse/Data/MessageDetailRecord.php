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
 *   record_type: string,
 *   carrier?: string|null,
 *   carrier_fee?: string|null,
 *   cld?: string|null,
 *   cli?: string|null,
 *   completed_at?: \DateTimeInterface|null,
 *   cost?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   delivery_status?: string|null,
 *   delivery_status_failover_url?: string|null,
 *   delivery_status_webhook_url?: string|null,
 *   direction?: value-of<Direction>|null,
 *   errors?: list<string>|null,
 *   fteu?: bool|null,
 *   mcc?: string|null,
 *   message_type?: value-of<MessageType>|null,
 *   mnc?: string|null,
 *   on_net?: bool|null,
 *   parts?: int|null,
 *   profile_id?: string|null,
 *   profile_name?: string|null,
 *   rate?: string|null,
 *   sent_at?: \DateTimeInterface|null,
 *   source_country_code?: string|null,
 *   status?: value-of<Status>|null,
 *   tags?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
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
    #[Required]
    public string $record_type;

    /**
     * Country-specific carrier used to send or receive the message.
     */
    #[Optional]
    public ?string $carrier;

    /**
     * Fee charged by certain carriers in order to deliver certain message types. Telnyx passes this fee on to the customer according to our pricing table.
     */
    #[Optional]
    public ?string $carrier_fee;

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
    #[Optional]
    public ?\DateTimeInterface $completed_at;

    /**
     * Amount, in the user currency, for the Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Two-letter representation of the country of the cld property using the ISO 3166-1 alpha-2 format.
     */
    #[Optional]
    public ?string $country_code;

    /**
     * Message creation time.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Final webhook delivery status.
     */
    #[Optional]
    public ?string $delivery_status;

    /**
     * Failover customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    #[Optional]
    public ?string $delivery_status_failover_url;

    /**
     * Primary customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    #[Optional]
    public ?string $delivery_status_webhook_url;

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
     * @var value-of<MessageType>|null $message_type
     */
    #[Optional(enum: MessageType::class)]
    public ?string $message_type;

    /**
     * Mobile network code. Only available for certain products, such as Global Outbound-Only from Alphanumeric Sender ID.
     */
    #[Optional]
    public ?string $mnc;

    /**
     * Indicates whether both sender and recipient numbers are Telnyx-managed.
     */
    #[Optional]
    public ?bool $on_net;

    /**
     * Number of message parts. The message is broken down in multiple parts when its length surpasses the limit of 160 characters.
     */
    #[Optional]
    public ?int $parts;

    /**
     * Unique identifier of the Messaging Profile used to send or receive the message.
     */
    #[Optional]
    public ?string $profile_id;

    /**
     * Name of the Messaging Profile used to send or receive the message.
     */
    #[Optional]
    public ?string $profile_name;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Time when the message was sent.
     */
    #[Optional]
    public ?\DateTimeInterface $sent_at;

    /**
     * Two-letter representation of the country of the cli property using the ISO 3166-1 alpha-2 format.
     */
    #[Optional]
    public ?string $source_country_code;

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
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * Identifier of the Telnyx account who owns the message.
     */
    #[Optional]
    public ?string $user_id;

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
     * MessageDetailRecord::with(record_type: ...)
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
     * @param MessageType|value-of<MessageType> $message_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $record_type = 'message_detail_record',
        ?string $carrier = null,
        ?string $carrier_fee = null,
        ?string $cld = null,
        ?string $cli = null,
        ?\DateTimeInterface $completed_at = null,
        ?string $cost = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?string $currency = null,
        ?string $delivery_status = null,
        ?string $delivery_status_failover_url = null,
        ?string $delivery_status_webhook_url = null,
        Direction|string|null $direction = null,
        ?array $errors = null,
        ?bool $fteu = null,
        ?string $mcc = null,
        MessageType|string|null $message_type = null,
        ?string $mnc = null,
        ?bool $on_net = null,
        ?int $parts = null,
        ?string $profile_id = null,
        ?string $profile_name = null,
        ?string $rate = null,
        ?\DateTimeInterface $sent_at = null,
        ?string $source_country_code = null,
        Status|string|null $status = null,
        ?string $tags = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_id = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $carrier_fee && $obj['carrier_fee'] = $carrier_fee;
        null !== $cld && $obj['cld'] = $cld;
        null !== $cli && $obj['cli'] = $cli;
        null !== $completed_at && $obj['completed_at'] = $completed_at;
        null !== $cost && $obj['cost'] = $cost;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $currency && $obj['currency'] = $currency;
        null !== $delivery_status && $obj['delivery_status'] = $delivery_status;
        null !== $delivery_status_failover_url && $obj['delivery_status_failover_url'] = $delivery_status_failover_url;
        null !== $delivery_status_webhook_url && $obj['delivery_status_webhook_url'] = $delivery_status_webhook_url;
        null !== $direction && $obj['direction'] = $direction;
        null !== $errors && $obj['errors'] = $errors;
        null !== $fteu && $obj['fteu'] = $fteu;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $message_type && $obj['message_type'] = $message_type;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $on_net && $obj['on_net'] = $on_net;
        null !== $parts && $obj['parts'] = $parts;
        null !== $profile_id && $obj['profile_id'] = $profile_id;
        null !== $profile_name && $obj['profile_name'] = $profile_name;
        null !== $rate && $obj['rate'] = $rate;
        null !== $sent_at && $obj['sent_at'] = $sent_at;
        null !== $source_country_code && $obj['source_country_code'] = $source_country_code;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    /**
     * Identifies the record schema.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

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
        $obj['carrier_fee'] = $carrierFee;

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
        $obj['completed_at'] = $completedAt;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Message creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['delivery_status'] = $deliveryStatus;

        return $obj;
    }

    /**
     * Failover customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusFailoverURL(
        string $deliveryStatusFailoverURL
    ): self {
        $obj = clone $this;
        $obj['delivery_status_failover_url'] = $deliveryStatusFailoverURL;

        return $obj;
    }

    /**
     * Primary customer-provided URL which Telnyx posts delivery status webhooks to.
     */
    public function withDeliveryStatusWebhookURL(
        string $deliveryStatusWebhookURL
    ): self {
        $obj = clone $this;
        $obj['delivery_status_webhook_url'] = $deliveryStatusWebhookURL;

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
        $obj['message_type'] = $messageType;

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
        $obj['on_net'] = $onNet;

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
        $obj['profile_id'] = $profileID;

        return $obj;
    }

    /**
     * Name of the Messaging Profile used to send or receive the message.
     */
    public function withProfileName(string $profileName): self
    {
        $obj = clone $this;
        $obj['profile_name'] = $profileName;

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
        $obj['sent_at'] = $sentAt;

        return $obj;
    }

    /**
     * Two-letter representation of the country of the cli property using the ISO 3166-1 alpha-2 format.
     */
    public function withSourceCountryCode(string $sourceCountryCode): self
    {
        $obj = clone $this;
        $obj['source_country_code'] = $sourceCountryCode;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifier of the Telnyx account who owns the message.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

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
