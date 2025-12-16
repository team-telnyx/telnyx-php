<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;

/**
 * Orientation of the card.
 */
enum CardOrientation: string
{
    case CARD_ORIENTATION_UNSPECIFIED = 'CARD_ORIENTATION_UNSPECIFIED';

    case HORIZONTAL = 'HORIZONTAL';

    case VERTICAL = 'VERTICAL';
}
