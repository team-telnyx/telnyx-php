<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Interactive\Action\Parameters;

/**
 * use draft to test an unpublished flow. Defaults to published.
 */
enum Mode: string
{
    case DRAFT = 'draft';

    case PUBLISHED = 'published';
}
