<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\X402Contract;
use Telnyx\Services\X402\CreditAccountService;

final class X402Service implements X402Contract
{
    /**
     * @api
     */
    public X402RawService $raw;

    /**
     * @api
     */
    public CreditAccountService $creditAccount;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new X402RawService($client);
        $this->creditAccount = new CreditAccountService($client);
    }
}
