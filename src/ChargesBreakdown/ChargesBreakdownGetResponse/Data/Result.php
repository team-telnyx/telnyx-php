<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result\Service;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResultShape = array{
 *   charge_type: string,
 *   service_owner_email: string,
 *   service_owner_user_id: string,
 *   services: list<Service>,
 *   tn: string,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * Type of charge for the number.
     */
    #[Api]
    public string $charge_type;

    /**
     * Email address of the service owner.
     */
    #[Api]
    public string $service_owner_email;

    /**
     * User ID of the service owner.
     */
    #[Api]
    public string $service_owner_user_id;

    /**
     * List of services associated with this number.
     *
     * @var list<Service> $services
     */
    #[Api(list: Service::class)]
    public array $services;

    /**
     * Phone number.
     */
    #[Api]
    public string $tn;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(
     *   charge_type: ...,
     *   service_owner_email: ...,
     *   service_owner_user_id: ...,
     *   services: ...,
     *   tn: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)
     *   ->withChargeType(...)
     *   ->withServiceOwnerEmail(...)
     *   ->withServiceOwnerUserID(...)
     *   ->withServices(...)
     *   ->withTn(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Service|array{
     *   cost: string, cost_type: string, name: string
     * }> $services
     */
    public static function with(
        string $charge_type,
        string $service_owner_email,
        string $service_owner_user_id,
        array $services,
        string $tn,
    ): self {
        $obj = new self;

        $obj['charge_type'] = $charge_type;
        $obj['service_owner_email'] = $service_owner_email;
        $obj['service_owner_user_id'] = $service_owner_user_id;
        $obj['services'] = $services;
        $obj['tn'] = $tn;

        return $obj;
    }

    /**
     * Type of charge for the number.
     */
    public function withChargeType(string $chargeType): self
    {
        $obj = clone $this;
        $obj['charge_type'] = $chargeType;

        return $obj;
    }

    /**
     * Email address of the service owner.
     */
    public function withServiceOwnerEmail(string $serviceOwnerEmail): self
    {
        $obj = clone $this;
        $obj['service_owner_email'] = $serviceOwnerEmail;

        return $obj;
    }

    /**
     * User ID of the service owner.
     */
    public function withServiceOwnerUserID(string $serviceOwnerUserID): self
    {
        $obj = clone $this;
        $obj['service_owner_user_id'] = $serviceOwnerUserID;

        return $obj;
    }

    /**
     * List of services associated with this number.
     *
     * @param list<Service|array{
     *   cost: string, cost_type: string, name: string
     * }> $services
     */
    public function withServices(array $services): self
    {
        $obj = clone $this;
        $obj['services'] = $services;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withTn(string $tn): self
    {
        $obj = clone $this;
        $obj['tn'] = $tn;

        return $obj;
    }
}
