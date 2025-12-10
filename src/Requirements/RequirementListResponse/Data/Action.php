<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListResponse\Data;

/**
 * Indicates whether this requirement applies to branded_calling, ordering, porting, or both ordering and porting.
 */
enum Action: string
{
    case BOTH = 'both';

    case BRANDED_CALLING = 'branded_calling';

    case ORDERING = 'ordering';

    case PORTING = 'porting';
}
