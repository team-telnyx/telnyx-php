<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ReplacedLinkClickWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   message_id?: string|null,
 *   record_type?: string|null,
 *   time_clicked?: \DateTimeInterface|null,
 *   to?: string|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The message ID associated with the clicked link.
     */
    #[Optional]
    public ?string $message_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Optional]
    public ?\DateTimeInterface $time_clicked;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Optional]
    public ?string $to;

    /**
     * The original link that was sent in the message.
     */
    #[Optional]
    public ?string $url;

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
        ?string $message_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $time_clicked = null,
        ?string $to = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $message_id && $obj['message_id'] = $message_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $time_clicked && $obj['time_clicked'] = $time_clicked;
        null !== $to && $obj['to'] = $to;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * The message ID associated with the clicked link.
     */
    public function withMessageID(string $messageID): self
    {
        $obj = clone $this;
        $obj['message_id'] = $messageID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withTimeClicked(\DateTimeInterface $timeClicked): self
    {
        $obj = clone $this;
        $obj['time_clicked'] = $timeClicked;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The original link that was sent in the message.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
