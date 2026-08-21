<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To\InboxRecipientAddress;

/**
 * Sends from the inbox address through the standard email send pipeline to caller-supplied
 * To, Cc, and Bcc recipients. `to` must contain at least one recipient. Optional `text` and
 * `html` are prepended to a forwarded-message block containing the original metadata and
 * available body content. The subject is prefixed with `Fwd:` unless it already has that prefix.
 *
 * Threading headers are derived from the original message: `In-Reply-To` is set to its
 * RFC Message-ID, and `References` contains the original References values plus that
 * Message-ID, de-duplicated and limited to the most recent 20 values.
 *
 * @see Telnyx\Services\EmailInboxes\Messages\ActionsService::forward()
 *
 * @phpstan-import-type ToVariants from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To
 * @phpstan-import-type ToShape from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To
 * @phpstan-import-type InboxActionRecipientInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput
 * @phpstan-import-type InboxActionRecipientInputVariants from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput
 *
 * @phpstan-type ActionForwardParamsShape = array{
 *   inboxID: string,
 *   to: ToShape,
 *   bcc?: InboxActionRecipientInputShape|null,
 *   cc?: InboxActionRecipientInputShape|null,
 *   html?: string|null,
 *   text?: string|null,
 * }
 */
final class ActionForwardParams implements BaseModel
{
    /** @use SdkModel<ActionForwardParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * One recipient or a non-empty recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @var ToVariants $to
     */
    #[Required(union: To::class)]
    public string|InboxRecipientAddress|array $to;

    /**
     * One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @var InboxActionRecipientInputVariants|null $bcc
     */
    #[Optional(union: InboxActionRecipientInput::class)]
    public string|\Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\InboxRecipientAddress|array|null $bcc;

    /**
     * One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @var InboxActionRecipientInputVariants|null $cc
     */
    #[Optional(union: InboxActionRecipientInput::class)]
    public string|\Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\InboxRecipientAddress|array|null $cc;

    /**
     * Optional HTML note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     */
    #[Optional]
    public ?string $html;

    /**
     * Optional plain-text note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new ActionForwardParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionForwardParams::with(inboxID: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionForwardParams)->withInboxID(...)->withTo(...)
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
     * @param ToShape $to
     * @param InboxActionRecipientInputShape|null $bcc
     * @param InboxActionRecipientInputShape|null $cc
     */
    public static function with(
        string $inboxID,
        string|InboxRecipientAddress|array $to,
        string|InboxActionRecipientInput\InboxRecipientAddress|array|null $bcc = null,
        string|InboxActionRecipientInput\InboxRecipientAddress|array|null $cc = null,
        ?string $html = null,
        ?string $text = null,
    ): self {
        $self = new self;

        $self['inboxID'] = $inboxID;
        $self['to'] = $to;

        null !== $bcc && $self['bcc'] = $bcc;
        null !== $cc && $self['cc'] = $cc;
        null !== $html && $self['html'] = $html;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * One recipient or a non-empty recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @param ToShape $to
     */
    public function withTo(string|InboxRecipientAddress|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @param InboxActionRecipientInputShape $bcc
     */
    public function withBcc(
        string|InboxActionRecipientInput\InboxRecipientAddress|array $bcc,
    ): self {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     *
     * @param InboxActionRecipientInputShape $cc
     */
    public function withCc(
        string|InboxActionRecipientInput\InboxRecipientAddress|array $cc,
    ): self {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * Optional HTML note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     */
    public function withHTML(string $html): self
    {
        $self = clone $this;
        $self['html'] = $html;

        return $self;
    }

    /**
     * Optional plain-text note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
