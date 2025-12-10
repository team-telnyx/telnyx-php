<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\BrandContract;
use Telnyx\Services\Brand\ExternalVettingService;
use Telnyx\Services\Brand\SMSOtpService;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    /**
     * @api
     */
    public ExternalVettingService $externalVetting;

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
        $this->externalVetting = new ExternalVettingService($client);
        $this->smsOtp = new SMSOtpService($client);
    }
}
