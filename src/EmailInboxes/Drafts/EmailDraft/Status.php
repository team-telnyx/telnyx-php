<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailDraft;

/**
 * `draft` until the draft is sent. A sent draft is retained for audit and
 * becomes immutable.
 */
enum Status: string
{
    case DRAFT = 'draft';

    case SENDING = 'sending';

    case SENT = 'sent';
}
