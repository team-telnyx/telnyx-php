<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCards\SimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimCards\SimCard\CurrentDeviceLocation;
use Telnyx\SimCards\SimCard\DataLimit;
use Telnyx\SimCards\SimCard\EsimInstallationStatus;
use Telnyx\SimCards\SimCard\LiveDataSession;
use Telnyx\SimCards\SimCard\PinPukCodes;
use Telnyx\SimCards\SimCard\Type;
use Telnyx\SimCardStatus;

/**
 * @phpstan-type SimCardGetResponseShape = array{data?: SimCard|null}
 */
final class SimCardGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?SimCard $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCard|array{
     *   id?: string|null,
     *   actions_in_progress?: bool|null,
     *   authorized_imeis?: list<string>|null,
     *   created_at?: string|null,
     *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
     *   current_device_location?: CurrentDeviceLocation|null,
     *   current_imei?: string|null,
     *   current_mcc?: string|null,
     *   current_mnc?: string|null,
     *   data_limit?: DataLimit|null,
     *   eid?: string|null,
     *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   live_data_session?: value-of<LiveDataSession>|null,
     *   msisdn?: string|null,
     *   pin_puk_codes?: PinPukCodes|null,
     *   record_type?: string|null,
     *   resources_with_in_progress_actions?: list<mixed>|null,
     *   sim_card_group_id?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   version?: string|null,
     * } $data
     */
    public static function with(SimCard|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SimCard|array{
     *   id?: string|null,
     *   actions_in_progress?: bool|null,
     *   authorized_imeis?: list<string>|null,
     *   created_at?: string|null,
     *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
     *   current_device_location?: CurrentDeviceLocation|null,
     *   current_imei?: string|null,
     *   current_mcc?: string|null,
     *   current_mnc?: string|null,
     *   data_limit?: DataLimit|null,
     *   eid?: string|null,
     *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   live_data_session?: value-of<LiveDataSession>|null,
     *   msisdn?: string|null,
     *   pin_puk_codes?: PinPukCodes|null,
     *   record_type?: string|null,
     *   resources_with_in_progress_actions?: list<mixed>|null,
     *   sim_card_group_id?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   version?: string|null,
     * } $data
     */
    public function withData(SimCard|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
