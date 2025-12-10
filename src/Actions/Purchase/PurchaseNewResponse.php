<?php

declare(strict_types=1);

namespace Telnyx\Actions\Purchase;

use Telnyx\Actions\Purchase\PurchaseNewResponse\Error;
use Telnyx\Actions\Purchase\PurchaseNewResponse\Error\Source;
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
 * @phpstan-type PurchaseNewResponseShape = array{
 *   data?: list<SimpleSimCard>|null, errors?: list<Error>|null
 * }
 */
final class PurchaseNewResponse implements BaseModel
{
    /** @use SdkModel<PurchaseNewResponseShape> */
    use SdkModel;

    /**
     * Successfully registered SIM cards.
     *
     * @var list<SimpleSimCard>|null $data
     */
    #[Optional(list: SimpleSimCard::class)]
    public ?array $data;

    /** @var list<Error>|null $errors */
    #[Optional(list: Error::class)]
    public ?array $errors;

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
     * @param list<Error|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: array<string,mixed>|null,
     *   source?: Source|null,
     * }> $errors
     */
    public static function with(?array $data = null, ?array $errors = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $errors && $self['errors'] = $errors;

        return $self;
    }

    /**
     * Successfully registered SIM cards.
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
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Error|array{
     *   code: string,
     *   title: string,
     *   detail?: string|null,
     *   meta?: array<string,mixed>|null,
     *   source?: Source|null,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }
}
