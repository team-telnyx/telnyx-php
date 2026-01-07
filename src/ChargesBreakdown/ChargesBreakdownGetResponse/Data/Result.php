<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result\Service;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ServiceShape from \Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result\Service
 *
 * @phpstan-type ResultShape = array{
 *   chargeType: string,
 *   serviceOwnerEmail: string,
 *   serviceOwnerUserID: string,
 *   services: list<Service|ServiceShape>,
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
    #[Required('charge_type')]
    public string $chargeType;

    /**
     * Email address of the service owner.
     */
    #[Required('service_owner_email')]
    public string $serviceOwnerEmail;

    /**
     * User ID of the service owner.
     */
    #[Required('service_owner_user_id')]
    public string $serviceOwnerUserID;

    /**
     * List of services associated with this number.
     *
     * @var list<Service> $services
     */
    #[Required(list: Service::class)]
    public array $services;

    /**
     * Phone number.
     */
    #[Required]
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
     * @param list<Service|ServiceShape> $services
     */
    public static function with(
        string $chargeType,
        string $serviceOwnerEmail,
        string $serviceOwnerUserID,
        array $services,
        string $tn,
    ): self {
        $self = new self;

        $self['chargeType'] = $chargeType;
        $self['serviceOwnerEmail'] = $serviceOwnerEmail;
        $self['serviceOwnerUserID'] = $serviceOwnerUserID;
        $self['services'] = $services;
        $self['tn'] = $tn;

        return $self;
    }

    /**
     * Type of charge for the number.
     */
    public function withChargeType(string $chargeType): self
    {
        $self = clone $this;
        $self['chargeType'] = $chargeType;

        return $self;
    }

    /**
     * Email address of the service owner.
     */
    public function withServiceOwnerEmail(string $serviceOwnerEmail): self
    {
        $self = clone $this;
        $self['serviceOwnerEmail'] = $serviceOwnerEmail;

        return $self;
    }

    /**
     * User ID of the service owner.
     */
    public function withServiceOwnerUserID(string $serviceOwnerUserID): self
    {
        $self = clone $this;
        $self['serviceOwnerUserID'] = $serviceOwnerUserID;

        return $self;
    }

    /**
     * List of services associated with this number.
     *
     * @param list<Service|ServiceShape> $services
     */
    public function withServices(array $services): self
    {
        $self = clone $this;
        $self['services'] = $services;

        return $self;
    }

    /**
     * Phone number.
     */
    public function withTn(string $tn): self
    {
        $self = clone $this;
        $self['tn'] = $tn;

        return $self;
    }
}
