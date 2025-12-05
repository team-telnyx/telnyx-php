<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign\CampaignStatus;

/**
 * @phpstan-type PartnerCampaignListResponseShape = array{
 *   page?: int|null,
 *   records?: list<TelnyxDownstreamCampaign>|null,
 *   totalRecords?: int|null,
 * }
 */
final class PartnerCampaignListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PartnerCampaignListResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?int $page;

    /** @var list<TelnyxDownstreamCampaign>|null $records */
    #[Api(list: TelnyxDownstreamCampaign::class, optional: true)]
    public ?array $records;

    #[Api(optional: true)]
    public ?int $totalRecords;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<TelnyxDownstreamCampaign|array{
     *   tcrBrandId: string,
     *   tcrCampaignId: string,
     *   ageGated?: bool|null,
     *   assignedPhoneNumbersCount?: float|null,
     *   brandDisplayName?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   directLending?: bool|null,
     *   embeddedLink?: bool|null,
     *   embeddedLinkSample?: string|null,
     *   embeddedPhone?: bool|null,
     *   failureReasons?: string|null,
     *   helpKeywords?: string|null,
     *   helpMessage?: string|null,
     *   isNumberPoolingEnabled?: bool|null,
     *   messageFlow?: string|null,
     *   numberPool?: bool|null,
     *   optinKeywords?: string|null,
     *   optinMessage?: string|null,
     *   optoutKeywords?: string|null,
     *   optoutMessage?: string|null,
     *   privacyPolicyLink?: string|null,
     *   sample1?: string|null,
     *   sample2?: string|null,
     *   sample3?: string|null,
     *   sample4?: string|null,
     *   sample5?: string|null,
     *   subscriberOptin?: bool|null,
     *   subscriberOptout?: bool|null,
     *   subUsecases?: list<string>|null,
     *   termsAndConditions?: bool|null,
     *   termsAndConditionsLink?: string|null,
     *   updatedAt?: string|null,
     *   usecase?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $records
     */
    public static function with(
        ?int $page = null,
        ?array $records = null,
        ?int $totalRecords = null
    ): self {
        $obj = new self;

        null !== $page && $obj['page'] = $page;
        null !== $records && $obj['records'] = $records;
        null !== $totalRecords && $obj['totalRecords'] = $totalRecords;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * @param list<TelnyxDownstreamCampaign|array{
     *   tcrBrandId: string,
     *   tcrCampaignId: string,
     *   ageGated?: bool|null,
     *   assignedPhoneNumbersCount?: float|null,
     *   brandDisplayName?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   directLending?: bool|null,
     *   embeddedLink?: bool|null,
     *   embeddedLinkSample?: string|null,
     *   embeddedPhone?: bool|null,
     *   failureReasons?: string|null,
     *   helpKeywords?: string|null,
     *   helpMessage?: string|null,
     *   isNumberPoolingEnabled?: bool|null,
     *   messageFlow?: string|null,
     *   numberPool?: bool|null,
     *   optinKeywords?: string|null,
     *   optinMessage?: string|null,
     *   optoutKeywords?: string|null,
     *   optoutMessage?: string|null,
     *   privacyPolicyLink?: string|null,
     *   sample1?: string|null,
     *   sample2?: string|null,
     *   sample3?: string|null,
     *   sample4?: string|null,
     *   sample5?: string|null,
     *   subscriberOptin?: bool|null,
     *   subscriberOptout?: bool|null,
     *   subUsecases?: list<string>|null,
     *   termsAndConditions?: bool|null,
     *   termsAndConditionsLink?: string|null,
     *   updatedAt?: string|null,
     *   usecase?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj['records'] = $records;

        return $obj;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }
}
