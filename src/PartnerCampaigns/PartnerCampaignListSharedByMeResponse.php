<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse\Record;

/**
 * @phpstan-type PartnerCampaignListSharedByMeResponseShape = array{
 *   page?: int|null, records?: list<Record>|null, totalRecords?: int|null
 * }
 */
final class PartnerCampaignListSharedByMeResponse implements BaseModel
{
    /** @use SdkModel<PartnerCampaignListSharedByMeResponseShape> */
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
     *   brandID: string,
     *   campaignID: string,
     *   usecase: string,
     *   createDate?: string|null,
     *   status?: string|null,
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
     *   brandID: string,
     *   campaignID: string,
     *   usecase: string,
     *   createDate?: string|null,
     *   status?: string|null,
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
