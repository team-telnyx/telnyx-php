<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailMessage;
use Telnyx\EmailInboxes\Threads\EmailPaginationMeta;

/**
 * @phpstan-import-type EmailMessageShape from \Telnyx\EmailInboxes\Drafts\EmailMessage
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type EmailMessageListResponseShape = array{
 *   data: list<EmailMessage|EmailMessageShape>,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class EmailMessageListResponse implements BaseModel
{
    /** @use SdkModel<EmailMessageListResponseShape> */
    use SdkModel;

    /** @var list<EmailMessage> $data */
    #[Required(list: EmailMessage::class)]
    public array $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new EmailMessageListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageListResponse)->withData(...)->withMeta(...)
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
     * @param list<EmailMessage|EmailMessageShape> $data
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
     * @param list<EmailMessage|EmailMessageShape> $data
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
