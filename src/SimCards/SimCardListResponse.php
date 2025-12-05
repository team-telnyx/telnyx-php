<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
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
final class SimCardListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SimpleSimCard>|null $data */
    #[Api(list: SimpleSimCard::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   actions_in_progress?: bool|null,
     *   authorized_imeis?: list<string>|null,
     *   created_at?: string|null,
     *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
     *   data_limit?: DataLimit|null,
     *   eid?: string|null,
     *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   msisdn?: string|null,
     *   record_type?: string|null,
     *   resources_with_in_progress_actions?: list<mixed>|null,
     *   sim_card_group_id?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   version?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   actions_in_progress?: bool|null,
     *   authorized_imeis?: list<string>|null,
     *   created_at?: string|null,
     *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
     *   data_limit?: DataLimit|null,
     *   eid?: string|null,
     *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   msisdn?: string|null,
     *   record_type?: string|null,
     *   resources_with_in_progress_actions?: list<mixed>|null,
     *   sim_card_group_id?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
