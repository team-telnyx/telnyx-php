<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse\Data;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScheduledEventListResponseShape = array{
 *   data: list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse>,
 *   meta: Meta,
 * }
 */
final class ScheduledEventListResponse implements BaseModel
{
    /** @use SdkModel<ScheduledEventListResponseShape> */
    use SdkModel;

    /** @var list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new ScheduledEventListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledEventListResponse)->withData(...)->withMeta(...)
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
     * @param list<ScheduledPhoneCallEventResponse|array{
     *   assistant_id: string,
     *   scheduled_at_fixed_datetime: \DateTimeInterface,
     *   telnyx_agent_target: string,
     *   telnyx_conversation_channel: value-of<ConversationChannelType>,
     *   telnyx_end_user_target: string,
     *   conversation_id?: string|null,
     *   conversation_metadata?: array<string,string|int|bool>|null,
     *   created_at?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retry_attempts?: int|null,
     *   retry_count?: int|null,
     *   scheduled_event_id?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }|ScheduledSMSEventResponse|array{
     *   assistant_id: string,
     *   scheduled_at_fixed_datetime: \DateTimeInterface,
     *   telnyx_agent_target: string,
     *   telnyx_conversation_channel: value-of<ConversationChannelType>,
     *   telnyx_end_user_target: string,
     *   text: string,
     *   conversation_id?: string|null,
     *   conversation_metadata?: array<string,string|int|bool>|null,
     *   created_at?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retry_count?: int|null,
     *   scheduled_event_id?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<ScheduledPhoneCallEventResponse|array{
     *   assistant_id: string,
     *   scheduled_at_fixed_datetime: \DateTimeInterface,
     *   telnyx_agent_target: string,
     *   telnyx_conversation_channel: value-of<ConversationChannelType>,
     *   telnyx_end_user_target: string,
     *   conversation_id?: string|null,
     *   conversation_metadata?: array<string,string|int|bool>|null,
     *   created_at?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retry_attempts?: int|null,
     *   retry_count?: int|null,
     *   scheduled_event_id?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }|ScheduledSMSEventResponse|array{
     *   assistant_id: string,
     *   scheduled_at_fixed_datetime: \DateTimeInterface,
     *   telnyx_agent_target: string,
     *   telnyx_conversation_channel: value-of<ConversationChannelType>,
     *   telnyx_end_user_target: string,
     *   text: string,
     *   conversation_id?: string|null,
     *   conversation_metadata?: array<string,string|int|bool>|null,
     *   created_at?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retry_count?: int|null,
     *   scheduled_event_id?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
