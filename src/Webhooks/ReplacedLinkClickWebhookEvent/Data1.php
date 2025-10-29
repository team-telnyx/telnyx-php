<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ReplacedLinkClickWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   messageID?: string,
 *   recordType?: string,
 *   timeClicked?: \DateTimeInterface,
 *   to?: string,
 *   url?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The message ID associated with the clicked link.
     */
    #[Api('message_id', optional: true)]
    public ?string $messageID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Api('time_clicked', optional: true)]
    public ?\DateTimeInterface $timeClicked;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * The original link that was sent in the message.
     */
    #[Api(optional: true)]
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
        ?string $messageID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $timeClicked = null,
        ?string $to = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $messageID && $obj->messageID = $messageID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $timeClicked && $obj->timeClicked = $timeClicked;
        null !== $to && $obj->to = $to;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * The message ID associated with the clicked link.
     */
    public function withMessageID(string $messageID): self
    {
        $obj = clone $this;
        $obj->messageID = $messageID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withTimeClicked(\DateTimeInterface $timeClicked): self
    {
        $obj = clone $this;
        $obj->timeClicked = $timeClicked;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The original link that was sent in the message.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
