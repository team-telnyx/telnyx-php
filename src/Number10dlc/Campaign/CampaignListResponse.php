<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Number10dlc\Campaign\CampaignListResponse\Record;
use Telnyx\Number10dlc\Campaign\CampaignListResponse\Record\CampaignStatus;
use Telnyx\Number10dlc\Campaign\CampaignListResponse\Record\SubmissionStatus;

/**
 * @phpstan-type CampaignListResponseShape = array{
 *   page?: int|null, records?: list<Record>|null, totalRecords?: int|null
 * }
 */
final class CampaignListResponse implements BaseModel
{
    /** @use SdkModel<CampaignListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?int $page;

    /** @var list<Record>|null $records */
    #[Optional(list: Record::class)]
    public ?array $records;

    #[Optional]
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
     *   brandID?: string|null,
     *   campaignID?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createDate?: string|null,
     *   cspID?: string|null,
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
     *   referenceID?: string|null,
     *   resellerID?: string|null,
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
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
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
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $records && $self['records'] = $records;
        null !== $totalRecords && $self['totalRecords'] = $totalRecords;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * @param list<Record|array{
     *   ageGated?: bool|null,
     *   assignedPhoneNumbersCount?: float|null,
     *   autoRenewal?: bool|null,
     *   billedDate?: string|null,
     *   brandDisplayName?: string|null,
     *   brandID?: string|null,
     *   campaignID?: string|null,
     *   campaignStatus?: value-of<CampaignStatus>|null,
     *   createDate?: string|null,
     *   cspID?: string|null,
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
     *   referenceID?: string|null,
     *   resellerID?: string|null,
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
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
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
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $self = clone $this;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }
}
