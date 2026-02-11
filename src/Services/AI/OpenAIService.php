<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\OpenAIContract;
use Telnyx\Services\AI\OpenAI\EmbeddingsService;

final class OpenAIService implements OpenAIContract
{
    /**
     * @api
     */
    public OpenAIRawService $raw;

    /**
     * @api
     */
    public EmbeddingsService $embeddings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OpenAIRawService($client);
        $this->embeddings = new EmbeddingsService($client);
    }
}
