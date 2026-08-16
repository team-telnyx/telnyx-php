<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchContentsParams;

enum Format: string
{
    case HTML = 'html';

    case MARKDOWN = 'markdown';

    case METADATA = 'metadata';
}
