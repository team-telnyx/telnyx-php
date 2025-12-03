<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse;

/**
 * Indicates if the change was made by Telnyx on your behalf, the organization owner, a member of your organization, or in the case of managed accounts, the account manager.
 */
enum ChangeMadeBy: string
{
    case TELNYX = 'telnyx';

    case ACCOUNT_MANAGER = 'account_manager';

    case ACCOUNT_OWNER = 'account_owner';

    case ORGANIZATION_MEMBER = 'organization_member';
}
