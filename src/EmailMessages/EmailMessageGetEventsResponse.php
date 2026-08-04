<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\EmailPaginationMeta;

/**
 * @phpstan-import-type MessageEventShape from \Telnyx\EmailMessages\MessageEvent
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type EmailMessageGetEventsResponseShape = array{
 *   data: list<MessageEvent|MessageEventShape>,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class EmailMessageGetEventsResponse implements BaseModel
{
    /** @use SdkModel<EmailMessageGetEventsResponseShape> */
    use SdkModel;

    /** @var list<MessageEvent> $data */
    #[Required(list: MessageEvent::class)]
    public array $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new EmailMessageGetEventsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageGetEventsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageGetEventsResponse)->withData(...)->withMeta(...)
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
     * @param list<MessageEvent|MessageEventShape> $data
     * @param EmailPaginationMeta|EmailPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        EmailPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MessageEvent|MessageEventShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailPaginationMeta|EmailPaginationMetaShape $meta
     */
    public function withMeta(EmailPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
