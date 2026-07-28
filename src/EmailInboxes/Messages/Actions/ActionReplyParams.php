<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends from the inbox address through the standard email send pipeline. The recipient is
 * the original `Reply-To`, falling back to `From`; original Cc recipients are not included.
 * The subject is prefixed with `Re:` unless it already has that prefix.
 *
 * Threading headers are derived from the original message: `In-Reply-To` is set to its
 * RFC Message-ID, and `References` contains the original References values plus that
 * Message-ID, de-duplicated and limited to the most recent 20 values.
 *
 * @see Telnyx\Services\EmailInboxes\Messages\ActionsService::reply()
 *
 * @phpstan-type ActionReplyParamsShape = array{
 *   inboxID: string, html?: string|null, text?: string|null
 * }
 */
final class ActionReplyParams implements BaseModel
{
    /** @use SdkModel<ActionReplyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * HTML reply body.
     */
    #[Optional]
    public ?string $html;

    /**
     * Plain-text reply body.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new ActionReplyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionReplyParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionReplyParams)->withInboxID(...)
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
     */
    public static function with(
        string $inboxID,
        ?string $html = null,
        ?string $text = null
    ): self {
        $self = new self;

        $self['inboxID'] = $inboxID;

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
     * HTML reply body.
     */
    public function withHTML(string $html): self
    {
        $self = clone $this;
        $self['html'] = $html;

        return $self;
    }

    /**
     * Plain-text reply body.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
