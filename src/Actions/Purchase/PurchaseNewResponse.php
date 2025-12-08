<?php

declare(strict_types=1);

namespace Telnyx\Actions\Purchase;

use Telnyx\Actions\Purchase\PurchaseNewResponse\Error;
use Telnyx\Actions\Purchase\PurchaseNewResponse\Error\Source;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: SimpleSimCard::class, optional: true)]
    public ?array $data;

    /** @var list<Error>|null $errors */
    #[Api(list: Error::class, optional: true)]
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $errors && $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * Successfully registered SIM cards.
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
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }
}
