<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailMessage;
use Telnyx\EmailMessages\EmailMessageBatchResponse\Error;
use Telnyx\EmailMessages\EmailMessageBatchResponse\Meta;

/**
 * @phpstan-import-type EmailMessageShape from \Telnyx\EmailInboxes\Drafts\EmailMessage
 * @phpstan-import-type ErrorShape from \Telnyx\EmailMessages\EmailMessageBatchResponse\Error
 * @phpstan-import-type MetaShape from \Telnyx\EmailMessages\EmailMessageBatchResponse\Meta
 *
 * @phpstan-type EmailMessageBatchResponseShape = array{
 *   data: list<EmailMessage|EmailMessageShape>,
 *   errors: list<Error|ErrorShape>,
 *   meta: Meta|MetaShape,
 * }
 */
final class EmailMessageBatchResponse implements BaseModel
{
    /** @use SdkModel<EmailMessageBatchResponseShape> */
    use SdkModel;

    /** @var list<EmailMessage> $data */
    #[Required(list: EmailMessage::class)]
    public array $data;

    /** @var list<Error> $errors */
    #[Required(list: Error::class)]
    public array $errors;

    #[Required]
    public Meta $meta;

    /**
     * `new EmailMessageBatchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageBatchResponse::with(data: ..., errors: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageBatchResponse)->withData(...)->withErrors(...)->withMeta(...)
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
     * @param list<Error|ErrorShape> $errors
     * @param Meta|MetaShape $meta
     */
    public static function with(
        array $data,
        array $errors,
        Meta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['errors'] = $errors;
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
     * @param list<Error|ErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
