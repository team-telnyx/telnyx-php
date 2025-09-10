<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupCreateParams;

enum Action: string
{
    case ORDERING = 'ordering';

    case PORTING = 'porting';
}
