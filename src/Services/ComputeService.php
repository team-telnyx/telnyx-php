<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\ComputeContract;
use Telnyx\Services\Compute\FuncsService;

final class ComputeService implements ComputeContract
{
    /**
     * @api
     */
    public ComputeRawService $raw;

    /**
     * @api
     */
    public FuncsService $funcs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ComputeRawService($client);
        $this->funcs = new FuncsService($client);
    }
}
