<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\AnthropicContract;
use Telnyx\Services\AI\Anthropic\V1Service;

final class AnthropicService implements AnthropicContract
{
    /**
     * @api
     */
    public AnthropicRawService $raw;

    /**
     * @api
     */
    public V1Service $v1;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AnthropicRawService($client);
        $this->v1 = new V1Service($client);
    }
}
