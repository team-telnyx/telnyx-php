<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\Recipients\RecipientListResponse\Meta;

/**
 * @phpstan-import-type EmailRecipientShape from \Telnyx\EmailMessages\Recipients\EmailRecipient
 * @phpstan-import-type MetaShape from \Telnyx\EmailMessages\Recipients\RecipientListResponse\Meta
 *
 * @phpstan-type RecipientListResponseShape = array{
 *   data: list<EmailRecipient|EmailRecipientShape>, meta: Meta|MetaShape
 * }
 */
final class RecipientListResponse implements BaseModel
{
    /** @use SdkModel<RecipientListResponseShape> */
    use SdkModel;

    /** @var list<EmailRecipient> $data */
    #[Required(list: EmailRecipient::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new RecipientListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecipientListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecipientListResponse)->withData(...)->withMeta(...)
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
     * @param list<EmailRecipient|EmailRecipientShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<EmailRecipient|EmailRecipientShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

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
