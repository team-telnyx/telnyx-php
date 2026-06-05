<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\CommentNewResponse\Data;

/**
 * Comment categorisation. Customers post `customer_inquiry`. The Telnyx team posts `vetting_comment`, `rejection_reason`, `notification`, `status_update`, or `admin_response`. `internal_note` is filtered out of customer-visible responses.
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
