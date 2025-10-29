<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result\Service;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResultShape = array{
 *   chargeType: string,
 *   serviceOwnerEmail: string,
 *   serviceOwnerUserID: string,
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
    #[Api('charge_type')]
    public string $chargeType;

    /**
     * Email address of the service owner.
     */
    #[Api('service_owner_email')]
    public string $serviceOwnerEmail;

    /**
     * User ID of the service owner.
     */
    #[Api('service_owner_user_id')]
    public string $serviceOwnerUserID;

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
     *   chargeType: ...,
     *   serviceOwnerEmail: ...,
     *   serviceOwnerUserID: ...,
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
     * @param list<Service> $services
     */
    public static function with(
        string $chargeType,
        string $serviceOwnerEmail,
        string $serviceOwnerUserID,
        array $services,
        string $tn,
    ): self {
        $obj = new self;

        $obj->chargeType = $chargeType;
        $obj->serviceOwnerEmail = $serviceOwnerEmail;
        $obj->serviceOwnerUserID = $serviceOwnerUserID;
        $obj->services = $services;
        $obj->tn = $tn;

        return $obj;
    }

    /**
     * Type of charge for the number.
     */
    public function withChargeType(string $chargeType): self
    {
        $obj = clone $this;
        $obj->chargeType = $chargeType;

        return $obj;
    }

    /**
     * Email address of the service owner.
     */
    public function withServiceOwnerEmail(string $serviceOwnerEmail): self
    {
        $obj = clone $this;
        $obj->serviceOwnerEmail = $serviceOwnerEmail;

        return $obj;
    }

    /**
     * User ID of the service owner.
     */
    public function withServiceOwnerUserID(string $serviceOwnerUserID): self
    {
        $obj = clone $this;
        $obj->serviceOwnerUserID = $serviceOwnerUserID;

        return $obj;
    }

    /**
     * List of services associated with this number.
     *
     * @param list<Service> $services
     */
    public function withServices(array $services): self
    {
        $obj = clone $this;
        $obj->services = $services;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withTn(string $tn): self
    {
        $obj = clone $this;
        $obj->tn = $tn;

        return $obj;
    }
}
