<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\KnowledgeContract;
use Telnyx\Services\AI\Knowledge\CollectionsService;

final class KnowledgeService implements KnowledgeContract
{
    /**
     * @api
     */
    public KnowledgeRawService $raw;

    /**
     * @api
     */
    public CollectionsService $collections;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KnowledgeRawService($client);
        $this->collections = new CollectionsService($client);
    }
}
