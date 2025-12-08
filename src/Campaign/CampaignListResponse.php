<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignListResponse\Record;
use Telnyx\Campaign\CampaignListResponse\Record\CampaignStatus;
use Telnyx\Campaign\CampaignListResponse\Record\SubmissionStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignListResponseShape = array{
 *   page?: int|null, records?: list<Record>|null, totalRecords?: int|null
 * }
 */
final class CampaignListResponse implements BaseModel
{
    /** @use SdkModel<CampaignListResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $page;

    /** @var list<Record>|null $records */
    #[Api(list: Record::class, optional: true)]
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
     * @param list<Record|array{
     *   ageGated?: bool|null,
     *   assignedPhoneNumbersCount?: float|null,
     *   autoRenewal?: bool|null,
     *   billedDate?: string|null,
     *   brandDisplayName?: string|null,
     *   brandId?: string|null,
     *   campaignId?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createDate?: string|null,
     *   cspId?: string|null,
     *   description?: string|null,
     *   directLending?: bool|null,
     *   embeddedLink?: bool|null,
     *   embeddedLinkSample?: string|null,
     *   embeddedPhone?: bool|null,
     *   failureReasons?: string|null,
     *   helpKeywords?: string|null,
     *   helpMessage?: string|null,
     *   isTMobileNumberPoolingEnabled?: bool|null,
     *   isTMobileRegistered?: bool|null,
     *   isTMobileSuspended?: bool|null,
     *   messageFlow?: string|null,
     *   mock?: bool|null,
     *   nextRenewalOrExpirationDate?: string|null,
     *   numberPool?: bool|null,
     *   optinKeywords?: string|null,
     *   optinMessage?: string|null,
     *   optoutKeywords?: string|null,
     *   optoutMessage?: string|null,
     *   privacyPolicyLink?: string|null,
     *   referenceId?: string|null,
     *   resellerId?: string|null,
     *   sample1?: string|null,
     *   sample2?: string|null,
     *   sample3?: string|null,
     *   sample4?: string|null,
     *   sample5?: string|null,
     *   status?: string|null,
     *   submissionStatus?: value-of<SubmissionStatus>|null,
     *   subscriberHelp?: bool|null,
     *   subscriberOptin?: bool|null,
     *   subscriberOptout?: bool|null,
     *   subUsecases?: list<string>|null,
     *   tcrBrandId?: string|null,
     *   tcrCampaignId?: string|null,
     *   termsAndConditions?: bool|null,
     *   termsAndConditionsLink?: string|null,
     *   usecase?: string|null,
     *   vertical?: string|null,
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
     * @param list<Record|array{
     *   ageGated?: bool|null,
     *   assignedPhoneNumbersCount?: float|null,
     *   autoRenewal?: bool|null,
     *   billedDate?: string|null,
     *   brandDisplayName?: string|null,
     *   brandId?: string|null,
     *   campaignId?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createDate?: string|null,
     *   cspId?: string|null,
     *   description?: string|null,
     *   directLending?: bool|null,
     *   embeddedLink?: bool|null,
     *   embeddedLinkSample?: string|null,
     *   embeddedPhone?: bool|null,
     *   failureReasons?: string|null,
     *   helpKeywords?: string|null,
     *   helpMessage?: string|null,
     *   isTMobileNumberPoolingEnabled?: bool|null,
     *   isTMobileRegistered?: bool|null,
     *   isTMobileSuspended?: bool|null,
     *   messageFlow?: string|null,
     *   mock?: bool|null,
     *   nextRenewalOrExpirationDate?: string|null,
     *   numberPool?: bool|null,
     *   optinKeywords?: string|null,
     *   optinMessage?: string|null,
     *   optoutKeywords?: string|null,
     *   optoutMessage?: string|null,
     *   privacyPolicyLink?: string|null,
     *   referenceId?: string|null,
     *   resellerId?: string|null,
     *   sample1?: string|null,
     *   sample2?: string|null,
     *   sample3?: string|null,
     *   sample4?: string|null,
     *   sample5?: string|null,
     *   status?: string|null,
     *   submissionStatus?: value-of<SubmissionStatus>|null,
     *   subscriberHelp?: bool|null,
     *   subscriberOptin?: bool|null,
     *   subscriberOptout?: bool|null,
     *   subUsecases?: list<string>|null,
     *   tcrBrandId?: string|null,
     *   tcrCampaignId?: string|null,
     *   termsAndConditions?: bool|null,
     *   termsAndConditionsLink?: string|null,
     *   usecase?: string|null,
     *   vertical?: string|null,
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
