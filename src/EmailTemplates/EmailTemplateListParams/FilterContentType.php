<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateListParams;

/**
 * Matches templates by stored body presence. `html_and_text` requires both an HTML and text body; `html_only` requires HTML and no text body; `text_only` requires text and no HTML body; `no_body` requires neither. `null` and exactly `""` count as absent; whitespace-only strings count as content. An empty or unsupported value returns a 400 response.
 */
enum FilterContentType: string
{
    case HTML_AND_TEXT = 'html_and_text';

    case HTML_ONLY = 'html_only';

    case TEXT_ONLY = 'text_only';

    case NO_BODY = 'no_body';
}
