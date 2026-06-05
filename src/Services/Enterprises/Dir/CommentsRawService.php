<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Dir;

use Telnyx\Client;
use Telnyx\ServiceContracts\Enterprises\Dir\CommentsRawContract;

final class CommentsRawService implements CommentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
