<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimCards\SimCard\CurrentDeviceLocation;
use Telnyx\SimCards\SimCard\DataLimit;
use Telnyx\SimCards\SimCard\EsimInstallationStatus;
use Telnyx\SimCards\SimCard\LiveDataSession;
use Telnyx\SimCards\SimCard\PinPukCodes;
use Telnyx\SimCards\SimCard\Type;
use Telnyx\SimCardStatus;

/**
 * @phpstan-type SimCardDeleteResponseShape = array{data?: SimCard|null}
 */
final class SimCardDeleteResponse implements BaseModel
{
    /** @use SdkModel<SimCardDeleteResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   actionsInProgress?: bool|null,
     *   authorizedImeis?: list<string>|null,
     *   createdAt?: string|null,
     *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData|null,
     *   currentDeviceLocation?: CurrentDeviceLocation|null,
     *   currentImei?: string|null,
     *   currentMcc?: string|null,
     *   currentMnc?: string|null,
     *   dataLimit?: DataLimit|null,
     *   eid?: string|null,
     *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   liveDataSession?: value-of<LiveDataSession>|null,
     *   msisdn?: string|null,
     *   pinPukCodes?: PinPukCodes|null,
     *   recordType?: string|null,
     *   resourcesWithInProgressActions?: list<array<string,mixed>>|null,
     *   simCardGroupID?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   version?: string|null,
     * } $data
     */
    public static function with(SimCard|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SimCard|array{
     *   id?: string|null,
     *   actionsInProgress?: bool|null,
     *   authorizedImeis?: list<string>|null,
     *   createdAt?: string|null,
     *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData|null,
     *   currentDeviceLocation?: CurrentDeviceLocation|null,
     *   currentImei?: string|null,
     *   currentMcc?: string|null,
     *   currentMnc?: string|null,
     *   dataLimit?: DataLimit|null,
     *   eid?: string|null,
     *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
     *   iccid?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   liveDataSession?: value-of<LiveDataSession>|null,
     *   msisdn?: string|null,
     *   pinPukCodes?: PinPukCodes|null,
     *   recordType?: string|null,
     *   resourcesWithInProgressActions?: list<array<string,mixed>>|null,
     *   simCardGroupID?: string|null,
     *   status?: SimCardStatus|null,
     *   tags?: list<string>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   version?: string|null,
     * } $data
     */
    public function withData(SimCard|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
