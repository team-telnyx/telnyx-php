<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumParams\Endpoint;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse\EnumPaginatedResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlcContract;
use Telnyx\Services\Messaging10dlc\BrandService;
use Telnyx\Services\Messaging10dlc\CampaignBuilderService;
use Telnyx\Services\Messaging10dlc\CampaignService;
use Telnyx\Services\Messaging10dlc\PartnerCampaignsService;
use Telnyx\Services\Messaging10dlc\PhoneNumberAssignmentByProfileService;
use Telnyx\Services\Messaging10dlc\PhoneNumberCampaignsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class Messaging10dlcService implements Messaging10dlcContract
{
    /**
     * @api
     */
    public Messaging10dlcRawService $raw;

    /**
     * @api
     */
    public BrandService $brand;

    /**
     * @api
     */
    public CampaignService $campaign;

    /**
     * @api
     */
    public CampaignBuilderService $campaignBuilder;

    /**
     * @api
     */
    public PartnerCampaignsService $partnerCampaigns;

    /**
     * @api
     */
    public PhoneNumberCampaignsService $phoneNumberCampaigns;

    /**
     * @api
     */
    public PhoneNumberAssignmentByProfileService $phoneNumberAssignmentByProfile;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new Messaging10dlcRawService($client);
        $this->brand = new BrandService($client);
        $this->campaign = new CampaignService($client);
        $this->campaignBuilder = new CampaignBuilderService($client);
        $this->partnerCampaigns = new PartnerCampaignsService($client);
        $this->phoneNumberCampaigns = new PhoneNumberCampaignsService($client);
        $this->phoneNumberAssignmentByProfile = new PhoneNumberAssignmentByProfileService($client);
    }

    /**
     * @api
     *
     * Get Enum
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @return list<string>|list<array<string,mixed>>|EnumPaginatedResponse|array<string,mixed>|array<string,mixed>
     *
     * @throws APIException
     */
    public function getEnum(
        Endpoint|string $endpoint,
        RequestOptions|array|null $requestOptions = null
    ): array|EnumPaginatedResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEnum($endpoint, requestOptions: $requestOptions);

        return $response->parse();
    }
}
