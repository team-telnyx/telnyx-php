<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardStatus;
use Telnyx\SimpleSimCard;
use Telnyx\SimpleSimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimpleSimCard\DataLimit;
use Telnyx\SimpleSimCard\EsimInstallationStatus;
use Telnyx\SimpleSimCard\Type;

/**
 * @phpstan-type SimCardListResponseShape = array{
 *   data?: list<SimpleSimCard>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardListResponse implements BaseModel
{
    /** @use SdkModel<SimCardListResponseShape> */
    use SdkModel;

    /** @var list<SimpleSimCard>|null $data */
    #[Optional(list: SimpleSimCard::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SimpleSimCard|array{
     *   id?: string|null,
     *   actionsInProgress?: bool|null,
     *   authorizedImeis?: list<string>|null,
     *   createdAt?: string|null,
     *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData|null,
     *   dataLimit?: DataLimit|null,
     *   eid?: string|null,
     *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   msisdn?: string|null,
     *   recordType?: string|null,
     *   resourcesWithInProgressActions?: list<mixed>|null,
     *   simCardGroupID?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   version?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<SimpleSimCard|array{
     *   id?: string|null,
     *   actionsInProgress?: bool|null,
     *   authorizedImeis?: list<string>|null,
     *   createdAt?: string|null,
     *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData|null,
     *   dataLimit?: DataLimit|null,
     *   eid?: string|null,
     *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   msisdn?: string|null,
     *   recordType?: string|null,
     *   resourcesWithInProgressActions?: list<mixed>|null,
     *   simCardGroupID?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   version?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
