<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListParams;

use Telnyx\CallEvents\CallEventListParams\Filter\ApplicationName;
use Telnyx\CallEvents\CallEventListParams\Filter\OccurredAt;
use Telnyx\CallEvents\CallEventListParams\Filter\Product;
use Telnyx\CallEvents\CallEventListParams\Filter\Status;
use Telnyx\CallEvents\CallEventListParams\Filter\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   application_name?: ApplicationName|null,
 *   application_session_id?: string|null,
 *   connection_id?: string|null,
 *   failed?: bool|null,
 *   from?: string|null,
 *   leg_id?: string|null,
 *   name?: string|null,
 *   occurred_at?: OccurredAt|null,
 *   outbound_outbound_voice_profile_id?: string|null,
 *   product?: value-of<Product>|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Application name filters.
     */
    #[Api(optional: true)]
    public ?ApplicationName $application_name;

    /**
     * The unique identifier of the call session. A session may include multiple call leg events.
     */
    #[Api(optional: true)]
    public ?string $application_session_id;

    /**
     * The unique identifier of the conection.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Delivery failed or not.
     */
    #[Api(optional: true)]
    public ?bool $failed;

    /**
     * Filter by From number.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The unique identifier of an individual call leg.
     */
    #[Api(optional: true)]
    public ?string $leg_id;

    /**
     * If present, conferences will be filtered to those with a matching `name` attribute. Matching is case-sensitive.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Event occurred_at filters.
     */
    #[Api(optional: true)]
    public ?OccurredAt $occurred_at;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api('outbound.outbound_voice_profile_id', optional: true)]
    public ?string $outbound_outbound_voice_profile_id;

    /**
     * Filter by product.
     *
     * @var value-of<Product>|null $product
     */
    #[Api(enum: Product::class, optional: true)]
    public ?string $product;

    /**
     * If present, conferences will be filtered by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Filter by To number.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * Event type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Product|value-of<Product> $product
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?ApplicationName $application_name = null,
        ?string $application_session_id = null,
        ?string $connection_id = null,
        ?bool $failed = null,
        ?string $from = null,
        ?string $leg_id = null,
        ?string $name = null,
        ?OccurredAt $occurred_at = null,
        ?string $outbound_outbound_voice_profile_id = null,
        Product|string|null $product = null,
        Status|string|null $status = null,
        ?string $to = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $application_name && $obj->application_name = $application_name;
        null !== $application_session_id && $obj->application_session_id = $application_session_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $failed && $obj->failed = $failed;
        null !== $from && $obj->from = $from;
        null !== $leg_id && $obj->leg_id = $leg_id;
        null !== $name && $obj->name = $name;
        null !== $occurred_at && $obj->occurred_at = $occurred_at;
        null !== $outbound_outbound_voice_profile_id && $obj->outbound_outbound_voice_profile_id = $outbound_outbound_voice_profile_id;
        null !== $product && $obj['product'] = $product;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj->to = $to;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Application name filters.
     */
    public function withApplicationName(ApplicationName $applicationName): self
    {
        $obj = clone $this;
        $obj->application_name = $applicationName;

        return $obj;
    }

    /**
     * The unique identifier of the call session. A session may include multiple call leg events.
     */
    public function withApplicationSessionID(string $applicationSessionID): self
    {
        $obj = clone $this;
        $obj->application_session_id = $applicationSessionID;

        return $obj;
    }

    /**
     * The unique identifier of the conection.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * Delivery failed or not.
     */
    public function withFailed(bool $failed): self
    {
        $obj = clone $this;
        $obj->failed = $failed;

        return $obj;
    }

    /**
     * Filter by From number.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The unique identifier of an individual call leg.
     */
    public function withLegID(string $legID): self
    {
        $obj = clone $this;
        $obj->leg_id = $legID;

        return $obj;
    }

    /**
     * If present, conferences will be filtered to those with a matching `name` attribute. Matching is case-sensitive.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Event occurred_at filters.
     */
    public function withOccurredAt(OccurredAt $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurred_at = $occurredAt;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundOutboundVoiceProfileID(
        string $outboundOutboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj->outbound_outbound_voice_profile_id = $outboundOutboundVoiceProfileID;

        return $obj;
    }

    /**
     * Filter by product.
     *
     * @param Product|value-of<Product> $product
     */
    public function withProduct(Product|string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    /**
     * If present, conferences will be filtered by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by To number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
