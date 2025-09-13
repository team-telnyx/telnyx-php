<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse\Data;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type scheduled_event_list_response = array{
 *   data: list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse>,
 *   meta: Meta,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ScheduledEventListResponse implements BaseModel
{
    /** @use SdkModel<scheduled_event_list_response> */
    use SdkModel;

    /**
     * @var list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse> $data
     */
    #[Api(list: Data::class)]
    public array $data;

    #[Api]
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
     * @param list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
