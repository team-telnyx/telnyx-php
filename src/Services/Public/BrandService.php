<?php

declare(strict_types=1);

namespace Telnyx\Services\Public;

use Telnyx\Client;
use Telnyx\ServiceContracts\Public\BrandContract;
use Telnyx\Services\Public\Brand\SMSOtpService;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    /**
     * @api
     */
    public SMSOtpService $smsOtp;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandRawService($client);
        $this->smsOtp = new SMSOtpService($client);
    }
}
