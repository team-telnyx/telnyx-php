<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;
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
 * @phpstan-type MessageGetResponseShape = array{
 *   data?: null|OutboundMessagePayload|InboundMessagePayload
 * }
 */
final class MessageGetResponse implements BaseModel
{
    /** @use SdkModel<MessageGetResponseShape> */
    use SdkModel;

    #[Optional]
    public OutboundMessagePayload|InboundMessagePayload|null $data;

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
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   cost_breakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }|InboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<InboundMessagePayload\Cc>|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: InboundMessagePayload\Cost|null,
     *   cost_breakdown?: InboundMessagePayload\CostBreakdown|null,
     *   direction?: value-of<InboundMessagePayload\Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: InboundMessagePayload\From|null,
     *   media?: list<InboundMessagePayload\Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<InboundMessagePayload\RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<InboundMessagePayload\To>|null,
     *   type?: value-of<InboundMessagePayload\Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $data
     */
    public static function with(
        OutboundMessagePayload|array|InboundMessagePayload|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param OutboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<Cc>|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   cost_breakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }|InboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<InboundMessagePayload\Cc>|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: InboundMessagePayload\Cost|null,
     *   cost_breakdown?: InboundMessagePayload\CostBreakdown|null,
     *   direction?: value-of<InboundMessagePayload\Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: InboundMessagePayload\From|null,
     *   media?: list<InboundMessagePayload\Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<InboundMessagePayload\RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<InboundMessagePayload\To>|null,
     *   type?: value-of<InboundMessagePayload\Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $data
     */
    public function withData(
        OutboundMessagePayload|array|InboundMessagePayload $data
    ): self {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
