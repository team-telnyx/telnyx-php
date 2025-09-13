<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignListResponse\Record;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_list_response = array{
 *   page?: int, records?: list<Record>, totalRecords?: int
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CampaignListResponse implements BaseModel
{
    /** @use SdkModel<campaign_list_response> */
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
     * @param list<Record> $records
     */
    public static function with(
        ?int $page = null,
        ?array $records = null,
        ?int $totalRecords = null
    ): self {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $records && $obj->records = $records;
        null !== $totalRecords && $obj->totalRecords = $totalRecords;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * @param list<Record> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj->records = $records;

        return $obj;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj->totalRecords = $totalRecords;

        return $obj;
    }
}
