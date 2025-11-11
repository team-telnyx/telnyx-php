<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\ActionsContract;
use Telnyx\Services\Actions\PurchaseService;
use Telnyx\Services\Actions\RegisterService;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public PurchaseService $purchase;

    /**
     * @api
     */
    public RegisterService $register;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->purchase = new PurchaseService($client);
        $this->register = new RegisterService($client);
    }
}
