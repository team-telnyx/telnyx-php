<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\DraftListParams;

/**
 * Restrict results to drafts in this state.
 */
enum FilterStatus: string
{
    case DRAFT = 'draft';

    case SENDING = 'sending';

    case SENT = 'sent';
}
