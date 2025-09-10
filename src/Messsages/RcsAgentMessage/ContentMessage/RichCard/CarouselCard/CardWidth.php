<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;

/**
 * The width of the cards in the carousel.
 */
enum CardWidth: string
{
    case CARD_WIDTH_UNSPECIFIED = 'CARD_WIDTH_UNSPECIFIED';

    case SMALL = 'SMALL';

    case MEDIUM = 'MEDIUM';
}
