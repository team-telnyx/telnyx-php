<?php

declare(strict_types=1);

namespace Telnyx\Core;

/** Marks an optional convenience argument as absent, rather than explicitly null. */
enum Omitted
{
    case VALUE;
}
