<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends the draft through the standard send pipeline — the same domain resolution,
 * suppression, reputation, daily-quota, persistence and Detail Record behaviour as
 * `POST /v2/email_messages`. The response body is the created email message.
 *
 * If the draft has no explicit `from_email`, the inbox address is used.
 *
 * The draft is marked `sent` only after the send is accepted; a send rejected for
 * suppression, quota or reputation leaves the draft editable so it can be fixed and
 * retried. A draft that is already `sent` returns 422 rather than sending twice.
 *
 * @see Telnyx\Services\EmailInboxes\DraftsService::send()
 *
 * @phpstan-type DraftSendParamsShape = array{inboxID: string}
 */
final class DraftSendParams implements BaseModel
{
    /** @use SdkModel<DraftSendParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * `new DraftSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DraftSendParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DraftSendParams)->withInboxID(...)
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
    public static function with(string $inboxID): self
    {
        $self = new self;

        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }
}
