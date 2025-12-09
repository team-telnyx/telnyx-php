<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\OutboundMessagePayload\Cc;
use Telnyx\Messages\OutboundMessagePayload\Cost;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown;
use Telnyx\Messages\OutboundMessagePayload\Direction;
use Telnyx\Messages\OutboundMessagePayload\From;
use Telnyx\Messages\OutboundMessagePayload\Media;
use Telnyx\Messages\OutboundMessagePayload\RecordType;
use Telnyx\Messages\OutboundMessagePayload\To;
use Telnyx\Messages\OutboundMessagePayload\Type;

/**
 * @phpstan-type MessageSendShortCodeResponseShape = array{
 *   data?: OutboundMessagePayload|null
 * }
 */
final class MessageSendShortCodeResponse implements BaseModel
{
    /** @use SdkModel<MessageSendShortCodeResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OutboundMessagePayload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OutboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<Cc>|null,
     *   completedAt?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   costBreakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messagingProfileID?: string|null,
     *   organizationID?: string|null,
     *   parts?: int|null,
     *   receivedAt?: \DateTimeInterface|null,
     *   recordType?: value-of<RecordType>|null,
     *   sentAt?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcrCampaignBillable?: bool|null,
     *   tcrCampaignID?: string|null,
     *   tcrCampaignRegistered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   validUntil?: \DateTimeInterface|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public static function with(OutboundMessagePayload|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param OutboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<Cc>|null,
     *   completedAt?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   costBreakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messagingProfileID?: string|null,
     *   organizationID?: string|null,
     *   parts?: int|null,
     *   receivedAt?: \DateTimeInterface|null,
     *   recordType?: value-of<RecordType>|null,
     *   sentAt?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcrCampaignBillable?: bool|null,
     *   tcrCampaignID?: string|null,
     *   tcrCampaignRegistered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   validUntil?: \DateTimeInterface|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * } $data
     */
    public function withData(OutboundMessagePayload|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
