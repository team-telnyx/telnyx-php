<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights\InsightTemplate;

enum InsightType: string
{
    case CUSTOM = 'custom';

    case DEFAULT = 'default';
}
