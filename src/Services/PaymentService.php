<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PaymentContract;
use Telnyx\Services\Payment\AutoRechargePrefsService;

final class PaymentService implements PaymentContract
{
    /**
     * @api
     */
    public PaymentRawService $raw;

    /**
     * @api
     */
    public AutoRechargePrefsService $autoRechargePrefs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentRawService($client);
        $this->autoRechargePrefs = new AutoRechargePrefsService($client);
    }
}
