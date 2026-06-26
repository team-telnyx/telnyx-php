<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\CommentListParams;

/**
 * Restrict to comments of this category. Customer-visible categories only: internal-only comments are filtered out regardless of this filter.
 */
enum CommentType: string
{
    case VETTING_COMMENT = 'vetting_comment';

    case REJECTION_REASON = 'rejection_reason';

    case INTERNAL_NOTE = 'internal_note';

    case NOTIFICATION = 'notification';

    case STATUS_UPDATE = 'status_update';

    case CUSTOMER_INQUIRY = 'customer_inquiry';

    case ADMIN_RESPONSE = 'admin_response';
}
