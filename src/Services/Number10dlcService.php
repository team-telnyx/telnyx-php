<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Number10dlcGetResponse\EnumPaginatedResponse;
use Telnyx\Number10dlc\Number10dlcRetrieveParams\Endpoint;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlcContract;
use Telnyx\Services\Number10dlc\BrandService;
use Telnyx\Services\Number10dlc\CampaignBuilderService;
use Telnyx\Services\Number10dlc\CampaignService;
use Telnyx\Services\Number10dlc\PartnerCampaignService;
use Telnyx\Services\Number10dlc\PartnerCampaignsService;
use Telnyx\Services\Number10dlc\PhoneNumberAssignmentByProfileService;
use Telnyx\Services\Number10dlc\PhoneNumberCampaignsService;

final class Number10dlcService implements Number10dlcContract
{
    /**
     * @api
     */
    public Number10dlcRawService $raw;

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
    public PartnerCampaignService $partnerCampaign;

    /**
     * @api
     */
    public PartnerCampaignsService $partnerCampaigns;

    /**
     * @api
     */
    public PhoneNumberAssignmentByProfileService $phoneNumberAssignmentByProfile;

    /**
     * @api
     */
    public PhoneNumberCampaignsService $phoneNumberCampaigns;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new Number10dlcRawService($client);
        $this->brand = new BrandService($client);
        $this->campaign = new CampaignService($client);
        $this->campaignBuilder = new CampaignBuilderService($client);
        $this->partnerCampaign = new PartnerCampaignService($client);
        $this->partnerCampaigns = new PartnerCampaignsService($client);
        $this->phoneNumberAssignmentByProfile = new PhoneNumberAssignmentByProfileService($client);
        $this->phoneNumberCampaigns = new PhoneNumberCampaignsService($client);
    }

    /**
     * @api
     *
     * Get Enum
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return list<string>|list<array<string,mixed>>|EnumPaginatedResponse|array<string,mixed>|array<string,mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): array|EnumPaginatedResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($endpoint, requestOptions: $requestOptions);

        return $response->parse();
    }
}
