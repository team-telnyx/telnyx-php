<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ReplacedLinkClickWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   messageID?: string|null,
 *   recordType?: string|null,
 *   timeClicked?: \DateTimeInterface|null,
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
    #[Optional('message_id')]
    public ?string $messageID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    #[Optional('time_clicked')]
    public ?\DateTimeInterface $timeClicked;

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
        ?string $messageID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $timeClicked = null,
        ?string $to = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $messageID && $self['messageID'] = $messageID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $timeClicked && $self['timeClicked'] = $timeClicked;
        null !== $to && $self['to'] = $to;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The message ID associated with the clicked link.
     */
    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the message request was received.
     */
    public function withTimeClicked(\DateTimeInterface $timeClicked): self
    {
        $self = clone $this;
        $self['timeClicked'] = $timeClicked;

        return $self;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The original link that was sent in the message.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
