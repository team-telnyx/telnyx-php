<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\PressAction;

enum Key: string
{
    case ENTER = 'Enter';

    case TAB = 'Tab';

    case ESCAPE = 'Escape';

    case BACKSPACE = 'Backspace';

    case ARROW_UP = 'ArrowUp';

    case ARROW_DOWN = 'ArrowDown';

    case ARROW_LEFT = 'ArrowLeft';

    case ARROW_RIGHT = 'ArrowRight';

    case PAGE_UP = 'PageUp';

    case PAGE_DOWN = 'PageDown';

    case HOME = 'Home';

    case END = 'End';
}
